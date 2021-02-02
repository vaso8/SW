<?php

namespace App\Core;

use App\Core\Contract\RequestInterface;

class Request extends Services implements RequestInterface
{
    /**
     * Contains http request method GET or POST
     * 
     * @var string $reqMethod
     */
    private $method;

    /**
     * Post Array
     */
    public $input;


    public function __construct($app)
    {
        $this->app = $app;
        $this->setMethod();
    }

    /**
     * Get HTTP method
     * 
     * @return string $method
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * Get POST Values
     */
    public function input($name)
    {
        return isset($this->input[$name]) ? $this->input[$name] : false;
    }

    /**
     * Set request method
     * 
     * @return void
     */
    private function setMethod() : void
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

}