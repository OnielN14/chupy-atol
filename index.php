<?php
require_once __DIR__.'/vendor/autoload.php';
define('ROOTPATH', __DIR__);

use MiladRahimi\PHPRouter\Router;
use App\Controllers\BerandaController;
use App\Controllers\PenggunaController;
use App\Controllers\AdminController;

$router = new Router();

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

$router->get("/logout", function () {
    session_start();

    if (session_destroy()) {
        header("Location: /");
    }
});

$router->get("/test", function () {
    echo json_encode($_GET);
});


try {
    $router->dispatch();
} catch (Exception $e) {
    // BerandaController::getInstance()->error_404();
    print_r($e);
}
