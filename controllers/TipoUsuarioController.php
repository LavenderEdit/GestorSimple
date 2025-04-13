<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/TipoUsuario.php";
use Database\Database;
use Models\TipoUsuario;

class TipoUsuarioController
{
    private TipoUsuario $tipoUsuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->tipoUsuarioModel = new TipoUsuario($pdo);
    }

    public function storeTipoUsuario()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->tipoUsuarioModel->crearTipoUsuario($nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el tipo de usuario.'
            ]);
        }
    }

    public function updateTipoUsuario()
    {
        $id_tip_user = trim($_POST['id_tipo_usuario']);
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->tipoUsuarioModel->editarTipoUsuario($id_tip_user, $nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar el tipo de usuario.'
            ]);
        }
    }

    public function deleteTipoUsuario()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->tipoUsuarioModel->eliminarTipoUsuario($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Tipo de Usuario eliminado' : 'No se pudo eliminar',
        ]);
    }

    public function getAllTiposUsuario()
    {
        $data = $this->tipoUsuarioModel->obtenerTiposUsuarios();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getTipoUsuarioById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_tip_user = filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING);

            $data = $this->tipoUsuarioModel->obtenerTipoUsuarioPorId($id_tip_user);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: CategoriaController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getTiposUsuarios()
    {
        return $this->tipoUsuarioModel->obtenerTiposUsuarios();
    }
}
