<?php

namespace App\Core\Contract;

interface URLInterface
{
    /**
     * Check URL
     * 
     * @param string $url
     * @param array $routes //App\Core\Route
     * @param string $method // App\Core\Request
     * 
     * @return bool
     */
    public function checkURL($url, $routes, $method) : bool;

    /**
     * Get URL
     * 
     */
    public function getURL() : string;
}