<?php

namespace App\Core;

class App
{

    /**
     * Route instance
     * @var \App\Core\Route $route
     */
    public $route;

    /**
     * Request instance
     * @var \App\Core\Request $request
     */
    public $request;

    /**
     * Url Instance
     * @var \App\Core\Url $url
     */
    public $url;
    


    public function __construct()
    {
        $this->request = new Request();
        $this->request->setApp($this);

        $this->url = new Url();
        $this->url->setApp($this);

        $this->route = new Route($this, $this->request);
        //$this->route->setApp($this);
        
    }




}