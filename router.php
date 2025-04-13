<?php

$controllerName = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? null;

if (!$action) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No se ha especificado una acción.']);
    exit;
}

switch (strtolower($controllerName)) {
    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new \Controllers\AuthController();
        break;
    case 'clientes':
        require_once 'controllers/ClientesController.php';
        $controller = new \Controllers\ClientesController();
        break;
    case 'productos':
        require_once 'controllers/ProductoController.php';
        $controller = new \Controllers\ProductoController();
        break;
    case 'pagos':
        require_once 'controllers/PagoController.php';
        $controller = new \Controllers\PagoController();
        break;
    case 'proveedores':
        require_once 'controllers/ProveedoresController.php';
        $controller = new \Controllers\ProveedoresController();
        break;
    case 'categoria':
        require_once 'controllers/CategoriaController.php';
        $controller = new \Controllers\CategoriaController();
        break;
    case 'tipousuario':
        require_once 'controllers/TipoUsuarioController.php';
        $controller = new \Controllers\TipoUsuarioController();
        break;
    case 'tipocliente':
        require_once 'controllers/TipoClienteController.php';
        $controller = new \Controllers\TipoClienteController();
        break;
    case 'metodopago':
        require_once 'controllers/Metodo_PagoController.php';
        $controller = new \Controllers\MetodoPagoController();
        break;
    case 'ventas':
        require_once 'controllers/VentaController.php';
        $controller = new \Controllers\VentaController();
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Controlador no válido.']);
        exit;
}

if (!method_exists($controller, $action)) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Acción no válida para este controlador.']);
    exit;
}

$controller->{$action}();
