<?php

namespace App\Core;

use App\Core\Contract\RequestInterface;
use App\Core\Contract\RouteInterface;
use App\Core\Contract\UrlInterface;

class Url extends Services implements URLInterface
{
    public $url;

    
    public function __construct()
    {
        $this->setURL();
    }

    /**
     * Get URL
     * 
     * @return string $url
     */
    public function getURL() : string
    {
        return $this->url;
    }


    /**
     * Check URL exists in route array
     * 
     * @param string $url
     * @param array $routes
     * @param string $method
     * 
     * @return mixed
     */
    public function checkURL($url, $routes, $method) : bool
    {
        $result = false;
        $pattern = "/^{/";
        // return only keys, these keys are routes
        $routes = array_keys($routes[$method]);
        $urlArray = explode('/', $this->getURL());

        if(in_array($url, $routes))
        {
            $result = true;
        } else {
            $routes = array_filter($routes, function($el) use ($urlArray) {
                return count($urlArray) == count(explode('/', $el));
            });
            $routes = array_values($routes);
                     
            for($i = 0; $i < count($routes); $i++)
            {
                $route = explode('/', $routes[$i]);

                for($j = 0; $j < count($route); $j++)
                {
                    if($urlArray[$j] == $route[$j] || preg_match($pattern, $route[$j]))
                    {
                        $result = true;
                    } else {
                        $result = false;
                        break;
                    }
                }
            }
        };
        return $result;
    }

    
    /**
     * Set URL
     * 
     * @return void
     */
    private function setURL() : void
    {
        $this->url = $_GET['url'] ? trim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL), '/') : '/';
    }
}