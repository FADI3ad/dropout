<?php

namespace Core;


class Router
{
    private string $path;

    private string $method;

    private array $routes = [];

    public function get($uri, array|callable $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, array|callable $action)
    {
        $this->routes['POST'][$uri] = $action;
    }




    public function setPath(string $path)
    {
        $this->path = $path;
    }
    public function getPath()
    {
        return $this->path;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;
    }
    public function getMethod()
    {
        return $this->method;
    }




    public function dispatch()
    {
        $path = $this->getPath();
        $method = $this->getMethod();

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            if (is_callable($action)) {
                call_user_func($action);
            } else if (is_array($action)) {
                $controller = $action[0];
                $method = $action[1];
                $class = new $controller();
                $class->$method();
            }
        } else {
            include_once '../resources/views/errors/404.php';
        }
    }














    public function routes(): array
    {
        return $this->routes;
    }
}
