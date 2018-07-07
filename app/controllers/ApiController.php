<?php

namespace App\Controllers;

use App\Controller;
use App\Models\ApiKey;

class ApiController extends Controller
{

  private static $instance = null;

  public static function getInstance()
  {
      return isset(self::$instance) ? self::$instance : self::$instance = new ApiController();
  }

  public function __construct(){
    // session_start();
  }

  public function fetch(){
    $apiKey = new ApiKey();
    $api = $apiKey->fetch();
    return $api;
  }

  public function fetch_by($data = array()){
    $apiKey = new ApiKey();

    $api = $apiKey->fetch_by($data);
    return $api;
  }
}
