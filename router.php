<?php
// router.php

// Habilitar errores para depuración (opcional en producción)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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
