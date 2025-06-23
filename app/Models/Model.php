<?php

namespace App\Models;

use mysqli;

/**
 * Clase Model
 * 
 * Clase base para modelos que proporciona funcionalidades CRUD básicas
 * y métodos para construir consultas SQL de manera fluida.
 */
class Model
{
    /** @var string $db_host Host de la base de datos */
    protected $db_host = DB_HOST;
    
    /** @var string $db_user Usuario de la base de datos */
    protected $db_user = DB_USER;
    
    /** @var string $db_pass Contraseña de la base de datos */
    protected $db_pass = DB_PASS;
    
    /** @var string $db_name Nombre de la base de datos */
    protected $db_name = DB_NAME;

    /** @var mysqli $connection Instancia de la conexión MySQLi */
    protected $connection;
    
    /** @var mixed $query Resultado de la última consulta ejecutada */
    protected $query;
    
    /** @var string $table Nombre de la tabla asociada al modelo */
    protected $table;
    
    /** @var string $orderBy Cláusula ORDER BY para las consultas */
    protected $orderBy = '';
    
    /** @var string $sql Consulta SQL actual */
    protected $sql = '';
    
    /** @var array $data Datos para consultas preparadas */
    protected $data = [];
    
    /** @var string|null $params Tipos de parámetros para consultas preparadas */
    protected $params = null;

    /**
     * Constructor que inicializa la conexión a la base de datos
     * 
     * @throws \Exception Si la conexión a la base de datos falla
     */
    public function __construct()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->connection->connect_error) {
            die("Connection error: " . $this->connection->connect_error);
        }
    }

    /**
     * Ejecuta una consulta SQL
     * 
     * @param string $sql Consulta SQL a ejecutar
     * @param array $data Datos para la consulta preparada
     * @param string|null $params Tipos de parámetros (ej: 'ssi' para string, string, integer)
     * @return $this
     */
    public function query($sql, $data = [], $params = null)
    {
        if ($data) {
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params ?? str_repeat('s', count($data)), ...$data);
            $stmt->execute();
            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->connection->query($sql);
        }
        return $this;
    }

    /**
     * Agrega una cláusula ORDER BY a la consulta
     * 
     * @param string $column Columna por la que ordenar
     * @param string $order Dirección del orden (ASC o DESC)
     * @return $this
     */
    public function orderBy($column, $order = 'ASC')
    {
        $this->orderBy .= empty($this->orderBy) ? " ORDER BY {$column} {$order}" : ", {$column} {$order}";
        return $this;
    }

    /**
     * Ejecuta la consulta SQL actual
     * 
     * @return void
     */
    private function executeQuery()
    {
        if (empty($this->sql)) {
            $this->sql = "SELECT * FROM {$this->table}";
        }
        $this->sql .= $this->orderBy;
        $this->query($this->sql, $this->data, $this->params);
    }

    /**
     * Obtiene el primer registro de la consulta
     * 
     * @return array|null El registro como array asociativo o null si no hay resultados
     */
    public function first()
    {
        if (empty($this->query)) {
            $this->executeQuery();
        }
        return $this->query->fetch_assoc();
    }

    /**
     * Obtiene todos los registros de la consulta
     * 
     * @return array Array de registros como arrays asociativos
     */
    public function get()
    {
        if (empty($this->query)) {
            $this->executeQuery();
        }
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Pagina los resultados de la consulta
     * 
     * @param int $perPage Número de registros por página
     * @return array Información de paginación que incluye:
     *              - total: total de registros
     *              - from/To: rango de registros mostrados
     *              - current_page: página actual
     *              - total_pages: total de páginas
     *              - next_page: URL de la siguiente página (o null)
     *              - prev_page: URL de la página anterior (o null)
     *              - data: registros de la página actual
     */
    public function paginate($perPage = 3)
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $perPage;

        $sql = $this->sql ? $this->sql : "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table}";
        $sql .= " {$this->orderBy} LIMIT {$offset}, {$perPage}";

        $data = $this->query($sql, $this->data, $this->params)->get();
        $total = $this->query("SELECT FOUND_ROWS() as total")->first()['total'];

        return [
            'total' => $total,
            'from' => $offset + 1,
            'to' => $offset + count($data),
            'current_page' => $page,
            'total_pages' => ceil($total / $perPage),
            'next_page' => $page + 1 > ceil($total / $perPage) ? null : "?page=" . ($page + 1),
            'prev_page' => $page - 1 < 1 ? null : "?page=" . ($page - 1),
            'data' => $data,
        ];
    }

    /**
     * Obtiene todos los registros de la tabla
     * 
     * @return array Todos los registros de la tabla
     */
    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}")->get();
    }

    /**
     * Busca un registro por su ID
     * 
     * @param int $id ID del registro a buscar
     * @return array|null El registro encontrado o null si no existe
     */
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], 'i')->first();
    }

    /**
     * Agrega una condición WHERE a la consulta
     * 
     * @param string $column Columna para la condición
     * @param string $operator Operador (ej: '=', '>', '<', 'LIKE')
     * @param mixed $value Valor para comparar
     * @return $this
     */
    public function where($column, $operator, $value = null)
    {
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }

        $this->sql .= empty($this->sql)
            ? "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} WHERE {$column} {$operator} ?"
            : " AND {$column} {$operator} ?";

        $this->data[] = $value;
        return $this;
    }

    /**
     * Crea un nuevo registro en la base de datos
     * 
     * @param array $data Datos del registro a crear (columna => valor)
     * @return array El registro creado
     */
    public function create($data)
    {
        $columns = implode(',', array_keys($data));
        $values = array_values($data);
        $placeholders = implode(',', array_fill(0, count($values), '?'));

        $this->query(
            "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)",
            $values,
            str_repeat('s', count($values))
        );

        return $this->find($this->connection->insert_id);
    }

    /**
     * Actualiza un registro existente
     * 
     * @param int $id ID del registro a actualizar
     * @param array $data Datos a actualizar (columna => valor)
     * @return array El registro actualizado
     */
    public function update($id, $data)
    {
        $fields = implode(',', array_map(fn($col) => "{$col} = ?", array_keys($data)));
        $values = [...array_values($data), $id];

        $this->query(
            "UPDATE {$this->table} SET {$fields} WHERE id = ?",
            $values
        );

        return $this->find($id);
    }

    /**
     * Elimina un registro por su ID
     * 
     * @param int $id ID del registro a eliminar
     * @return void
     */
    public function delete($id)
    {
        $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], 'i');
    }
}
