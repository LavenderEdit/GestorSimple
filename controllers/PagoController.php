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
}