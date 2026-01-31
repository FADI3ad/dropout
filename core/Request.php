<?php



namespace Core;

class Request
{

    private string $Path;

    private string $method;


    public function __construct()
    {
        $this->setPath();
        $this->setMethod();
    }

    public function setPath()
    {
        $this->Path = $_SERVER['REQUEST_URI'];
    }

    public function setMethod()
    {
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
}
