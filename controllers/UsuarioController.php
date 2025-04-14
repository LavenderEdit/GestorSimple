<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/Usuario.php";

use Database\Database;
use Models\Usuario;

class UsuarioController
{

    private Usuario $usuarioModel;
    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioModel = new Usuario($pdo);
    }

    public function updateUsuario()
    {
        $id_user = trim($_POST['id_usuario']);
        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $contrasenia = trim($_POST['contrasenia'] ?? '');
        $id_tipo_usuario = trim($_POST['id_tipo_usuario'] ?? '');

        $resultado = $this->usuarioModel->editarUsuario
        (
            $id_user,
            $nombre,
            $correo,
            $contrasenia,
            $id_tipo_usuario
        );

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar la categoria.'
            ]);
        }
    }

    public function deleteUsuario()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->usuarioModel->eliminarUsuario($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Usuario eliminado' : 'No se pudo eliminar',
        ]);
    }

    public function getCompleteUserById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_usuario = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->usuarioModel->obtenerUsuarioCompletoPorId($id_usuario);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: UsuarioController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getUsuarios()
    {
        $data = $this->usuarioModel->obtenerUsuarios();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getUsuariosCompleto()
    {
        $data = $this->usuarioModel->obtenerUsuarioCompleto();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getUsuarioById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_usuario = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->usuarioModel->obtenerUsuarioPorId($id_usuario);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: UsuarioController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}