<?php

namespace App\Core\Contract;

interface AppRouteInterface
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
    public function setRoute(RouteInterface $route, RequestInterface $request, URLInterface $url) : void;

    /**
     * Set Route's Controller and Method
     * 
     * @param object $route \App\Core\Route;
     * @param object $request \App\Core\Request;
     * @param object $url \App\Core\Url;
     * 
     * @return void;
     */
    public function setRouteControllerAndMethod(RouteInterface $route, RequestInterface $request, URLInterface $url) : void;
}