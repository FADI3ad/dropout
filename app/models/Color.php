<?php 
namespace App\models;

use Core\BaseModel;




class Color extends BaseModel{
    protected $id;
    protected $name;




    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }



}