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
use App\Controllers\WishItemController;
use App\Controllers\CartController;
use App\Controllers\OrderController;
use App\File;

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

$router->get("/registrasi/berhasil", function () {
    $pengguna = new PenggunaController();
    $apikey = $_GET['key'];
    $pengguna->index_berhasil_registrasi($apikey);
});

$router->get("/forgot-password", function () {
    $pengguna = new PenggunaController();
    $pengguna->index_forgot_password();
});

$router->get("/tentang", function () {
  BerandaController::getInstance()->index_tentang();
});

$router->get("/pembayaran",function(){
    BerandaController::getInstance()->index_pembayaran();
});

$router->get("/produk/detail-produk/{idProduk}",function($idProduk){
  BerandaController::getInstance()->detail_produk($idProduk);
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

$router->get('/api/produk/hewan', function(){
  $produk = new ProdukController();
  $produk->fetch(['idJenis' => 1]);
});

$router->get('/api/produk/kebutuhan', function(){
  $produk = new ProdukController();
  $produk->fetch(['idJenis' => 2]);
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

$router->get("/profile/wishlist",function(){
  $pengguna = new PenggunaController();
  $pengguna->index_wishlist();
});

$router->get("/profile/riwayat-pemesanan",function(){
  $pengguna = new PenggunaController();
  $pengguna->index_riwayat_pemesanan();
});


$router->get('/api/pengguna', function(){
  $pengguna = new PenggunaController();
  $pengguna->fetch();
});
$router->post('/api/pengguna/tambah', function(){
  $pengguna = new PenggunaController();
  $requestData = [
    'penggunaData' => $_POST,
    'penggunaFoto' => File::convertToReadable($_FILES['fotoProfile'])
  ];
  $pengguna->insert($requestData);
});
$router->post('/api/pengguna/hapus', function(){
  $pengguna = new PenggunaController();
  $pengguna->delete();
});
$router->post('/api/pengguna/ubah', function(){
  $pengguna = new PenggunaController();
  $requestData = [
    'penggunaData' => $_POST,
    'penggunaFoto' => File::convertToReadable($_FILES['fotoProfile'])
  ];
  $pengguna->update($requestData);
});
$router->post('/api/pengguna/profil/ubah', function(){
  $pengguna = new PenggunaController();
  $requestData = [
    'penggunaData' => $_POST,
    'penggunaFoto' => File::convertToReadable($_FILES['fotoProfile'])
  ];
  $pengguna->update_by_user($requestData);
});
$router->post('/api/pengguna/profil/ubah/password', function(){
  $pengguna = new PenggunaController();
  $requestData = $_POST;
  $pengguna->update_password_by_user($requestData);
  // echo json_encode($requestData);
});

$router->post('/api/produk/tambah', function(){
  $produk = new ProdukController();

  $arrangeArray = File::convertToReadable($_FILES['fotoProduk']);

  $request = [
    'produkData' => $_POST,
    'foto' => $arrangeArray
    ];
  $produk->insert($request);
  // echo json_encode($request);

});
$router->post('/api/produk/ubah', function(){
  $produk = new ProdukController();
  $arrangeArray = $produk->reArrangeFotoData($_FILES['fotoProduk']);

  $request = [
    'produkData' => $_POST,
    'foto' => $arrangeArray
    ];

  $produk->update($request);
  // echo json_encode($request);
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

$router->get('/api/wishlist', function(){
  $wishItemController = new WishItemController();
  $request= [
    'idPengguna' => $_SESSION['login_user']['id']
  ];
  $wishItemController->fetch_by($request);
});

$router->post('/api/wishlist/tambah', function(){
  $wishItemController = new WishItemController();
  $request = $_POST;
  $request['idPengguna'] = $_SESSION['login_user']['id'];
  $wishItemController->insert($request);
});

$router->post('/api/wishlist/hapus', function(){
  $wishItemController = new WishItemController();
  $request = $_POST;
  $request['idPengguna'] = $_SESSION['login_user']['id'];
  $wishItemController->delete($request);
});


$router->get('/api/cart', function(){
  $cartController = new CartController();
  $request= [
    'idPengguna' => $_SESSION['login_user']['id']
  ];
  $cartController->fetch_by($request);
});

$router->post('/api/cart/tambah', function(){
  $cartController = new CartController();
  $request = $_POST;
  $request['idPengguna'] = $_SESSION['login_user']['id'];
  $cartController->insert($request);
});

$router->post('/api/cart/hapus', function(){
  $cartController = new CartController();
  $request = $_POST;
  $request['idPengguna'] = $_SESSION['login_user']['id'];
  $cartController->delete($request);
});

$router->post('/api/order/tambah', function(){
  $cartController = new CartController();
  $payload = [
    'idPengguna' => $_SESSION['login_user']['id']
  ];
  ob_start();
  $cartController->fetch_by($payload);
  $userShoppingCart = ob_get_clean();
  
  $payload['cartData'] = json_decode($userShoppingCart,true)['data'];
  $payload['userData'] = [
    'id' => $_SESSION['login_user']['id'],
    'nama' => $_SESSION['login_user']['nama'],
    'alamat' => $_SESSION['login_user']['alamat'],
    'noTelepon' => $_SESSION['login_user']['noTelepon'],
  ];

  $cartController->render_page('pembayaran', ['data' => $payload]);
});

$router->get('/pembayaran/{transactionHash}', function($transactionHash){
  $orderController = new OrderController();
  $orderController->renderTransactionPage($transactionHash);
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
    BerandaController::getInstance()->error_404();
    // print($e);
} catch (Exception $e) {
    BerandaController::getInstance()->error_404();
    // print($e);
}
