<?php

namespace App\Core\Traits;

use App\Core\Contract\RequestInterface;
use App\Core\Contract\URLInterface;

trait AppRequestTrait
{
    /**
     * Set Request attributes
     */
    public function setRequestAttribute(URLInterface $url, RequestInterface $request) : void
    {
        $pattern = "/^{/";
        $actualURL  = explode('/', $url->getURL());
        $routeURL = explode('/', $url->getRouteURL());
        for($i = 0; $i < count($routeURL); $i++)
        {
            if(preg_match($pattern, $routeURL[$i]))
            {
                $attr = ltrim($routeURL[$i], '{');
                $attr = rtrim($attr, '}');
                $request->$attr = trim($actualURL[$i]);
            }
        }
    }

    /**
     * Set Post Array to iput attribute;
     * 
     * @param object $request \App\Core\Request;
     */
    public function setInput($request) : void
    {
        $request->input = $_POST;
    }
}