<?php

namespace App\Controllers;

use App\Controller;

class AdminController extends Controller
{

  public function __construct(){
    if(session_id() == ''){
      session_start();
    }
  }

  public function index(){
    if (isset($_SESSION['login_user'])) {
      if ($_SESSION['login_user']['idHakAkses'] == 1) {
          $this->render_page('admin/utama.dashboard');
      }else{
        header('Location: /');
      }
    }else{
      header('Location: /');
      session_destroy();
    }
  }

}
