<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\JenisProduk;

class JenisProdukController extends Controller
{

  public function __construct()
  { }

  public function fetch()
  {
    $jenisProduk = new JenisProduk();
    $fetchedData = $jenisProduk->fetch();
    $data = [
      'count' => count($fetchedData),
      'data' => $fetchedData
    ];

    echo json_encode($data);
  }

  public function insert($data)
  {
    if (session_id() == '') {
      session_start();
    }

    $jenisProduk = new JenisProduk();
    $request = $data;

    if (isset($_SESSION['login_user'])) {
      if ($_SESSION['login_user']['idHakAkses'] == 1) {

        $result = $jenisProduk->insert($request);

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
    } else {
      $response = [
        'status' => 501,
        'pesan' => 'Akses tidak diizinkan'
      ];
    }
    echo json_encode($response);
  }

  public function update($data)
  {
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
    } else {
      $response = [
        'status' => 501,
        'pesan' => 'Akses tidak diizinkan'
      ];
    }
    echo json_encode($response);
  }

  public function delete($requestData)
  {
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
