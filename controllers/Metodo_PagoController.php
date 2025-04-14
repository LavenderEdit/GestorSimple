<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/Metodo_Pago.php";
use Database\Database;
use Models\Metodo_Pago;

class MetodoPagoController
{
    private Metodo_Pago $metodo_pagoModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->metodo_pagoModel = new Metodo_Pago($pdo);
    }

    public function storeMetodoPago()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->metodo_pagoModel->crearMetodo_Pago($nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el método de pago.'
            ]);
        }
    }

    public function updateMetodoPago()
    {
        $id_met_pago = trim($_POST['id_metodo_pago']);
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->metodo_pagoModel->editarMetodo_Pago($id_met_pago, $nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar el método de pago.'
            ]);
        }
    }

    public function deleteMetodoPago()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->metodo_pagoModel->eliminarMetodo_Pago($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Método de pago eliminado' : 'No se pudo eliminar',
        ]);
    }

    public function getAllMetodosDePago()
    {
        $data = $this->metodo_pagoModel->obtenerMetodos_Pagos();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getMetodoPagoById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_met_pago = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->metodo_pagoModel->obtenerMetodo_PagoPorId($id_met_pago);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: Metodo_PagoController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}

