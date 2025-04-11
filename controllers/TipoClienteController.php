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

    public function getTiposClientes(): array
    {
        return $this->tipoClienteModel->obtenerTiposClientes();
    }
}

