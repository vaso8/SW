<?php

namespace App\Core;

use App\Core\Contract\RequestInterface;
use App\Core\Contract\RouteInterface;
use App\Core\Contract\UrlInterface;

class Url extends Services implements URLInterface
{
    public $url;

    public $routeURL;

    
    public function __construct($app)
    {
        $this->app = $app;
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
     * Get route URL
     * 
     * @return string $routeURL
     */
    public function getRouteURL() : string
    {
        return $this->routeURL ? $this->routeURL :'';
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
            $this->routeURL = $url;
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
                        $this->routeURL = $routes[$i];
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
}