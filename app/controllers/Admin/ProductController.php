<?php

namespace App\controllers\Admin;

use Core\Request;
use App\models\Color;
use App\models\image;
use App\models\Product;
use App\models\Product_color;

class ProductController
{
    public function index()
    {
        $colors = Color::all('colors');
        $products = Product::all('products');
        return view('admin/product.php', '', [$products, $colors]);
    }

    public function store(Request $request)
    {

        $imageName = $_FILES['image']['name'];


        $tempName = $_FILES['image']['tmp_name'];


        $imageExtention = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $newName = uniqid() . "." . $imageExtention;

        $folderPath = __DIR__ . "/../../../public/images/" . $newName;

        move_uploaded_file($tempName, $folderPath);


        $colors = $request->input('colors');

        $product = Product::create('products', [
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "price" => $request->input('price'),
            "sale" => $request->input('sale'),
        ]);

        Product_color::create('product_colors', [
            "color_id" => $colors,
            "product_id" => $product->getId()
        ]);
        image::create('images', [
            "image_path" => $newName,
            "product_id" => $product->getId()
        ]);
        header('Location: /admin/product');
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $product = Product::where('products', 'id', '=', $id)[0];

        view('admin/productShow.php', $product, []);
    }


    public function delete(Request $request)
    {
        $productId = $request->input('id');


        Product_color::destroy('product_colors', 'product_id', '=', $productId);

        Image::destroy('images', 'product_id', '=', $productId);

        Product::destroy('products', 'id', '=', $productId);

        header('Location: /admin/product');
    }
} 
