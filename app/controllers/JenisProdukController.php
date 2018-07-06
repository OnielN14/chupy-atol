<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\JenisProduk;

class JenisProdukController extends Controller{

  public function __construct(){
  }

  public function fetch(){
    $jenisProduk = new JenisProduk();

    $data = [
      'data' => $jenisProduk->fetch()
    ];

    echo json_encode($data);
  }

}
