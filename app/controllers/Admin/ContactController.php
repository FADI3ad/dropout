<?php 
namespace App\controllers\Admin;

use App\models\Contact;
use Core\Request;
class ContactController{


    public function index()
    {
        
        $messages = Contact::all('contacts');
     
        view('admin/contact.php' , $messages);
    }

    public function show()
    {
        
    }

    public function delete(Request $request)
    {
        Contact::destroy('contacts' , 'id','=',$request->input('id'));
        header('Location: /admin/contact');
    }







}