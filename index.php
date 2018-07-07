<?php
require_once __DIR__.'/vendor/autoload.php';
define('ROOTPATH', __DIR__);

use MiladRahimi\PHPRouter\Router;
use App\Controllers\BerandaController;
use App\Controllers\PenggunaController;

$router = new Router();

# Route
$router->get("/", function(){
  BerandaController::getInstance()->index();
});

$router->map(['GET'],['/produk',"/produk/"], function(){
  header('Location: /#produk');
});

$router->get("/login", function(){
  $pengguna = new PenggunaController();
  $pengguna->index_login();
});

$router->get("/registrasi", function(){
  $pengguna = new PenggunaController();
  $pengguna->index_register();
});

$router->get("/forgot-password", function(){
  $pengguna = new PenggunaController();
  $pengguna->index_forgot_password();
});

$router->get("/produk/hewan", function(){
  BerandaController::getInstance()->index_daftar_hewan();
});

$router->get("/profil/pengaturan", function(){
  $pengguna = new PenggunaController();
  $pengguna->index_pengaturan();
});

try {
    $router->dispatch();
} catch(Exception $e) {
    BerandaController::getInstance()->error_404();
}
