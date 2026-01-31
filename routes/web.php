<?php

use App\Controllers\UserController;
use Core\Router;






$router = new Router();
$router->setPath($request->getPath());
$router->setMethod($request->getMethod());










//Routes
// $router->get('/home',function(){
//     view('home.php');
// });

// $router->get('/register',[UserController::class , 'registerView']);
// $router->post('/register',[UserController::class , 'register']);

















$router->dispatch();





