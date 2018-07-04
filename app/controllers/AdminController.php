<?php

namespace App\Controllers;

use App\Controller;

class AdminController extends Controller
{

  public function __construct(){
    session_start();
  }

  public function index(){
    if (isset($_SESSION['login_user'])) {
      if ($_SESSION['login_user']['idHakAkses'] == 1) {
          $this->render_page('admin/utama.dashboard');
      }else{
        echo 'Did you lost??';
      }
    }else{
      echo 'Something wrong happens';
      session_destroy();
    }

  }

}
