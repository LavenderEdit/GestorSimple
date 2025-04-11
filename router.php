<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/ClientesController.php';

use Controllers\AuthController;
use Controllers\ClientesController;

// Obtener los parámetros de la solicitud
$controllerName = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

if ($controllerName && $action) {
    // Mapear el nombre del controlador a la clase correspondiente
    switch ($controllerName) {
        case 'auth':
            $controller = new AuthController();
            break;
        case 'clientes':
            $controller = new ClientesController();
            break;
        default:
            echo "Controlador no válido.";
            exit;
    }

    // Llamar a la acción correspondiente
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Ruta no válida.";
}