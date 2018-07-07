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
    $fetchedData = $produk->fetch();
    $data = [
      "count" =>count($fetchedData),
      "data" => $fetchedData
    ];
    echo json_encode($data);
  }

public function insert($data){
    if (session_id() == '') {
        session_start();
    }

    $produk = new Produk();
    $request = $data;

    if (isset($_SESSION['login_user'])) {
        if ($_SESSION['login_user']['idHakAkses'] == 1) {

            $result = $produk->insert($request);

            $response = [
              'status' => 200,
              'pesan' => $result
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
      $request = $data;

      if (isset($_SESSION['login_user'])) {
          if ($_SESSION['login_user']['idHakAkses'] == 1) {

              $result = $produk->update($request);

              $response = [
                'status' => 200,
                'pesan' => $result
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
        $request = $requestData;
        $data = [
          'id' => $request['id']
        ];

        $response = '';
        if (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {
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
