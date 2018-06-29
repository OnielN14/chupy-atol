<?php
require_once "app/Route.php";
use App\Route;

$rawUri = $_SERVER['REQUEST_URI'];
$uri = explode('?', $rawUri)[0];

$request_uri = explode("/",$uri);
$request = [];
foreach($request_uri as $value){
  array_push($request,'/'.$value);
}


switch($request[1]){
  case '/':
    Route::get('/', function(){
      require 'view/main-page.php';
    });
    break;
  case '/forgot-password':
    // Route::get('/forgot-password', function(){
    //   require 'view/forgot-password.php';
    // });
    Route::get('/forgot-password/{nama}', function($nama){
      // echo $nama;
    });
    break;

  default :
    require 'view/404.php';
}
