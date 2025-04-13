<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Pagos.php';

use Database\Database;
use Models\Pagos;

class PagoController
{
    private Pagos $pagoModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->pagoModel = new Pagos($pdo);
    }

    public function obtenerListaPagos(): array
    {
        session_start();
        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
        return $this->pagoModel->obtenerListaUsuarioPagos($id_usuario);
    }

    public function obtenerInfoPago(): array
    {
        session_start();
        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
        $id_pago = trim($_POST['id_pago'] ?? '');

        return $this->pagoModel->obtenerInfoPagos($id_pago, $id_usuario);
    }

    public function crearPago($fecha_pago, $monto, $id_venta, $id_metodo_pago): array
    {
        return $this->pagoModel->crearPago($fecha_pago, $monto, $id_venta, $id_metodo_pago);
    }

    public function obtenerDetallePago(): array {
        header('Content-Type: application/json');
        
        session_start();
        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
        $id_pago = (int)($_POST['id_pago'] ?? 0);
    
        if (!$id_usuario || !$id_pago) {
            http_response_code(400);
            return ['error' => 'IDs inválidos'];
        }
    
        $resultado = $this->pagoModel->obtenerInfoPagos($id_pago, $id_usuario);
        
        if (isset($resultado['error'])) {
            http_response_code(500);
            return $resultado;
        }
    
        if (empty($resultado)) {
            http_response_code(404);
            return ['error' => 'Pago no encontrado'];
        }
    
        return $resultado;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'buscar_pagos') {
    $controller = new PagoController();
    $query = trim($_POST['query'] ?? '');
    $type = trim($_POST['type'] ?? '');

    if ($type === 'id' && !empty($query)) {
        // Filtrar por ID de pago
        $pagos = $controller->obtenerListaPagos();
        $pagosFiltrados = array_filter($pagos, fn($pago) => $pago['id_pago'] == $query);
        echo json_encode(array_values($pagosFiltrados));
    } elseif ($type === 'metodo' && !empty($query)) {
        // Filtrar por método de pago o referencia de pago
        $pagos = $controller->obtenerListaPagos();
        $pagosFiltrados = array_filter($pagos, function ($pago) use ($query) {
            return stripos($pago['referencia_pago'], $query) !== false;
        });
        echo json_encode(array_values($pagosFiltrados));
    } else {
        // Búsqueda general (sin filtro o tipo no válido)
        echo json_encode($controller->obtenerListaPagos());
    }
    exit;
}

// Detalle de pagos
if (isset($_GET['action']) && $_GET['action'] === 'detalle_pago') {
    $controller = new PagoController();
    echo json_encode($controller->obtenerDetallePago());
    exit;
}
