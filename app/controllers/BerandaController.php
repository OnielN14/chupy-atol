<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;

class BerandaController extends Controller
{

    private static $instance = null;

    public static function getInstance()
    {
        return isset(self::$instance) ? self::$instance : self::$instance = new BerandaController();
    }

    public function index()
    {
        $this->render_page('main-page');
    }

    public function index_daftar_hewan(){
      $this->render_page('produk_hewan');
    }

    public function error_404(){
      $this->render_page('404');
    }
}
