<?php

class Config
{
    private const dsn = "mysql:host=localhost;dbname=web_test";
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';

    protected $connection;

    public function __construct() {
        try {
            $this->connection = new PDO(self::dsn,self::DB_USER,self::DB_PASSWORD);
            // echo "connected";
        } catch(PDOException $err) {
            var_dump($err);
        }
    }
}

// $db = new Config();
