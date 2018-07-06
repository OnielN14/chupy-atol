<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Pengguna;
use App\Models\HakAkses;
use App\Models\ApiKey;
use App\Controllers\ApiController;

class PenggunaController extends Controller
{
    public function __construct()
    {
    }

    public function index_register()
    {
        $this->render_page('registrasi', ['apiKey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
    }

    public function index_login()
    {
        $this->render_page('login');
    }

    public function index_forgot_password()
    {
        $this->render_page('forgot-password');
    }

    public function login()
    {
        $pengguna = new Pengguna();
        $request = $_POST;
        $requestUser = [
      'email' => $_POST['user_email'],
      'password' => sha1($_POST['user_pass'])
    ];

        $userData = $pengguna->fetch_by(['email'=>$requestUser['email']])[0];

        if (strcmp($requestUser['password'], $userData['password']) == 0) {
            session_start();
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

    public function update()
    {
        if (session_id() == '') {
            session_start();
        }
        $hakAkses = new HakAkses();
        $pengguna = new Pengguna();
        $request = $_POST;

        $response = '';

        $oldUserData = $pengguna->fetch_by(['email' => $request['email']])[0];

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
            'idHakAkses' => 2
          ];

                    $pengguna->update($userData);

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
          'idHakAkses' => $request['idHakAkses']
        ];

                $pengguna->update($userData);

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

    public function insert()
    {
        if (session_id() == '') {
            session_start();
        }
        $hakAkses = new HakAkses();
        $pengguna = new Pengguna();
        $request = $_POST;

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
            'idHakAkses' => 2
          ];

                    $result = $pengguna->insert($userData);
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
          'idHakAkses' => $request['idHakAkses']
        ];

                $pengguna->insert($userData);
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
