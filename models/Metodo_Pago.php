<?php
namespace Models;
require_once __DIR__ . "/../models/BaseModel.php";
class Metodo_Pago extends BaseModel
{
    private int $id;
    private string $nombre;
    private string $descripcion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearMetodo_Pago($nombre, $descripcion)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion]);
    }

    public function editarMetodo_Pago($id, $nombre, $descripcion)
    {
        return $this->callProcedure('editar', [$id, $nombre, $descripcion]);
    }

    public function eliminarMetodo_Pago($id)
    {
        return $this->callProcedure('eliminar_total', [$id]);
    }

    public function obtenerMetodos_Pagos()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerMetodo_PagoPorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    //Getters y Setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
}