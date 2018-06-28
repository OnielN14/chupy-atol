<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\User;

class UserController extends Controller{

  public function resetPassword($request){
    $attempData = Validation::clearInput($request);

    if(Validation::emailValidation($attempData)){

      $user = new User();
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
