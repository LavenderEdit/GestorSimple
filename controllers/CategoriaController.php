<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Categoria.php';

use Database\Database;
use Models\Categoria;

class CategoriaController
{
    private Categoria $categoriaModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->categoriaModel = new Categoria($pdo);
    }

    public function storeCategoria()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->categoriaModel->crearCategoria($nombre, $descripcion);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar la categoria.'
            ]);
        }
    }

    public function updateCategoria()
    {
        $id_cate = trim($_POST['id_categoria']);
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');

        $resultado = $this->categoriaModel->editarCategoria($id_cate, $nombre, $descripcion);

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

    public function deleteCategoria()
    {
        $id = $_GET['id'] ?? '';

        $resultado = $this->categoriaModel->eliminarCategoria($id);

        echo json_encode([
            'success' => $resultado,
            'message' => $resultado ? 'Categoria eliminada' : 'No se pudo eliminar',
        ]);
    }

    public function getCategorias()
    {
        $data = $this->categoriaModel->obtenerCategorias();

        header('Content-Type: application/json');

        echo json_encode($data);
    }

    public function getCategoriaById()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new \InvalidArgumentException("Parámetros de búsqueda requeridos");
            }

            $id_categoria = filter_var(trim($_GET['id']), FILTER_SANITIZE_SPECIAL_CHARS);

            $data = $this->categoriaModel->obtenerCategoriaPorId($id_categoria);

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
}
