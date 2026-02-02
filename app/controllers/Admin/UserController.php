<?php

namespace App\controllers\Admin;

use App\models\User;
use Core\Request;

class UserController
{

    public function index()
    {
        $users = User::all('users');
        view('admin/user.php', $users);
    }
    public function show() {
        
    }

    public function delete(Request $request)
    {
        User::destroy('users', 'id', '=', $request->input('id'));
        header('Location: /admin/user');
    }
}
