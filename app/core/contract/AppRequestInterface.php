<?php

namespace App\Core\Contract;

interface AppRequestInterface
{
    /**
     * Set Request Parameteres
     * 
     * @param object $url \App\Core\URL;
     * @param object $request \App\Core\Request;
     */
    public function setRequestAttribute(URLInterface $url, RequestInterface $request) : void;

    /**
     * Set Post Array to iput attribute;
     * 
     * @param object $request \App\Core\Request;
     */
    public function setInput(RequestInterface $request) : void;
}