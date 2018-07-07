<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\KotakSaran;
use App\Controllers\ApiController;

class KotakSaranController extends Controller{

  public function __construct(){
  }

  public function fetch(){
    $kotakSaran = new KotakSaran();
    $fetchedData = $kotakSaran->fetch();
    $data = [
      'count' => count($fetchedData),
      'data' => $fetchedData
    ];

    echo json_encode($data);
  }

  public function insert($requestData){
    $response = '';
    $kotakSaran = new KotakSaran();
    $request = $requestData;

    if (isset($request['front_end_key'])) {
      $userFrontAPI = 'front_end';
      $apiKeyData = ApiController::getInstance()->fetch_by(['user'=>$userFrontAPI]);

      if (count($apiKeyData) > 0) {
        if (strcmp($request['front_end_key'], $apiData['apikey']) == 0) {
          $result = $kotakSaran->insert($request);
          if ($result) {
            $response = [
              'status' => 200,
              'pesan' => 'Sukses'
            ];
          }
          else{
            $response = [
              'status' => 501,
              'pesan' => 'Gagal memasukkan data'
            ];
          }
        }
        else{
          $response = [
            'status' => 502,
            'pesan' => 'Akses tidak valid'
          ];
        }
      }
      else{
        $response = [
          'status' => 503,
          'pesan' => 'Akses tidak ditemukan'
        ];
      }
    }
    else{
      $response = [
        'status' => 504,
        'pesan' => 'Akses tidak diizinkan'
      ];
    }

    echo json_encode($response);
  }

  public function delete($requestData){
      if (session_id() == '') {
          session_start();
      }

      $kotakSaran = new KotakSaran();
      $request = $requestData;
      $data = [
        'id' => $request['id']
      ];

      $response = '';
      if (isset($_SESSION['login_user'])) {
          if ($_SESSION['login_user']['idHakAkses'] == 1) {
              if ($jenisProduk->delete_by($data)) {
                  $response = [
                    'status' => 200,
                    'message' => 'Pesan berhasil dihapus'
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
