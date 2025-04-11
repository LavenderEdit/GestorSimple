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

    public function guardarCliente(): void
    {
        $num_id = trim($_POST['num_identificacion'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $tipo_cliente = trim($_POST['id_tipo_cliente'] ?? '');

        $resultado = $this->clientesModel->crearCliente($num_id, $nombre, $direccion, $telefono, $email, $tipo_cliente);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Registro exitoso.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al guardar el cliente.'
            ]);
        }
    }

    public function editarCliente()
    {
        $id_cli = trim($_POST['id_cliente'] ?? '');
        $num_id = trim($_POST['num_identificacion'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $tipo_cliente = trim($_POST['id_tipo_cliente'] ?? '');

        $resultado = $this->clientesModel->editarCliente($id_cli, $num_id, $nombre, $direccion, $telefono, $email, $tipo_cliente);

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode([
                'success' => true,
                'message' => 'Edición exitosa.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al actualizar el cliente.'
            ]);
        }
    }


    public function obtenerClientes(): array
    {
        return $this->clientesModel->obtenerClientes();
    }

    public function obtenerClientePorId_Param($id)
    {
        return $this->clientesModel->obtenerClientePorId($id);
    }

    public function obtenerClientePorId(): void
    {
        $id = $_GET['id'] ?? '';

        $cliente = $this->clientesModel->obtenerClientePorId($id);

        header('Content-Type: application/json');
        echo json_encode($cliente);
        exit;
    }

    public function obtenerClientesPorNombre($nombre): array
    {
        return $this->clientesModel->obtenerClientesPorNombre($nombre);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'buscar_clientes') {
    $controller = new ClientesController();

    $valor = $_GET['query'] ?? '';
    $tipo = $_GET['type'] ?? '';

    if ($tipo === 'todos') {
        $clientes = $controller->obtenerClientes();
        header('Content-Type: application/json');
        echo json_encode($clientes);
        exit;
    }

    if ($tipo === 'id' && !empty($valor)) {
        $cliente = $controller->obtenerClientePorId_Param($valor);
        header('Content-Type: application/json');
        echo json_encode($cliente);
        exit;
    }

    if ($tipo === 'nombre' && !empty($valor)) {
        $clientes = $controller->obtenerClientesPorNombre($valor);
        header('Content-Type: application/json');
        echo json_encode($clientes);
        exit;
    }

    header('Content-Type: application/json');
    echo json_encode([]);
    exit;
}
