<?php

namespace App\models;

use Core\BaseModel;

class Product extends BaseModel
{

    protected int $id;
    protected string $title;
    protected string $description;
    protected float $price;
    protected float $sale;
    protected string $created_at;



    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSale(): float
    {
        return $this->sale;
    }


    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getImage()
    {
        $images = Image::where('images', 'product_id', '=', $this->id);
        if (!empty($images)) {
            return $images[0];
        }
        return null;
    }
}
