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
}
