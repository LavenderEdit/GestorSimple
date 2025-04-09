<?php
namespace Models;

class Productos extends BaseModel
{
    private int $id_producto;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private int $id_categoria;
    private int $id_proveedor;

    public function __construct(
        int $id_producto = 0,
        string $nombre = '',
        string $descripcion = '',
        float $precio = 0.0,
        int $stock = 0,
        int $id_categoria = 0,
        int $id_proveedor = 0
    ) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->id_categoria = $id_categoria;
        $this->id_proveedor = $id_proveedor;
    }

    // Métodos para procedimientos de almacenamientos
    public function crearProducto($nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion, $precio, $stock, $id_categoria, $id_proveedor]);
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
    public function getIdProducto(): int
    {
        return $this->id_producto;
    }

    public function setIdProducto(int $id_producto): void
    {
        $this->id_producto = $id_producto;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getIdCategoria(): int
    {
        return $this->id_categoria;
    }

    public function setIdCategoria(int $id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    public function getIdProveedor(): int
    {
        return $this->id_proveedor;
    }

    public function setIdProveedor(int $id_proveedor): void
    {
        $this->id_proveedor = $id_proveedor;
    }
}
