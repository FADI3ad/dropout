<?php 


use App\Database;
use Core\Request;
use App\Models\User;









require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__.'/../config.php';
$db = Database::getInstance($config)->getConnection();


// User::create($db,'users',[
//     'name'=>'fadi',
//     'email'=>'1312sdas@gmail.ciom',
//     'password'=>'12123',
    
// ]);






$request = new Request(); //know the current path and method
require __DIR__ . '/../routes/web.php'; 


