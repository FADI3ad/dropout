<?php

namespace App\models;

use Core\BaseModel;


class image extends BaseModel
{
    protected int $id;
    public int $product_id;
    public string $image_path;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}
