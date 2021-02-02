<?php

namespace App\Core\Contract;

interface RouteInterface
{
    /**
     * Return Route's Controller and Method
     */
    public function getRouteControllerAndMethod() : string;

    /**
     * Return Route
     */
    public function getRoute() : string;

}