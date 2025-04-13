<?php
namespace Models;
require_once __DIR__ . "/../models/BaseModel.php";
class Categoria extends BaseModel
{
    private int $id;
    private string $nombre;
    private string $descripcion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearCategoria($nombre, $descripcion)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion]);
    }

    public function editarCategoria($id, $nombre, $descripcion)
    {
        return $this->callProcedure('editar', [$id, $nombre, $descripcion]);
    }

    public function eliminarCategoria($id)
    {
        return $this->callProcedure('eliminar_total', [$id]);
    }

    public function obtenerCategorias()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerCategoriaPorId($id)
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