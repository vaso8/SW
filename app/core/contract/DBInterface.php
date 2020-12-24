<?php

namespace App\Core\Contract;

interface DBInterface
{
    /**
     * Return PDO Singleton Instance
     * 
     * @return object $instance
     */
    public static function getInstance() : object;
}