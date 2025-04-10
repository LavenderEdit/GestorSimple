<?php
namespace Models;
require __DIR__ . "/../models/BaseModel.php";
class Ventas extends BaseModel
{
    private int $id_venta;
    private \DateTime $fecha;
    private float $total;
    private int $id_cliente;
    private int $id_usuario;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearVentas($fecha, $total, $id_cliente, $id_usuario)
    {
        return $this->callProcedure('crear', [$fecha, $total, $id_cliente, $id_usuario]);
    }

    public function buscar_por_fecha_usuario($id_usuario, $fecha)
    {
        return $this->callProcedure('buscar_por_fecha_usuario', [$id_usuario, $fecha]);
    }

    // Getters y Setters
    public function getIdVenta(): int
    {
        return $this->id_venta;
    }

    public function setIdVenta(int $id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    public function setFecha(\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getIdCliente(): int
    {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }
}
