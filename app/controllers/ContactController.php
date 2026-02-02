<?php

namespace App\controllers;

use App\models\Contact;
use Core\Request;



class ContactController
{




    public function create()
    {
        view('contact.php');
    }

    public function store(Request $request)
    {

        //dont forget validation 

        
        Contact::create('contacts', [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "message" => $request->input('message'),
        ]);
    }
    












}
