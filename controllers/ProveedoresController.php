<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Proveedores.php';

use Database\Database;
use Models\Proveedores;

class ProveedoresController
{
    private Proveedores $proveedoresModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->proveedoresModel = new Proveedores($pdo);
    }


    public function insertarProveedor()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');

        $resultado = $this->proveedoresModel->crearProveedor($nombre, $email, $telefono, $direccion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el proveedor.'
            ]);
        }
    }


    public function editarProveedor()
    {
        $id_pro = trim($_POST['id_proveedor'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');

        $resultado = $this->proveedoresModel->editarProveedor($id_pro, $nombre, $email, $telefono, $direccion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar el proveedor.'
            ]);
        }
    }


    public function deleteProveedor()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->proveedoresModel->eliminarProveedor($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Proveedor eliminado' : 'No se pudo eliminar',
        ]);
    }


    public function obtenerProveedoresArray(): array
    {
        return $this->proveedoresModel->obtenerProveedores();
    }


    public function getProveedores(): void
    {
        $data = $this->proveedoresModel->obtenerProveedores();

        header('Content-Type: application/json');

        echo json_encode($data);
    }


    public function obtenerProveedorPorId()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_proveedor = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->proveedoresModel->obtenerProveedorPorId($id_proveedor);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en ProveedoresController: " . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }


    public function buscarProveedoresPorNomOId(): void
    {
        header('Content-Type: application/json');

        try {
            $valor = $_GET['query'] ?? '';
            $tipo = $_GET['type'] ?? '';

            $tiposPermitidos = ['id', 'nombre', 'todos'];
            if (!in_array($tipo, $tiposPermitidos)) {
                throw new \InvalidArgumentException("Tipo de búsqueda inválido: $tipo");
            }

            $valor = filter_var(trim($valor), FILTER_SANITIZE_SPECIAL_CHARS);
            $resultados = [];

            if ($tipo === 'todos' || empty($valor)) {
                $resultados = $this->obtenerProveedoresArray();
            } elseif ($tipo === 'id') {
                if (!ctype_digit($valor)) {
                    throw new \InvalidArgumentException("El ID debe ser un número entero");
                }

                $proveedor = $this->proveedoresModel->buscarProveedoresPorNomOId((int) $valor, null);
                $resultados = is_array($proveedor) ? $proveedor : [$proveedor];
            } elseif ($tipo === 'nombre') {
                if (strlen($valor) < 2) {
                    throw new \InvalidArgumentException("Debe ingresar al menos 2 caracteres para buscar por nombre");
                }

                $resultados = $this->proveedoresModel->buscarProveedoresPorNomOId(null, $valor);
            }

            if (isset($resultados[0]) && is_array($resultados[0]) && isset($resultados[0][0])) {
                $resultados = $resultados[0];
            }

            echo json_encode($resultados);
        } catch (\Exception $e) {
            error_log("Error en buscarProveedoresPorNomOId: " . $e->getMessage());
            http_response_code(400);
            echo json_encode(['error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function obtenerProductosPorProvId()
    {
        try {
            if (!isset($_GET['id_prov_mod'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_proveedor = filter_var(trim($_GET['id_prov']), FILTER_SANITIZE_SPECIAL_CHARS);
            return $this->proveedoresModel->buscarProductosPorProveedor($id_proveedor);
        } catch (\Exception $e) {
            error_log("Error en ProveedoresController: " . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
