<?php

namespace App\Models;


use Core\BaseModel;


class User extends BaseModel
{
    protected  int $id;
    protected  string $name;
    protected  string $email;
    protected  string $password;
    protected string $role;
    protected string $created_at;


    
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
    public function getRole()
    {
        return $this->role;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }





}
