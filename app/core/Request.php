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


    public function __construct()
    {
        /**
         * Set HTTP request method
         */
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
     * Set request method
     * 
     * @return void
     */
    private function setMethod() : void
    {
        /**
         * Sets GET or POST request method to $reqMethod
         */
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }
}