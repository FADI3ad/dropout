<?php

namespace Core;


class Router
{
    private string $path;
    private string $method;
    private array $routes = [];
    private Request $request; 

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->path = $request->getPath();
        $this->method = $request->getMethod();
    }

    //methods 
    public function get($uri, array|callable $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, array|callable $action)
    {
        $this->routes['POST'][$uri] = $action;
    }






    public function dispatch()
    {
        $path = $this->path;
        $method = $this->method;

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            if (is_callable($action)) {
                call_user_func($action);
            } else if (is_array($action)) {
                $controller = $action[0];
                $method = $action[1];
                $class = new $controller();
                $class->$method($this->request);
            }
        } else {
            include_once '../resources/views/errors/404.php';
        }
    }














}
