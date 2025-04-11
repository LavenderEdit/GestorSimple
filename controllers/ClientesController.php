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
        var_dump($_POST); // Depuración: Verificar los datos recibidos
        exit;
    
        $num_id = $_POST['num_identificacion'] ?? null;
        $nombre = $_POST['nombre'] ?? null;
        $telefono = $_POST['telefono'] ?? null;
        $email = $_POST['email'] ?? null;
        $direccion = $_POST['direccion'] ?? null;
        $tipo_cliente = $_POST['id_tipo_cliente'] ?? null;
    
        $resultado = $this->clientesModel->crearCliente($num_id, $nombre, $telefono, $email, $direccion, $tipo_cliente);
    
        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar el cliente.']);
        }
        exit;
    }

    public function obtenerClientes(): array
    {
        return $this->clientesModel->obtenerClientes();
    }

    public function obtenerClientePorId($id): array
    {
        return $this->clientesModel->obtenerClientePorId($id);
    }

    public function obtenerClientesPorNombre($nombre): array
    {
        return $this->clientesModel->obtenerClientesPorNombre($nombre);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'buscar_clientes') {
    $controller = new ClientesController();

    $valor = $_POST['query'] ?? '';
    $tipo = $_POST['type'] ?? '';

    if ($tipo === 'todos') {
        $clientes = $controller->obtenerClientes();
        header('Content-Type: application/json');
        echo json_encode($clientes);
        exit;
    }

    if ($tipo === 'id' && !empty($valor)) {
        $cliente = $controller->obtenerClientePorId($valor);
        header('Content-Type: application/json');
        echo json_encode($cliente ? [$cliente] : []);
        exit;
    }

    if ($tipo === 'nombre' && !empty($valor)) {
        $clientes = $controller->obtenerClientesPorNombre($valor);
        header('Content-Type: application/json');
        echo json_encode($clientes);
        exit;
    }

    // Si no se cumple ninguna condición, devolver un array vacío
    header('Content-Type: application/json');
    echo json_encode([]);
    exit;
}

