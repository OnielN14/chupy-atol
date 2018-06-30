<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;

class TestController extends Controller{
  public function print_variable($variables){
    $this->render_page('test', ['vars' => $variables]);
  }
}
