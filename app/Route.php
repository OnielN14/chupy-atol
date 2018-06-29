<?php

namespace App;

class Route {
  private static $regex = '/{(\w+)}/g';

  public static function post($uri, $customFunction){
    $request_method = $_SERVER['REQUEST_METHOD'];
    if ($request_method === 'POST') {
      echo $customFunction();
    }
  }

  public static function get($uri, $customFunction){
    $params = preg_grep(self::$regex, $uri);
    print_r($params);
    // $request_method = $_SERVER['REQUEST_METHOD'];
    // if ($request_method === 'GET') {
    //   echo $customFunction($params);
    // }
  }

  public static function put($uri, $customFunction){
    $request_method = $_SERVER['REQUEST_METHOD'];
    if ($request_method === 'PUT') {
      echo $customFunction();
    }
  }

  public static function delete($uri, $customFunction){
    $request_method = $_SERVER['REQUEST_METHOD'];
    if ($request_method === 'DELETE') {
      echo $customFunction();
    }
  }

}
