<?php

namespace App\Core\Traits;

trait AppURLTrait
{
    /**
     * Set URL
     * 
     * @return void
     */
    public function setURL() : void
    {
        $uri = trim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL), '/');
        $this->url->url = $uri != '' ? $uri : '/';
        //$this->url = $_GET['url'] ? trim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL), '/') : '/';
    }
}