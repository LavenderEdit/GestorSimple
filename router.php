<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/ClientesController.php';

use Controllers\AuthController;

$action = $_GET['action'] ?? null;

$controller = new AuthController();

switch ($action) {
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        echo "Ruta no válida.";
        break;
}
