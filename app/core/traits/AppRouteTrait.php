<?php

namespace App\Core\Traits;

use App\Core\Contract\RequestInterface;
use App\Core\Contract\RouteInterface;
use App\Core\Contract\URLInterface;

trait AppRouteTrait
{
    /**
     * Set Route
     * 
     * @param object $route \App\Core\Route;
     * @param object $request \App\Core\Request;
     * @param object $url \App\Core\Url;
     * 
     * @return void;
     */
    public function setRoute(RouteInterface $route, RequestInterface $request, URLInterface $url) : void
    {
        $routes = $route::$routes[$request->getMethod()];
        if($url->checkURL($url->getURL(), $route::$routes, $request->getMethod()))
            {
                $route->route = array_search($route->getRouteControllerAndMethod(), $routes);
            };
    }

    
    /**
     * Set Route's Controller and Method
     * 
     * @param object $route \App\Core\Route;
     * @param object $request \App\Core\Request;
     * @param object $url \App\Core\Url;
     * 
     * @return void;
     */
    public function setRouteControllerAndMethod(RouteInterface $route, RequestInterface $request, URLInterface $url) : void
    {
        $routes = $route::$routes[$request->getMethod()];
        if($url->checkURL(
            $url->getURL(), 
            $route::$routes, 
            $request->getMethod()))
            {
                $route->controllerAndMethod = $routes[$url->getRouteURL()];
            };
    }
}