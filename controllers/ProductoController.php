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

    public function obtenerListaClientes(): array
    {
        return $this->productosModel->obtenerListaProductos();
    }

    public function obtenerClientesPorFiltrado(): array
    {
        $nombre_prod = (isset($_POST['filtro-nombre']) && $_POST['filtro-nombre'] !== '') ? $_POST['filtro-nombre'] : null;
        $categoria_id = (isset($_POST['filtro-categoria']) && $_POST['filtro-categoria'] !== '') ? (int) $_POST['filtro-categoria'] : null;
        $proveedor_id = (isset($_POST['filtro-proveedor']) && $_POST['filtro-proveedor'] !== '') ? (int) $_POST['filtro-proveedor'] : null;

        if ($nombre_prod || $categoria_id || $proveedor_id) {
            return $this->productosModel->obtenerListaProductosPorBusqueda($nombre_prod, $categoria_id, $proveedor_id);
        }

        return [];
    }

}

if (isset($_GET['action']) && $_GET['action'] === 'buscar_por_filtro') {
    $controller = new ProductoController();
    $productosModel = $controller->obtenerClientesPorFiltrado();
    header('Content-Type: application/json');
    echo json_encode($productosModel);
}