<?php

namespace App\Core;

abstract class Services
{
    /**
     * App Instance
     * 
     * @var App\Core\App $app
     */
    public $app;


    /**
     * Set App Instance To Service
     * 
     * @param App\Core\App $object
     */
    public function setApp($object)
    {
        $this->app = $object;
    }

}