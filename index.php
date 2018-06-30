<?php
require_once __DIR__.'/vendor/autoload.php';

define('ROOTPATH', __DIR__);

use App\Route;
use App\Controllers\TestController;
//
// $rawUri = $_SERVER['REQUEST_URI'];
// $uri = explode('?', $rawUri)[0];
//
// $request_uri = explode("/",$uri);
// $request = [];
// foreach($request_uri as $value){
//   array_push($request,'/'.$value);
// }
