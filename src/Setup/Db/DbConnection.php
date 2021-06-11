<?php

namespace Setup\Db;

class DbConnection 
{
    private $user;
    private $host;
    private $pass;
    private $database;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'daniels';
        $this->pass = 'password';
        $this->database = 'ToDoList';
    }

    public function connect()
    {

        $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if ($connection->connect_error) {
            die("Fatal error: " . $connection->connect_error);
        }
        return $connection;
        
    }

}

?>