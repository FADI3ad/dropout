<?php


namespace Core;



class Session
{


    public function __construct()
    {
        session_start();
    }
    public function store($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public function destroy()
    {
        session_unset();
        session_destroy();
    }
}
