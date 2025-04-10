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

    public function getCategorias(): array
    {
        return $this->categoriaModel->obtenerCategorias();
    }
}
