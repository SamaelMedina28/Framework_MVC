<?php

namespace App\Models;

use mysqli;

class Task
{
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;
    protected $connection;
 
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

}
