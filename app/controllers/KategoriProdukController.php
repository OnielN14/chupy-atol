<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\KategoriProduk;

class KategoriProdukController extends Controller{

  public function __construct(){
  }

  public function fetch(){
    $kategoriProduk = new KategoriProduk();

    $fetchedData = $kategoriProduk->fetch();

    $data = [
      'count' => count($fetchedData),
      'data' => $fetchedData
    ];

    echo json_encode($data);
  }

  public function fetch_by($data=array())
  {
    $kategoriProduk = new KategoriProduk();
    $fetchedData = $kategoriProduk->fetch_by($data);
    $response = [
      'count' => count($fetchedData),
      'data' => $fetchedData
    ];

    echo json_encode($response);
  }

}
