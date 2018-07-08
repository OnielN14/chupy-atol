<?php
require_once __DIR__.'/vendor/autoload.php';
define('ROOTPATH', __DIR__);

use MiladRahimi\PHPRouter\Router;
use App\Controllers\BerandaController;
use App\Controllers\PenggunaController;
use App\Controllers\AdminController;
use App\Controllers\ProdukController;
use App\Controllers\JenisProdukController;
use App\Controllers\KategoriProdukController;
use App\Controllers\HakAksesController;
use App\Controllers\ApiController;
use App\Controllers\KotakSaranController;


$router = new Router();

session_start();

# Route
$router->get("/", function () {
    BerandaController::getInstance()->index();
});

$router->map(['GET'],['/admin/dashboard','/admin/dashboard/user', '/admin/dashboard/produk', '/admin/dashboard/kategori', '/admin/dashboard/jenis','/admin/dashboard/kotak_saran'], function () {
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

$router->post('/api/jenis_produk/tambah', function(){
  $jenisProduk = new JenisProdukController();
  $requestData = $_POST;
  $jenisProduk->insert($requestData);
});

$router->post('/api/jenis_produk/ubah', function(){
  $jenisProduk = new JenisProdukController();
  $requestData = $_POST;
  $jenisProduk->update($requestData);
});

$router->post('/api/jenis_produk/hapus', function(){
  $jenisProduk = new JenisProdukController();
  $requestData = $_POST;
  $jenisProduk->delete($requestData);
});


$router->get('/api/kategori_produk', function(){
  $jenisProduk = new KategoriProdukController();
  $jenisProduk->fetch();
});

$router->get('/api/kategori_produk/jenis/{idjenis}', function($idjenis){
  $jenisProduk = new KategoriProdukController();
  $jenisProduk->fetch_by(['idJenis'=>$idjenis]);
});

$router->post('/api/kategori_produk/tambah', function(){
  $kategoriProduk = new KategoriProdukController();
  $requestData = $_POST;
  $kategoriProduk->insert($requestData);
});

$router->post('/api/kategori_produk/ubah', function(){
  $kategoriProduk = new KategoriProdukController();
  $requestData = $_POST;
  $kategoriProduk->update($requestData);
});

$router->post('/api/kategori_produk/hapus', function(){
  $kategoriProduk = new KategoriProdukController();
  $requestData = $_POST;
  $kategoriProduk->delete($requestData);
});

$router->get('/api/hak_akses', function(){
  $hakAkses = new HakAksesController();
  $hakAkses->fetch();
});

$router->get('/api/pengguna', function(){
  $pengguna = new PenggunaController();
  $pengguna->fetch();
});

$router->post('/api/pengguna/tambah', function(){
  $pengguna = new PenggunaController();
  $pengguna->insert();
});


$router->get("/profile",function(){
  $pengguna = new PenggunaController();
  $pengguna->index_profil();
});

$router->get("/profile/keranjang",function(){
  $pengguna = new PenggunaController();
  $pengguna->index_keranjang();
});

$router->get("/profile/pengaturan", function(){
  $pengguna = new PenggunaController();
  $pengguna->index_pengaturan();
});
$router->post('/api/pengguna/hapus', function(){
  $pengguna = new PenggunaController();
  $pengguna->delete();
});

$router->post('/api/pengguna/ubah', function(){
  $pengguna = new PenggunaController();
  $pengguna->update();
});

$router->post('/api/produk/tambah', function(){
  $produk = new ProdukController();
  $request = $_POST;
  $produk->insert($request);
});
$router->post('/api/produk/ubah', function(){
  $produk = new ProdukController();
  $request = $_POST;
  $produk->update($request);
});
$router->post('/api/produk/hapus', function(){
  $produk = new ProdukController();
  $request = $_POST;
  $produk->delete($request);
});

$router->post('/kotak_saran', function(){
  $kotakSaran = new KotakSaranController();
  $request = $_POST;
  $kotakSaran->insert($request);
});

$router->get('/api/kotak_saran', function(){
  $kotakSaran = new KotakSaranController();
  $kotakSaran->fetch();
});

$router->post('/api/kotak_saran/hapus', function(){
  $kotakSaran = new KotakSaranController();
  $request = $_POST;
  $kotakSaran->delete($request);
});

$router->get("/logout", function () {
    session_start();

    if (session_destroy()) {
        header("Location: /");
    }
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
