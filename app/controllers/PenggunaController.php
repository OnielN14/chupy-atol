<?php

namespace App\Controllers;

use App\Controller;
use App\File;
use App\Models\Pengguna;
use App\Models\HakAkses;
use App\Models\WishItem;
use App\Models\Cart;
use App\Models\ApiKey;
use App\Controllers\ApiController;
use App\Controllers\OrderController;

class PenggunaController extends Controller
{
    public function __construct()
    {
      if(session_id() == ''){
        session_start();
      }
    }

    public function index_register()
    {

      if (isset($_SESSION['login_user'])) {
        header('Location: /');
      }
      else{
        $this->render_page('registrasi', ['apikey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
      }

    }

    public function index_berhasil_registrasi($apikey){
      $apiKeyController = new ApiController();
      $theApikey = $apiKeyController->fetch_by(['user'=>'front_end'])[0]['apikey'];
      if (strcmp($apikey, $theApikey) == 0) {
        $this->render_page('registrasi_success');
      }
      else{
        $this->render_page('404');
      }
    }

    public function index_login()
    {
      if (isset($_SESSION['login_user'])) {
        header('Location: /');
      }
      else{
        $this->render_page('login', ['apikey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
      }
    }

  public function index_pengaturan(){
    if (isset($_SESSION['login_user'])) {
      $userData = $_SESSION['login_user'];
      $this->render_page('pengaturan', ['pengguna' => $userData,'apikey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
    }
    else{
      header('Location:/');
    }
  }

  public function index_wishlist(){
    $idPengguna = $_SESSION['login_user']['id'];
    $wishItem = new WishItem();
    $fetchedData = $wishItem->fetch_detail_by_user($idPengguna);
    $data = [
        'count' => count($fetchedData),
        'data' => $fetchedData
    ];

    $this->render_page('wishlist', ['data' =>$data]);
  }

  public function index_riwayat_pemesanan(){
    $this->render_page('riwayat_pemesanan');
  }

    public function index_forgot_password()
    {
        $this->render_page('forgot-password');
    }

  public function index_keranjang(){

    $idPengguna = $_SESSION['login_user']['id'];
    $cart = new Cart();
    $fetchedData = $cart->fetch_detail_by_user($idPengguna);
    $data = [
        'count' => count($fetchedData),
        'data' => $fetchedData
    ];
    
    $this->render_page('keranjang', [
      'apikey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey'],
      'data'=>$data
      ]);
  }

  public function index_profil(){
    $pengguna = new Pengguna();
    $orderController = new OrderController();
    ob_start();
    $orderController->fetch_by(['idPengguna'=>$_SESSION['login_user']['id']]);
    $ouput = ob_get_clean();
    $userOrderData = json_decode($ouput,true);

    // print_r($userOrderData);

    if (isset($_SESSION['login_user'])) {
        if ($_SESSION['login_user']['idHakAkses'] == 1 || $_SESSION['login_user']['idHakAkses'] == 2) {
          $userData = $pengguna->fetch_by(['id' => $_SESSION['login_user']['id']]);
          $this->render_page('profil',['pengguna'=>$userData[0], 'orderData' => $userOrderData['data'], 'apikey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
        }
        else{
          header('Location: /');
        }
    }
    else{
      header('Location: /');
    }

  }

    public function login()
    {
        $pengguna = new Pengguna();
        $request = $_POST;
        $requestUser = [
      'email' => $_POST['user_email'],
      'password' => sha1($_POST['user_pass'])
    ];

        $userData = $pengguna->fetch_login_data(['email'=>$requestUser['email']])[0];

        if (strcmp($requestUser['password'], $userData['password']) == 0) {
            $_SESSION['login_user'] = $userData;

            if ($userData['idHakAkses'] == 1) {
                header('Location: /admin/dashboard');
            } elseif ($userData['idHakAkses'] == 2) {
                header('Location: /');
            }
        } else {
            echo 'wew';
        }
    }

    public function fetch()
    {
        $user = new Pengguna();

        $fetchedData = $user->fetch();

        $data = [
          'data' => $fetchedData,
          'count' =>count($fetchedData)
        ];

        echo json_encode($data);
    }

    public function delete()
    {
        if (session_id() == '') {
            session_start();
        }
        $user = new Pengguna();
        $request = $_POST;
        $data = [
          'id' => $request['id']
        ];

        $response = '';
        if (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {

                $oldUserData = $user->fetch_by($data)[0];
                File::deleteFile($oldUserData['fotoProfile']);
                if ($user->delete_by($data)) {
                    $response = [
                      'status' => 200,
                      'message' => 'Pengguna berhasil dihapus'
                    ];
                } else {
                    $response = [
                      'status' => 501,
                      'message' => 'Terjadi Kesalahan'
                    ];
                }
            } else {
                $response = [
                  'status' => 500,
                  'message' => 'Tidak diizinkan'
                ];
            }
        } else {
            $response = [
        'status' => 500,
        'message' => 'Tidak diizinkan'
      ];
        }

        echo json_encode($response);
    }

    public function update_password_by_user($requestData){
      if (session_id() == '') {
          session_start();
      }

      $pengguna = new Pengguna();
      $oldUserData = $pengguna->fetch_by(['id' => $requestData['id']])[0];

      $response = '';

      if (strcmp(sha1($requestData['password']),$oldUserData['password']) == 0) {
        $newUserData = [
          'id' => $requestData['id'],
          'password' => sha1($requestData['newPassword'])
        ];
        $result = $pengguna->update_password($newUserData);
        $response = [
          'status' => 200,
          'pesan' => 'Password berhasil diubah',
          'hasil' => $result
        ];
      }
      else{
        $response = [
          'status'=>201,
          'pesan' => 'Password salah'
        ];
      }

      echo json_encode($response);
    }

    public function update_by_user($requestData){
      if (session_id() == '') {
          session_start();
      }

      $pengguna = new Pengguna();
      $request = $requestData['penggunaData'];
      $fotoData = $requestData['penggunaFoto'];

      $response = '';

      $oldUserData = $pengguna->fetch_by(['email' => $request['email']])[0];

      $request['id'] = $oldUserData['id'];

      if ($fotoData['name'] == '') {
        $pengguna->update_by_user_no_photo($request);
      }
      else{
        $fotoData['name'] = strtolower('user-'.pathinfo($fotoData['name'],PATHINFO_FILENAME).'.'.pathinfo($fotoData['name'], PATHINFO_EXTENSION));

        $namaFoto = $fotoData['name'];
        $request['fotoProfile'] = $namaFoto;
        $result = $pengguna->update_by_user_with_photo($request);
        $response = [
          'result' => $result,
          'oldPhoto' => $oldUserData['fotoProfile'],
          'newPhoto' => $namaFoto
        ];

        File::deleteFile($oldUserData['fotoProfile']);
        File::upload($fotoData);
      }

      $userData = $pengguna->fetch_by(['email' => $request['email']])[0];
      $_SESSION['login_user'] = $userData;

      echo json_encode($response);
    }

    public function update($requestData)
    {
        if (session_id() == '') {
            session_start();
        }
        $hakAkses = new HakAkses();
        $pengguna = new Pengguna();
        $request = $requestData['penggunaData'];
        $fotoData = $requestData['penggunaFoto'];

        $response = '';

        $oldUserData = $pengguna->fetch_by(['email' => $request['email']])[0];

        $namaFoto = '';
        if ($fotoData['name'] != '') {
          $fotoData['name'] = strtolower('user-'.pathinfo($fotoData['name'],PATHINFO_FILENAME).'.'.pathinfo($fotoData['name'], PATHINFO_EXTENSION));

          $namaFoto = $fotoData['name'];
        }
        else{
          $namaFoto = 'none';
        }

        if (isset($request['front_end_key'])) {
            $userFrontAPI = 'front_end';
            $apiKeyData = ApiController::getInstance()->fetch_by(['user'=>$userFrontAPI]);

            if (count($apiKeyData) > 0) {
                $apiData = $apiKeyData[0];

                if (strcmp($request['front_end_key'], $apiData['apikey']) == 0) {
                    $newPassword = '';
                    if ($request['password'] == '') {
                        $newPassword = $oldUserData['password'];
                    } else {
                        $newPassword = sha1($request['password']);
                    }

                    $userData = [
                    'id' => $oldUserData['id'],
                    'nama' => $request['nama'],
                    'alamat' => $request['alamat'],
                    'gender' => $request['gender'],
                    'tempatLahir' => $request['tempatLahir'],
                    'tanggalLahir' => $request['tanggalLahir'],
                    'email' => $oldUserData['email'],
                    'noTelepon' => $request['noTelepon'],
                    'password' => $newPassword,
                    'fotoProfile' => $namaFoto,
                    'idHakAkses' => 2
                  ];

                    $pengguna->update($userData);
                    File::deleteFile($oldUserData['fotoProfile']);
                    File::upload($fotoData);

                    $response = [
                      'status' => 200,
                      'pesan' => 'Sukses'
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
        } elseif (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {
                $newPassword = '';
                if ($request['password'] == '') {
                    $newPassword = $oldUserData['password'];
                } else {
                    $newPassword = sha1($request['password']);
                }

                $userData = [
                  'id' => $oldUserData['id'],
                  'nama' => $request['nama'],
                  'alamat' => $request['alamat'],
                  'gender' => $request['gender'],
                  'tempatLahir' => $request['tempatLahir'],
                  'tanggalLahir' => $request['tanggalLahir'],
                  'email' => $oldUserData['email'],
                  'noTelepon' => $request['noTelepon'],
                  'password' => $newPassword,
                  'idHakAkses' => $request['idHakAkses'],
                  'fotoProfile' => $namaFoto,
                ];

                $pengguna->update($userData);
                File::upload($fotoData);
                File::deleteFile($oldUserData['fotoProfile']);
                $response = [
                'status' => 200,
                'pesan' => 'Sukses',
                'oldData' => $oldUserData,
                'newData' => $request
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

    public function insert($requestData)
    {
        if (session_id() == '') {
            session_start();
        }
        $hakAkses = new HakAkses();
        $pengguna = new Pengguna();
        $request = $requestData['penggunaData'];
        $fotoData = $requestData['penggunaFoto'];

        $namaFoto = '';
        if ($fotoData['name'] != '') {
          $fotoData['name'] = strtolower('user-'.pathinfo($fotoData['name'],PATHINFO_FILENAME).'.'.pathinfo($fotoData['name'], PATHINFO_EXTENSION));

          $namaFoto = $fotoData['name'];
        }
        else{
          $namaFoto = 'none';
        }

        $response = '';

        if (isset($request['front_end_key'])) {
            $userFrontAPI = 'front_end';
            $apiKeyData = ApiController::getInstance()->fetch_by(['user'=>$userFrontAPI]);

            if (count($apiKeyData) > 0) {
                $apiData = $apiKeyData[0];
                if (strcmp($request['front_end_key'], $apiData['apikey']) == 0) {
                    $userData = [
                      'nama' => $request['nama'],
                      'alamat' => $request['alamat'],
                      'gender' => $request['gender'],
                      'tempatLahir' => $request['tempatLahir'],
                      'tanggalLahir' => $request['tanggalLahir'],
                      'email' => $request['email'],
                      'noTelepon' => $request['noTelepon'],
                      'password' => sha1($request['password']),
                      'idHakAkses' => 2,
                      'fotoProfile' => $namaFoto
                    ];

                    $result = $pengguna->insert($userData);
                    if ($fotoData != '') {
                      File::upload($fotoData);
                    }

                    $response = [
                      'status' => 200,
                      'pesan' => 'Sukses',
                      'hasil' => $result
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
        } elseif (isset($_SESSION['login_user'])) {
            if ($_SESSION['login_user']['idHakAkses'] == 1) {
                $userData = [
                'nama' => $request['nama'],
                'alamat' => $request['alamat'],
                'gender' => $request['gender'],
                'tempatLahir' => $request['tempatLahir'],
                'tanggalLahir' => $request['tanggalLahir'],
                'email' => $request['email'],
                'noTelepon' => $request['noTelepon'],
                'password' => sha1($request['password']),
                'idHakAkses' => $request['idHakAkses'],
                'fotoProfile' => $namaFoto
              ];

                $pengguna->insert($userData);
                if ($fotoData != '') {
                  File::upload($fotoData);
                }


                $response = [
                'status' => 200,
                'pesan' => 'Sukses'
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
}
