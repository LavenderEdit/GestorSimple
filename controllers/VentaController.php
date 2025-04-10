<?php
namespace Controllers;

require __DIR__ . "/../database/database.php";
require __DIR__ . "/../models/Ventas.php";
use Database\Database;
use Models\Ventas;

class VentaController
{
    private Ventas $ventas;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->ventas = new Ventas($pdo);
    }

    public function getVentasPorFechaYUsuario(): array
    {
        session_start();
        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
        $fecha = $_POST['fecha'] ?? null;

        if ($id_usuario && $fecha) {
            return $this->ventas->buscar_por_fecha_usuario($id_usuario, $fecha);
        }

        return [];
    }

}

if (isset($_GET['action']) && $_GET['action'] === 'buscar_por_fecha') {
    $controller = new VentaController();
    $ventas = $controller->getVentasPorFechaYUsuario();
    header('Content-Type: application/json');
    echo json_encode($ventas);
}

