<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/TipoCliente.php";
use Database\Database;
use Models\TipoCliente;

class TipoClienteController
{
    private TipoCliente $tipoClienteModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->tipoClienteModel = new TipoCliente($pdo);
    }

    public function storeTipoCliente()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->tipoClienteModel->crearTipoCliente($nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el tipo de cliente.'
            ]);
        }
    }

    public function updateTipoCliente()
    {
        $id_tip_cli = trim($_POST['id_tipo_cliente']);
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->tipoClienteModel->editarTipoCliente($id_tip_cli, $nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar el tipo de cliente.'
            ]);
        }
    }

    public function deleteTipoCliente()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->tipoClienteModel->eliminarTipoCliente($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Tipo de Cliente eliminado' : 'No se pudo eliminar',
        ]);
    }

    public function getAllTiposCliente()
    {
        $data = $this->tipoClienteModel->obtenerTiposClientes();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getTipoClienteById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_tip_cli = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->tipoClienteModel->obtenerTipoClientePorId($id_tip_cli);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: TipoClienteController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getTiposClientes(): array
    {
        return $this->tipoClienteModel->obtenerTiposClientes();
    }
}

