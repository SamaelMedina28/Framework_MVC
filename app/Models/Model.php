<?php

namespace App\Models;
use mysqli;

class Model
{
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $connection;
    protected $query;
    protected $table; 

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->connection->connect_error) {
            die("Hubo un error al conectar a la base de datos: " . $this->connection->connect_error);
        }
    }


    public function query($sql, $data = [], $params = null)
    {
        if($data){
            if($params === null){
                $params = str_repeat("s", count($data));
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();
            $this->query = $stmt->get_result();
        }else{
            $this->query = $this->connection->query($sql);
        }
        return $this;
    }
    public function first()
    {
        return $this->query->fetch_assoc();
    }
    public function get()
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }
    public function paginate($cant = 3)
    {
        $page = $_GET['page'] ?? 1; 
        $offset = ($page - 1) * $cant;
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} LIMIT {$offset}, {$cant}";
        $data = $this->query($sql)->get();
        $total = $this->query("SELECT FOUND_ROWS() as total")->first()['total'];
        $total_pages = ceil($total / $cant);
        $prev_page = $page - 1 < 1 ? null :"?page=". $page - 1;
        $next_page = $page + 1 > $total_pages ? null : "?page=".$page + 1;
        return [
            'total' => $total,
            'from' => $offset + 1,
            'to' => $offset + count($data),
            'current_page' => $page,
            'total_pages' => $total_pages,
            'next_page' => $next_page,
            'prev_page' => $prev_page,
            'data' => $data,
        ];
    }

    // Consultas
    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id], "i")->first();
    }
    public function where($column, $operator, $value = null)
    {
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }
        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} ?";
        return $this->query($sql, [$value], "s");
    }
    public function create($data)
    {
        $columns = implode(',', array_keys($data));
        $values = array_values($data);
        $sql = "INSERT INTO {$this->table} ($columns) VALUES (" . str_repeat("?, ", count($values)-1) . "?)";
        $this->query($sql, $values, str_repeat("s", count($values)));
        return $this->find($this->connection->insert_id);
    }
    public function update($id, $data)
    {
        $fields = [];
        foreach ($data as $column => $value) {
            $fields[] = "{$column} = ?";
        }
        $fields = implode(',', $fields);
        $sql = "UPDATE {$this->table} SET $fields WHERE id = ?";
        $values = array_values($data);
        $values[] = $id;
        $this->query($sql, $values);
        return $this->find($id);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql, [$id], 'i');
    }
}
