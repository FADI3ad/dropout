<?php


use Core\Router;
use Core\Request;
use App\Controllers\ContactController;
use App\Controllers\UserController;
use App\Controllers\Admin\ContactController as AdminContact;
use App\Controllers\Admin\UserController as AdminUser;



$router = new Router(new Request());
//-----------------------------------------------------------------------------------------------------------------------
//Admin Routes
$router->get('/admin/dashboard',  function(){
    view('admin/dashboard.php');
});

//contact for admin
$router->get('/admin/contact',  [AdminContact::class,'index']);
$router->get('/admin/contact/show',  [AdminContact::class,'show']); //dont forget this
$router->post('/admin/contact/delete',  [AdminContact::class,'delete']);

//user management for admin
$router->get('/admin/user',  [AdminUser::class,'index']);
$router->get('/admin/user/show',  [AdminUser::class,'show']); //dont forget this
$router->post('/admin/user/delete', [AdminUser::class, 'delete']);



















//-----------------------------------------------------------------------------------------------------------------------
//User Routes
$router->get('/home',function(){
    view('home.php');
});
$router->get('/about',function(){
    view('about.php');
});

//contact for user
$router->get('/contact',[ContactController::class , 'create']);
$router->post('/contact',[ContactController::class , 'store']);






//User Auth Routes
$router->get('/register',[UserController::class , 'registerView']);
$router->post('/register',[UserController::class , 'register']);


$router->get('/login',[UserController::class , 'loginView']);
$router->post('/login',[UserController::class , 'login']);

$router->post('/logout',[UserController::class , 'logout']);
















$router->dispatch();





