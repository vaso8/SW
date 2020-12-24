<?php

namespace App\Core;

use App\Core\Contract\ModelInterface;
use App\Core\DB\DB;

abstract class Model implements ModelInterface
{
    protected $stmt;
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = DB::getInstance();
    }



    public function all()
    {
        $this->stmt = $this->pdo->query('SELECT * FROM attribute_types');
    }

    /**
     * Set Table
     * 
     */
    protected function setTable()
    {
        $this->table = __CLASS__;
    }
    
}