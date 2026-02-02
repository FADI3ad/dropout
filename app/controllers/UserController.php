<?php

namespace App\Controllers;

use Core\Request;
use App\Models\User;
use Core\Session;

class UserController
{

    public function registerView()
    {
        view('auth/register.php');
    }
    public function loginView()
    {
        view('auth/login.php');
    }

    public function register(Request $request)
    {

        //dont forget make valdation



        $user = User::create('users', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'user',
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
        ]);

        if ($user) {
            $session = new Session();
            $session->store('user_id', $user->getId());
            $session->store('name', $user->getName());
            $session->store('email', $user->getEmail());
            $session->store('role', $user->getRole());

            header('Location: /home');
            exit();
        }
    }

    public function login(Request $request)
    {


    
        //dont forget make valdation




        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('users', 'email', '=', $email);

        if ($user && password_verify($password, $user[0]->getPassword())) {
            $session = new Session();
            $session->store('user_id', $user[0]->getId());
            $session->store('name', $user[0]->getName());
            $session->store('email', $user[0]->getEmail());
            $session->store('role', $user[0]->getRole());
        }

        header('Location: /home');
        exit();
    }

    public function logout()
    {
        $session = new Session();
        $session->destroy();

        header('Location: /home');
        exit();
    }

    

}
