<?php

namespace App\Core;

use App\Core\Contract\ControllerInterface;

class Controller implements ControllerInterface
{
    private $controllerMethodPair;
    private $controller;
    private $method;
    public function __construct(string $controllerMethodPair)
    {
        $this->controllerMethodPair = $controllerMethodPair;

        $this->setController();

        $this->setMethod();
    }
    /**
     * Get Controller
     * 
     * @return string $controller
     */
    public function getController(): string
    {
        return $this->controller;
    }
    
    /**
     * Get Method
     * 
     * @return string $method;
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set Controller
     * 
     * @param void;
     */
    private function setController()
    {
        $this->controller = explode('@', $this->controllerMethodPair)[0];
    }

    /**
     * Set Controller
     * 
     * @param void;
     */
    private function setMethod()
    {
        $this->controller = explode('@', $this->controllerMethodPair)[1];
    }
}