<?php

namespace App\Core\Contract;

interface ControllerInterface
{
    /**
     * Return controller name
     * 
     * @return string $controller
     */
    public function getController() : string;

    /**
     * Return method name
     * 
     * @return string $method;
     */
    public function getMethod() : string;
}