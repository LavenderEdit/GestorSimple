<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Productos.php';

use Database\Database;
use Models\Productos;

class ProductoController
{
    private Productos $productosModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->productosModel = new Productos($pdo);
    }

    public function insertarProducto()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $precio = trim($_POST['precio'] ?? '');
        $stock = trim($_POST['stock'] ?? '');
        $ganancia = trim($_POST['ganancia'] ?? '');
        $id_cat = trim($_POST['id_categoria']);
        $id_prov = trim($_POST['id_proveedor']);

        $resultado = $this->productosModel->crearProducto(
            $nombre,
            $descripcion,
            $precio,
            $stock,
            $id_cat,
            $id_prov,
            $ganancia
        );

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el producto.'
            ]);
        }
    }

    public function editarProducto()
    {
        $id_prod = trim($_POST['id_producto']);
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $precio = trim($_POST['precio'] ?? '');
        $stock = trim($_POST['stock'] ?? '');
        $ganancia = trim($_POST['ganancia'] ?? '');
        $id_cat = trim($_POST['id_categoria']);
        $id_prov = trim($_POST['id_proveedor']);

        $resultado = $this->productosModel->updateProducto(
            $id_prod,
            $nombre,
            $descripcion,
            $precio,
            $stock,
            $id_cat,
            $id_prov,
            $ganancia
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
                'message' => 'Error al actualizar el producto.'
            ]);
        }
    }

    public function eliminarProducto()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->productosModel->deleteProducto($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Producto eliminado' : 'No se pudo eliminar',
        ]);
    }

    public function buscarPorId()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_producto = filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING);

            $data = $this->productosModel->obtenerProductoPorId($id_producto);

            header('Content-Type: application/json');

            echo json_encode($data);
        } catch (\Exception $e) {
            error_log("Error en: ProductoController" . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function obtenerListaProductos()
    {
        $data = $this->productosModel->obtenerListaProductos();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function buscarFiltro()
    {
        header(header: 'Content-Type: application/json');

        try {

            $nombre_prod = (isset($_GET['filtro-nombre']) && $_GET['filtro-nombre'] !== '') ? $_GET['filtro-nombre'] : null;
            $categoria_id = (isset($_GET['filtro-categoria']) && $_GET['filtro-categoria'] !== '') ? (int) $_GET['filtro-categoria'] : null;
            $proveedor_id = (isset($_GET['filtro-proveedor']) && $_GET['filtro-proveedor'] !== '') ? (int) $_GET['filtro-proveedor'] : null;

            if ($nombre_prod || $categoria_id || $proveedor_id) {
                $resultados = $this->productosModel->obtenerListaProductosPorBusqueda($nombre_prod, $categoria_id, $proveedor_id);

                echo json_encode($resultados);
            }

        } catch (\Exception $e) {
            error_log("Error en buscarFiltro: " . $e->getMessage());
            http_response_code(400);
            echo json_encode(['error' => true, 'message' => $e->getMessage()]);
        }
    }
}