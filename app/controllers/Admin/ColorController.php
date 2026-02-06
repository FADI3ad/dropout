<?php
namespace App\controllers\Admin;

use Core\Request;
use App\models\Color;

class ColorController
{


    public function index()
    {
        $colors = Color::all('colors');
        view('admin/color.php' , $colors);
    }

    public function store(Request $request)
    {
        $colorName = $request->input('name');
        Color::create('colors',[
            "name"=>$colorName,
        ]);
        header(header: 'Location: /admin/color');
    }

    public function show()
    {
        // code...
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        Color::destroy('colors','id','=',$id);
        header(header: 'Location: /admin/color');

    }
}
