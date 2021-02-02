<?php

namespace App\Core\Contract;

interface RequestInterface
{

    /**
     * Return HTTP Method
     *
     * @param string
     */
    public function getMethod() : string;

    /**
     * Return Input Values
     * 
     * @param string $name
     * @return mixed $result
     */
    public function input($name);

}

