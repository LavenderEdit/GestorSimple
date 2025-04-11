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

    public function getProveedores(): array
    {
        return $this->proveedoresModel->obtenerProveedores();
    }

    public function obtenerProveedorPorId()
    {
        try {
            if (!isset($_POST['id_prov'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_proveedor = filter_var(trim($_POST['id_prov']), FILTER_SANITIZE_STRING);

            return $this->proveedoresModel->obtenerProveedorPorId($id_proveedor);
        } catch (\Exception $e) {
            error_log("Error en ProveedoresController: " . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function buscarProveedoresPorNomOId(): array
    {
        try {
            if (!isset($_POST['valor'], $_POST['tipo'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $valor = filter_var(trim($_POST['valor']), FILTER_SANITIZE_STRING);
            $tipo = filter_var(trim($_POST['tipo']), FILTER_SANITIZE_STRING);

            $tiposPermitidos = ['id', 'nombre', 'todos'];
            if (!in_array($tipo, $tiposPermitidos)) {
                throw new \InvalidArgumentException("Tipo de búsqueda inválido");
            }

            if ($tipo === 'todos' || empty($valor)) {
                return $this->getProveedores();
            }

            switch ($tipo) {
                case 'id':
                    if (!ctype_digit($valor)) {
                        throw new \InvalidArgumentException("ID debe ser un número entero");
                    }
                    return $this->proveedoresModel->buscarProveedoresPorNomOId((int) $valor, null);

                case 'nombre':
                    if (strlen($valor) < 2) {
                        throw new \InvalidArgumentException("Mínimo 2 caracteres para búsqueda por nombre");
                    }
                    return $this->proveedoresModel->buscarProveedoresPorNomOId(null, $valor);
            }

        } catch (\Exception $e) {
            error_log("Error en ProveedoresController: " . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }

        return [];
    }

    public function obtenerProductosPorProvId()
    {
        try {
            if (!isset($_POST['id_prov_mod'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_proveedor = filter_var(trim($_POST['id_prov']), FILTER_SANITIZE_STRING);
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
