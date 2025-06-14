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
    protected $orderBy = '';
    protected $sql = '';
    protected $data = [];
    protected $params = null;

    public function __construct()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->connection->connect_error) {
            die("Connection error: " . $this->connection->connect_error);
        }
    }

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

    public function orderBy($column, $order = 'ASC')
    {
        $this->orderBy .= empty($this->orderBy) ? " ORDER BY {$column} {$order}" : ", {$column} {$order}";
        return $this;
    }

    private function executeQuery()
    {
        if (empty($this->sql)) {
            $this->sql = "SELECT * FROM {$this->table}";
        }
        $this->sql .= $this->orderBy;
        $this->query($this->sql, $this->data, $this->params);
    }

    public function first()
    {
        if (empty($this->query)) {
            $this->executeQuery();
        }
        return $this->query->fetch_assoc();
    }

    public function get()
    {
        if (empty($this->query)) {
            $this->executeQuery();
        }
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

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

    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}")->get();
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], 'i')->first();
    }

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

    public function delete($id)
    {
        $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], 'i');
    }
}
