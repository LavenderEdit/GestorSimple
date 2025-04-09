<?php
namespace Models;
require __DIR__ . "/../models/BaseModel.php";
class Detalle_Ventas extends BaseModel
{
    private int $id_detalle;
    private int $cantidad;
    private float $precio_unitario;
    private float $subtotal;
    private int $id_venta;
    private int $id_producto;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearDetalle_Ventas($cantidad, $precio_unitario, $subtotal, $id_venta, $id_producto)
    {
        return $this->callProcedure('crear', [$cantidad, $precio_unitario, $subtotal, $id_venta, $id_producto]);
    }

    public function obtenerDetalle_Ventas()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerDetalle_VentaPorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    // Getters y Setters
    public function getIdDetalle(): int
    {
        return $this->id_detalle;
    }

    public function setIdDetalle(int $id_detalle): void
    {
        $this->id_detalle = $id_detalle;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getPrecioUnitario(): float
    {
        return $this->precio_unitario;
    }

    public function setPrecioUnitario(float $precio_unitario): void
    {
        $this->precio_unitario = $precio_unitario;
    }

    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    public function setSubtotal(float $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    public function getIdVenta(): int
    {
        return $this->id_venta;
    }

    public function setIdVenta(int $id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function getIdProducto(): int
    {
        return $this->id_producto;
    }

    public function setIdProducto(int $id_producto): void
    {
        $this->id_producto = $id_producto;
    }
}
