<?php


namespace App\models;

use Core\BaseModel;





class Contact extends BaseModel
{

    protected int $id;
    protected string $name;
    protected string $email;
    protected string $message;




    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMessage()
    {
        return $this->message;
    }









}
