<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Produk;
use App\Controllers\FotoProdukController;

class ProdukController extends Controller{

  public function __construct(){
  }

  public function fetch($data = ""){
    $produk = new Produk();
    $fotoProduk = new FotoProdukController();
    $fetchedData= '';
    if ($data == '') {
      $fetchedData = $produk->fetch();
    }
    else{
      $fetchedData = $produk->fetch_by($data);
    }

    for ($i=0; $i <count($fetchedData) ; $i++) {
      $fotoProdukData = $fotoProduk->fetch_by_produk(['idProduk' => $fetchedData[$i]['id']]);
      
      $fetchedData[$i]['foto'] = $fotoProdukData;
    }

    $data = [
      "count" =>count($fetchedData),
      "data" => $fetchedData
    ];
    echo json_encode($data);
  }

public function reArrangeFotoData( $arr ){
    foreach( $arr as $key => $all ){
        foreach( $all as $i => $val ){
            $new[$i][$key] = $val;
        }
    }
    return $new;
}

public function insert($data){
    if (session_id() == '') {
        session_start();
    }
    $produk = new Produk();
    $fotoProdukController = new FotoProdukController();

    $request = $data['produkData'];
    $rawFotoData = $data['foto'];
    $requestFoto = [];

    if (isset($_SESSION['login_user'])) {
        if ($_SESSION['login_user']['idHakAkses'] == 1) {

            $result = $produk->insert($request);
            $fetchedData = $produk->fetch_by(['nama' => $request['nama']]);
            $produkData = end($fetchedData);

            foreach ($rawFotoData as $fotoData) {
              $newName = strtolower(Date('Ymd').'-'.rand().'-'.$produkData['id'].'.'.explode('/',$fotoData['type'])[1]);
              $foto = [
                'name' => $newName,
                'type' => $fotoData['type'],
                'tmp_name' => $fotoData['tmp_name'],
                'size' => $fotoData['size'],
                'idProduk' => $produkData['id']
              ];

              array_push($requestFoto, $foto);
            }

            $resultFoto = $fotoProdukController->insertMultiple($requestFoto);

            $summary = [
              $result,
              $resultFoto
            ];

            $response = [
              'status' => 200,
              'pesan' => $summary
            ];

        } else {
            $response = [
              'status' => 502,
              'pesan' => 'Akses tidak dikenali'
            ];
        }
    }
    else {
        $response = [
          'status' => 501,
          'pesan' => 'Akses tidak diizinkan'
        ];
    }
    echo json_encode($response);
  }


  public function update($data){
      if (session_id() == '') {
          session_start();
      }

      $produk = new Produk();
      $fotoProdukController = new FotoProdukController();
      $request = $data['produkData'];
      $rawFotoData = $data['foto'];
      $requestFoto = [];

      if (isset($_SESSION['login_user'])) {
          if ($_SESSION['login_user']['idHakAkses'] == 1) {

              $result = $produk->update($request);

              // deleting previous data
              $fotoProdukController->delete(['idProduk'=>$request['id']]);

              foreach ($rawFotoData as $fotoData) {
                $newName = strtolower(Date('Ymd').'-'.rand().'-'.$request['id'].'.'.explode('/',$fotoData['type'])[1]);
                $foto = [
                  'name' => $newName,
                  'type' => $fotoData['type'],
                  'tmp_name' => $fotoData['tmp_name'],
                  'size' => $fotoData['size'],
                  'idProduk' => $request['id']
                ];

                array_push($requestFoto, $foto);
              }

              $resultFoto = $fotoProdukController->insertMultiple($requestFoto);

              $summary = [
                $result,
                $resultFoto
              ];

              $response = [
                'status' => 200,
                'pesan' => $summary
              ];

          } else {
              $response = [
                'status' => 502,
                'pesan' => 'Akses tidak dikenali'
              ];
          }
      }
      else {
          $response = [
            'status' => 501,
            'pesan' => 'Akses tidak diizinkan'
          ];
      }
      echo json_encode($response);
    }

    public function delete($requestData){
        if (session_id() == '') {
            session_start();
        }
        $produk = new Produk();
        $fotoProdukController = new FotoProdukController();
        $request = $requestData;
        $data = [
          'id' => $request['id']
        ];

        $response = '';
        if (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {

              // deleting previous data
              $fotoProdukController->delete(['idProduk'=>$request['id']]);
                if ($produk->delete_by($data)) {
                    $response = [
                      'status' => 200,
                      'message' => 'Produk berhasil dihapus'
                    ];
                } else {
                    $response = [
                      'status' => 200,
                      'message' => 'Akses diizinkan tapi terjadi kesalahan saat menghapus'
                    ];
                }
            } else {
                  $response = [
                    'status' => 502,
                    'pesan' => 'Akses tidak dikenali'
                  ];
            }
        } else {
          $response = [
            'status' => 501,
            'pesan' => 'Akses tidak diizinkan'
          ];
        }

        echo json_encode($response);
    }

}
