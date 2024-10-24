<?php

namespace App\models;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;
    public $connection;

    public function __construct()
    {
        $this->host = 'meconect-db-1';
        $this->port = 3306;
        $this->database = 'meconnect';
        $this->username = 'meconnect';
        $this->password =  '1234';
        $this->connection = $this->connect();
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            $this->connection = null;
            throw new PDOException($e->getMessage());
        }
    }

}