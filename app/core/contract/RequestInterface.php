<?php

namespace App\Core\Contract;

interface RequestInterface
{

    /**
     * Return HTTP Method
     * 
     * @return string
     */
    public function getMethod() : string;

}

