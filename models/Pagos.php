<?php
namespace Models;

class Pagos extends BaseModel
{
    private int $id_pago;
    private \DateTime $fecha_pago;
    private float $monto;
    private int $id_venta;
    private int $id_metodo_pago;

    public function __construct(
        int $id_pago = 0,
        ?\DateTime $fecha_pago = null,
        float $monto = 0.0,
        int $id_venta = 0,
        int $id_metodo_pago = 0
    ) {
        $this->id_pago = $id_pago;
        $this->fecha_pago = $fecha_pago ?? new \DateTime();
        $this->monto = $monto;
        $this->id_venta = $id_venta;
        $this->id_metodo_pago = $id_metodo_pago;
    }

    // Métodos para procedimientos de almacenamientos
    public function crearPago($fecha_pago, $monto, $id_venta, $id_metodo_pago)
    {
        return $this->callProcedure('crear', [$fecha_pago, $monto, $id_venta, $id_metodo_pago]);
    }

    public function obtenerPagos()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerPagoPorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    // Getters y Setters
    public function getIdPago(): int
    {
        return $this->id_pago;
    }

    public function setIdPago(int $id_pago): void
    {
        $this->id_pago = $id_pago;
    }

    public function getFechaPago(): \DateTime
    {
        return $this->fecha_pago;
    }

    public function setFechaPago(\DateTime $fecha_pago): void
    {
        $this->fecha_pago = $fecha_pago;
    }

    public function getMonto(): float
    {
        return $this->monto;
    }

    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }

    public function getIdVenta(): int
    {
        return $this->id_venta;
    }

    public function setIdVenta(int $id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function getIdMetodoPago(): int
    {
        return $this->id_metodo_pago;
    }

    public function setIdMetodoPago(int $id_metodo_pago): void
    {
        $this->id_metodo_pago = $id_metodo_pago;
    }
}
