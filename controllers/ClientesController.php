<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/Clientes.php";
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

    public function guardarCliente()
    {
        $num_id = $_POST['num_identificacion'] ?? null;
        $nombre = $_POST['nombre'] ?? null;
        $telefono = $_POST['telefono'] ?? null;
        $email = $_POST['email'] ?? null;
        $direccion = $_POST['direccion'] ?? null;
        $tipo_cliente = $_POST['id_tipo_cliente'] ?? null;

        return $this->clientesModel->crearCliente($num_id, $nombre, $telefono, $email, $direccion, $tipo_cliente);
    }

    public function obtenerClientes(): array
    {
        return $this->clientesModel->obtenerClientes();
    }
}
