<?php
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\ClienteController;
use Controllers\ProductoController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

//producto
$router->get('/', [AppController::class, 'index']);
$router->get('/producto', [ProductoController::class, 'index']);
$router->get('/API/producto/buscar', [ProductoController::class, 'buscarAPI']);
$router->post('/API/producto/guardar', [ProductoController::class, 'guardarAPI']);
$router->post('/API/producto/modificar', [ProductoController::class, 'modificarAPI']);
$router->post('/API/producto/eliminar', [ProductoController::class, 'eliminarAPI']);

//cliente
$router->get('/cliente', [ClienteController::class, 'index']);
$router->get('/API/cliente/buscar', [ClienteController::class, 'buscarAPI']);
$router->post('/API/cliente/guardar', [ClienteController::class, 'guardarAPI']);
$router->post('/API/cliente/modificar', [ClienteController::class, 'modificarAPI']);
$router->post('/API/cliente/eliminar', [ClienteController::class, 'eliminarAPI']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
