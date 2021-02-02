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
    public $route;

    /**
     * Requested Route's Controller and Method
     * 
     * @var string $route
     */
    public $controllerAndMethod;



    function __construct(App $app)
    {
        /**
         * Set App
         */
        $this->setApp($app);

        /**
         * Register Routes
         */
        $this->registerRoutes();         
    }

    /**
     * Return Route's Controller and Method
     * 
     * @return string $controllerMethod;
     */
    public function getRouteControllerAndMethod() : string
    {
        return $this->controllerAndMethod;
    }

    /**
     * Check route has params
     * 
     * @param string $route
     */
    public function getRoute() : string
    {
        return $this->route;
    }

    /**
     * Register Routes
     */
    private function registerRoutes()
    {
        require_once 'Web.php';
    }

    /**
     * Register Routes
     */
    public static function __callstatic($method, $args)
    {
        $reqMethod = strtolower($_SERVER['REQUEST_METHOD']);
        switch($method) 
        {
            case 'get':
                self::$routes[$reqMethod][$args[0]] = $args[1];
                break;
            case 'post':
                self::$routes[$reqMethod][$args[0]] = $args[1];
                break;
            default:
                break;
        }
    }
}