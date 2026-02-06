<?php

namespace App\controllers;



use Core\Request;
use App\models\Color;
use App\models\image;
use App\models\Product;


class ProductController
{
    public function index()
    {

        $products = Product::all('products');
        return view('product/index.php', $products, []);
    }


    public function show(Request $request)
    {

        $id = $request->input('id');

        $product = Product::where('products', 'id', '=', $id)[0];

        view('product/show.php', $product);
    }
}
