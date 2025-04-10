<?php
namespace Controllers;

require_once __DIR__."/../database/database.php"; // <-- CAMBIO AQUÍ
require_once __DIR__."/../models/Clientes.php";
use Database\Database;
use Models\Clientes;

class ClientesController
{
    private Clientes $clientesModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->clientesModel = new Clientes($pdo);
    }

    public function guardarCliente(array $data): bool
    {
        return $this->clientesModel->guardarCliente($data);
    }

    public function obtenerClientes(): array
    {
        return $this->clientesModel->obtenerClientes();
    }
}
