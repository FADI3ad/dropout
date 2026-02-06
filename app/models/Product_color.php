<?php 
namespace App\models;

use Core\BaseModel;


class Product_color extends BaseModel{
    protected $id;
    protected $product_id;
    protected $color_id;

    public function getId()
    {
        return $this->id;
    }
    
    public function getProductId()
    {
        return $this->product_id;
    }
    
    public function getColorId()
    {
        return $this->color_id;
    }
    
}