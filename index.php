<?php
require_once __DIR__.'/vendor/autoload.php';
define('ROOTPATH', __DIR__);

use MiladRahimi\PHPRouter\Router;
use App\Controllers\BerandaController;
use App\Controllers\PenggunaController;
use App\Controllers\AdminController;
use App\Controllers\ProdukController;
use App\Controllers\JenisProdukController;
use App\Controllers\HakAksesController;
use App\Controllers\ApiController;


$router = new Router();

session_start();

# Route
$router->get("/", function () {
    BerandaController::getInstance()->index();
});

$router->map(['GET'],['/admin/dashboard','/admin/dashboard/user', '/admin/dashboard/produk', '/admin/dashboard/kategori', '/admin/dashboard/jenis'], function () {
    $admin = new AdminController();
    $admin->index();
});

$router->map(['GET'], '/produk', "/produk/", function () {
    header('Location: /#produk');
});

$router->get("/login", function () {
    $pengguna = new PenggunaController();
    $pengguna->index_login();
});

$router->post("/login", function () {
    $pengguna = new PenggunaController();
    $pengguna->login();
});

$router->get("/registrasi", function () {
    $pengguna = new PenggunaController();
    $pengguna->index_register();
});

$router->get("/forgot-password", function () {
    $pengguna = new PenggunaController();
    $pengguna->index_forgot_password();
});

$router->get("/produk/hewan", function () {
    BerandaController::getInstance()->index_daftar_hewan();
});
$router->get("/produk/kebutuhan", function () {
    BerandaController::getInstance()->index_daftar_kebutuhan();
});

$router->get('/api/produk', function(){
  $produk = new ProdukController();
  $produk->fetch();
});

$router->get('/api/jenis_produk', function(){
  $jenisProduk = new JenisProdukController();
  $jenisProduk->fetch();
});

$router->get('/api/hak_akses', function(){
  $hakAkses = new HakAksesController();
  $hakAkses->fetch();
});

$router->get('/api/pengguna', function(){
  $produk = new PenggunaController();
  $produk->fetch();
});

$router->post('/api/pengguna/registrasi', function(){
  $produk = new PenggunaController();
  $produk->insert();
});

$router->get("/logout", function () {
    session_start();

    if (session_destroy()) {
        header("Location: /");
    }
});

$router->get("/test", function () {
    print_r(ApiController::getInstance()->fetch_by(['user'=>'front_end'])[0]);
});


try {
    $router->dispatch();
} catch (PDOException $e) {
    // BerandaController::getInstance()->error_404();
    print($e);
} catch (Exception $e) {
    // BerandaController::getInstance()->error_404();
    print($e);
}
