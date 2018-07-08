<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\FotoProduk;

class FotoProdukController extends Controller{

  public function __construct(){
  }

  public function fetch(){
    $fotoProduk = new FotoProduk();
    $fetchedData = $fotoProduk->fetch();
    $data = [
      'count' => count($fetchedData),
      'data' => $fetchedData
    ];

    echo json_encode($data);
  }

  public function insertMultiple($data){
    $uploadDir = 'extension/upload/';
      if (session_id() == '') {
          session_start();
      }

      $fotoProduk = new FotoProduk();
      $request = $data;

      $result = $fotoProduk->insertMultiple($request);
      if ($result[0] == 0) {
        foreach($request as $foto){
          move_uploaded_file($foto['tmp_name'], $uploadDir.basename($foto['name']));

        }
      }
      return $response = ['result' => $result];

    }

    public function update($data){
        if (session_id() == '') {
            session_start();
        }

        $jenisProduk = new JenisProduk();
        $request = $data;

        if (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {

                $result = $jenisProduk->update($request);

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

          $jenisProduk = new JenisProduk();
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
                        'message' => 'Jenis produk berhasil dihapus'
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
