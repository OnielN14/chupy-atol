<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\HakAkses;

class HakAksesController extends Controller{

  public function __construct(){
    if(session_id() == ''){
      session_start();
    }
    if (isset($_SESSION['login_user'])) {
      if ($_SESSION['login_user']['idHakAkses'] != 1) {
        header('Location: / ');
      }
    }
    else{
        header('Location: / ');
    }
  }

  public function fetch(){
    $hakAkses = new HakAkses();
    $data = [
      'data' => $hakAkses->fetch()
    ];
    echo json_encode($data);
  }

}
