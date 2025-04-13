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

    public function buscarPorFecha()
    {
        header('Content-Type: application/json');
        session_start();

        try {
            $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
            $fecha = $_GET['fecha'] ?? null;

            if ($id_usuario && $fecha) {
                $data = $this->ventas->buscar_por_fecha_usuario($id_usuario, $fecha);

                echo json_encode($data);
            }
        } catch (\Exception $e) {
            error_log("Error en buscarPorFecha: " . $e->getMessage());
            http_response_code(400);
            echo json_encode(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function getAllVentas()
    {
        $data = $this->ventas->obtenerTodasLasVentas();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function obtenerInfoModal()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_venta = filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING);

            $data = $this->ventas->obtenerInfoVentaPorId($id_venta);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: obtenerInfoModal" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function obtenerInfo()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_venta = filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING);

            $data = $this->ventas->obtenerPorId($id_venta);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: obtenerInfo" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}

