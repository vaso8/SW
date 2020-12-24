<?php

namespace App\Core;

use App\Core\Contract\RequestInterface;
use App\Core\Contract\RouteInterface;
use Exception;

class Route extends Services implements RouteInterface
{


    /**
     * Array of registered routes. Contains two 'get' and 'post'
     * multidimensional arrays and registered routes within them
     * 
     * @var array $routes
     */
    static $routes = [
        'get' => [],
        'post' => []
    ];


    /**
     * Request Class instance
     * 
     * App\Core\Request
     */
    public $request;


    /**
     * Requested Route
     * 
     * @var string $route
     */
    private $route;



    function __construct(App $app, RequestInterface $request)
    {
        $this->request = $request;

        /**
         * Set App
         */
        $this->setApp($app);

        /**
         * Register Routes
         */
        $this->registerRoutes();

        /**
         * Set Route
         */
        $this->setRoute();
        
    }



    /**
     * Register Routes
     */
    private function registerRoutes()
    {
        require_once 'Web.php';
    }



    /**
     * Check URL exists in route array
     * 
     * It Checks if requested url matches any route in routes array
     * and returns route, otherwise false;
     * If url passes value it sets it to Request object, 
     * under the name that is between {} braces in the route. 
     * The value is that one, which is at the place of {} braces in the url.
     * 
     * @param array $routes
     * 
     * @return mixed
     */
    private function checkURL()
    {
        // return only keys, these keys are routes
        $routes = array_keys(self::$routes[$this->request->method()]);
        $result = false;
        $pattern = "/^{/";
        
        if(in_array($this->request->url(), $routes))
        {
            $result = $routes[array_search($this->request->url(), $routes)];
        } else { //var_dump('else');
            /**
             * Filter Routes
             * 
             * Get same size routes as url after explode them by '/' symbol
             * 
             * @var array $routes
             */
            $routes = array_filter($routes, function($el) {
                return count(explode('/', $this->request->url())) == count(explode('/', $el));
            });
            $routes = array_values($routes);
            
            
            for($i = 0; $i < count($routes); $i++)
            {
                /**
                 * Explode current routes element
                 * 
                 * @var array $route
                 */
                $route = explode('/', $routes[$i]);

                /**
                 * Explode url
                 * 
                 * @var array $url
                 */
                $url = explode('/', $this->request->url());

                /**
                 * Save correct route as array.
                 * 
                 * @var array $reqRoute
                 */
                $reqRoute = [];
                for($j = 0; $j < count($route); $j++)
                {
                    if($url[$j] == $route[$j])
                    {
                        array_push($reqRoute, $route[$j]);
                        $j + 1 == count($route) ? $result = implode('/', $reqRoute) : $result =false;
                    } elseif (preg_match($pattern, $route[$j]))
                    {
                        array_push($reqRoute, $route[$j]);
                        $j + 1 == count($route) ? $result = implode('/', $reqRoute) : $result = false;
                        $member = ltrim($route[$j], '{');
                        $member = rtrim($member, '}');  
                        $this->request->{$member} = $url[$j];
                    } else {
                        $reqRoute = [];
                        $result = false;
                    }
                }
            }
        };
        return $result;
    }



    /**
     * Set Route
     * 
     * @return void
     */
    private function setRoute()
    {
        var_dump($this->app);/*
        if($this->app->url->checkURL())
        {
            echo 'aaaaa';
        }*/
    }

    /**
     * Stores url and Controller / method pair to $routes['get] array
     * 
     * @param string $path url for given controller / method pair
     * @param string $controller Example: ControllerName@methodName
     * @return void
     */
    public static function get($path, $controller)
    {
        $method = 'get';
        self::$routes[$method][$path] = $controller;
    }



    /**
     * Stores url and Controller / method pair to $routes['get] array
     * 
     * @param string $path url for given controller / method pair
     * @param string $controller Example: ControllerName@methodName
     * @return void
     */
    public static function post($path, $controller)
    {
        $method = 'post';
        self::$routes[$method][$path] = $controller;
    }
}