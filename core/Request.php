<?php



namespace Core;

class Request
{

    private string $Path;

    private string $method;


    public function __construct()
    {
        $this->Path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }



    public function getPath()
    {
        return $this->Path;
    }

    public function getMethod()
    {
        return $this->method;
    }


    public function getData()
    {
        if ($this->method === 'GET') {
            return $_GET;
        }

        if ($this->method === 'POST') {
            return $_POST;
        }
    }
    public function input($fieldName)
    {
        if ($this->method === 'GET') {
            return $_GET[$fieldName];
        }

        if ($this->method === 'POST') {
            return $_POST[$fieldName];
        }
    }
}
