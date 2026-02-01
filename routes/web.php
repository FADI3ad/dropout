<?php

use App\controllers\ContactController as ControllersContactController;
use Core\Router;
use Core\Request;
use App\Controllers\ContactController;
use App\Controllers\UserController;

$router = new Router(new Request());






//Routes
$router->get('/home',function(){
    view('home.php');
});
$router->get('/about',function(){
    view('about.php');
});







//contact routes
$router->get('/contact',[ContactController::class , 'create']);
$router->post('/contact',[ContactController::class , 'store']);












//Auth Routes
$router->get('/register',[UserController::class , 'registerView']);
$router->post('/register',[UserController::class , 'register']);


$router->get('/login',[UserController::class , 'loginView']);
$router->post('/login',[UserController::class , 'login']);



$router->post('/logout',[UserController::class , 'login']);
















$router->dispatch();





