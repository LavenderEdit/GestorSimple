<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Content-Type: application/json");

require_once __DIR__ . '/../controllers/ProveedoresController.php';

use Controllers\ProveedoresController;

$action = strtolower($_GET['action'] ?? '');

$controller = new ProveedoresController();

switch ($action) {
    case 'insertarproveedor':
        $controller->insertarProveedor();
        break;

    case 'editarproveedor':
        $controller->editarProveedor();
        break;

    case 'deleteproveedor':
        $controller->deleteProveedor();
        break;

    case 'getproveedores':
        $controller->getProveedores();
        break;

    case 'obtenerproveedorporid':
        $controller->obtenerProveedorPorId();
        break;

    case 'buscarproveedorespornomoid':
        $controller->buscarProveedoresPorNomOId();
        break;

    case 'obtenerproductosporprovid':
        $controller->obtenerProductosPorProvId();
        break;

    default:
        http_response_code(400);
        echo json_encode([
            "error" => true,
            "message" => "Acción no válida. Utiliza una acción válida en la URL."
        ]);
        break;
}
