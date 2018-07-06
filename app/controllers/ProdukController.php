<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Produk;

class ProdukController extends Controller{

  public function __construct(){
  }

  public function fetch(){
    $produk = new Produk();
    echo json_encode($produk->fetch());
  }

}
