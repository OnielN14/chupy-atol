<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Pengguna;
use App\Models\HakAkses;
use App\Models\ApiKey;
use App\Controllers\ApiController;

class PenggunaController extends Controller{

  private $pengguna;

  public function __construct(){
    $this->pengguna = new Pengguna();
  }

  public function index_register(){

    $this->render_page('registrasi', ['apiKey' => ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
  }

  public function index_login(){
    $this->render_page('login');
  }

  public function index_forgot_password(){
    $this->render_page('forgot-password');
  }

  public function login(){
    $request = $_POST;
    $requestUser = [
      'email' => $_POST['user_email'],
      'password' => sha1($_POST['user_pass'])
    ];

    $userData = $this->pengguna->get_user_by_email($requestUser['email'])[0];

    if (strcmp($requestUser['password'], $userData['password']) == 0) {

      session_start();
      $_SESSION['login_user'] = $userData;

      if ($userData['idHakAkses'] == 1) {
        header('Location: /admin/dashboard');
      }
      else if($userData['idHakAkses'] == 2){
        header('Location: /');
      }

    }
    else{
      echo 'wew';
    }
  }

  public function fetch(){
    $user = new Pengguna();

    $data = [
      'data' => $user->fetch()
    ];

    echo json_encode($data);
  }

  public function insert(){
    session_start();
    $hakAkses = new HakAkses();
    $pengguna = new Pengguna();
    $request = $_POST;

    if (isset($request['front_end_key'])) {
      $userFrontAPI = 'front_end';
      $apiKeyData = ApiController::getInstance()->fetch_by(['user'=>$userFrontAPI]);

      if (count($apiKeyData) > 0) {
        $apiData = $apiKeyData[0];

        if (strcmp($request['front_end_key'],$apiData['apikey']) == 0) {

          $userData = [
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'gender' => $request['gender'],
            'tempatLahir' => $request['tempatLahir'],
            'tanggalLahir' => $request['tanggalLahir'],
            'email' => $request['email'],
            'noTelepon' => $request['noTelepon'],
            'password' => sha1($request['noTelepon']),
            'idHakAkses' => 2
          ];

          $pengguna->insert($userData);
        }
        else{
          echo "Not Allowed";
        }
      }
      else{
        echo "Not Allowed";
      }
    }
    else if (isset($_SESSION['login_user'])) {
      if ($_SESSION['login_user']['idHakAkses'] == 1) {

        $userData = [
          'nama' => $request['nama'],
          'alamat' => $request['alamat'],
          'gender' => $request['gender'],
          'tempatLahir' => $request['tempatLahir'],
          'tanggalLahir' => $request['tanggalLahir'],
          'email' => $request['email'],
          'noTelepon' => $request['noTelepon'],
          'password' => sha1($request['noTelepon']),
          'idHakAkses' => $request['idHakAkses']
        ];

        $pengguna->insert($userData);
      }
      else{
        print "User rendahan nggk boleh";
      }
    }
    else{
      print "Mo ngaps!!??";
    }
    // print_r($request);
  }

  public function resetPassword($request){
    $attempData = Validation::clearInput($request);

    if(Validation::emailValidation($attempData)){

      $user = new Pengguna();
      $result = $user->check_user_by_email($attempData);

      if (count($result) > 0) {
          $this->message=[
            'Status' => "Sukses",
            "Pesan" => "Tautan untuk mereset password sudah kami kirim ke $attempData. Silakan periksa kotak masuk emailmu."
          ];
      }
      else{
        $this->message=[
          'Status' => "Gagal",
          "Pesan" => "Email (".$attempData.") tidak terikat dengan akun manapun. Silakan daftar terlebih dahulu."
        ];
      }
    }
    else{
      $this->message = [
        'Status' => "Gagal",
        'Pesan' => 'Masukan yang kamu kirim ('.$attempData.'), tidak valid'
      ];
    }

    return $this->message;
  }

}
