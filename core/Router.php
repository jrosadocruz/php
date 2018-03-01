<?php

class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $routes = new static;
        require $file;
        return $routes;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $method)
    {
        // dd($this->routes[$method][$uri]);
        $ar = explode('@', $this->routes[$method][$uri]);

        if ( array_key_exists( $uri, $this->routes[$method] ) ) {
            $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        // if($method == 'GET' ) {
        //     $controller = new $ar[0];
        //     $action = $ar[1];
        //     $controller -> $action();
        // }
    }

    private function callAction($controller, $action)
    {
        if ( ! method_exists($controller, $action) ) {
            throw new Exception("{$controller} does not have {$action}");
        }
        $controller = new $controller;
        $controller -> $action();
    }

}