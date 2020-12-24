<?php

namespace App\Core\DB;

use App\Core\Contract\DBInterface;
use PDO;

class DB implements DBInterface
{
    private static $instance = null;
    private $port       = '33033';
    private $host       = '127.0.0.1';
    private $db         = 'scandiweb';
    private $user       = 'root';
    private $password   = 'password';
    private $charset    = 'utf8mb4';
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    private function __construct()
    {
        $dsn = "mysql:host=$this->host:$this->port;dbname=$this->db;charset=$this->charset";
        try {
            static::$instance = $this->pdo = new PDO($dsn, $this->user, $this->password, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public static function getInstance() : object
    {
        if(static::$instance === null)
        {
            new DB();
        }

        return static::$instance;
    }
    
}