<?php

namespace App\Controllers;

use App\File;
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

  public function fetch_by_produk($produkData)
  {
    $fotoProduk = new FotoProduk();
    $fetchedData = $fotoProduk->fetch_by_produk($produkData);
    return $fetchedData;
  }

  public function insertMultiple($data){
      if (session_id() == '') {
          session_start();
      }

      $fotoProduk = new FotoProduk();
      $request = $data;

      $result = $fotoProduk->insertMultiple($request);
      if ($result[0] == 0) {
        File::uploadMultiFile($request);
      }
      return $response = ['result' => $result];

    }

    public function delete($requestData){
        if (session_id() == '') {
            session_start();
        }

        $fotoProduk = new FotoProduk();

        $deletedFoto = $fotoProduk->fetch_by($requestData);
        foreach($deletedFoto as $foto){
          File::deleteFile($foto['gambar']);
        }

        $response = '';
        if (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {
                if ($fotoProduk->delete_by($requestData)) {
                    $response = [
                      'status' => 200,
                      'message' => 'Foto produk berhasil dihapus'
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

        return $response;
    }
}
