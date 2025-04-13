<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Content-Type: application/json");

require_once __DIR__ . '/../controllers/ProductoController.php';

use Controllers\ProductoController;

$action = $_GET['action'] ?? '';

$controller = new ProductoController();

switch (strtolower($action)) {
    case 'insertarproducto':
        $controller->insertarProducto();
        break;
    case 'editarproducto':
        $controller->editarProducto();
        break;
    case 'eliminarproducto':
        $controller->eliminarProducto();
        break;
    case 'buscarporid':
        $controller->buscarPorId();
        break;
    case 'obtenerlistaproductos':
        $controller->obtenerListaProductos();
        break;
    case 'buscarfiltro':
        $controller->buscarFiltro();
        break;
    default:
        http_response_code(400);
        echo json_encode(["error" => true, "message" => "Acción no válida"]);
        break;
}
