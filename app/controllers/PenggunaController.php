<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Pengguna;

class PenggunaController extends Controller{

  private $pengguna;

  public function __construct(){
    $this->pengguna = new Pengguna();
  }

  public function index_register(){
    $this->render_page('registrasi');
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
    return json_encode($user->fetch());
  }

  public function fetch_by_id($id){
    $user = new Pengguna();

    return json_encode($user->fetch_by_id($id));
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
