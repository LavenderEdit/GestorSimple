<?php
namespace Models;

class Ventas extends BaseModel
{
    private int $id_venta;
    private \DateTime $fecha;
    private float $total;
    private int $id_cliente;
    private int $id_usuario;

    public function __construct(
        int $id_venta = 0,
        ?\DateTime $fecha = null,
        float $total = 0.0,
        int $id_cliente = 0,
        int $id_usuario = 0
    ) {
        $this->id_venta = $id_venta;
        $this->fecha = $fecha ?? new \DateTime();
        $this->total = $total;
        $this->id_cliente = $id_cliente;
        $this->id_usuario = $id_usuario;
    }

    // Métodos para procedimientos de almacenamientos
    public function crearVentas($fecha, $total, $id_cliente, $id_usuario)
    {
        return $this->callProcedure('crear', [$fecha, $total, $id_cliente, $id_usuario]);
    }

    public function obtenerVentas()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerVentaPorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
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
