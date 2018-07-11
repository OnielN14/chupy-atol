<?php

namespace App\Controllers;

use App\Validation;
use App\Controller;
use App\Models\Produk;
use App\Controllers\ApiController;

class BerandaController extends Controller
{

    private static $instance = null;

    public static function getInstance()
    {
        return isset(self::$instance) ? self::$instance : self::$instance = new BerandaController();
    }

    public function __construct(){
      if(session_id() == ''){
        session_start();
      }
    }

    public function index()
    {
        $this->render_page('main-page', ['apikey'=>ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
    }

    public function index_daftar_hewan(){
      $this->render_page('produk_hewan', ['apikey'=>ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
    }

    public function index_daftar_kebutuhan(){
      $this->render_page('produk_barang', ['apikey'=>ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]['apikey']]);
    }

    public function index_pembayaran(){
      $this->render_page('pembayaran');
    }

    public function index_detail_barang(){
      $this->render_page('detail_barang');
    }

    public function error_404(){
      $this->render_page('404');
    }

    public function detail_produk($idProduk){
        $produk = new Produk();
        $listProduk = $produk->fetch_by_produk(["idProduk"=>$idProduk]);
        $this->render_page('detail_barang',["produk"=>$listProduk[0]]);
        

    }
}
