<?php
require_once __DIR__.'/vendor/autoload.php';
define('ROOTPATH', __DIR__);

use MiladRahimi\PHPRouter\Router;
use App\Controllers\BerandaController;

$router = new Router();

# Route
$router->get("/", function(){
  BerandaController::getInstance()->index();
});

try {
    $router->dispatch();
} catch(Exception $e) {
    BerandaController::getInstance()->error_404();
}
