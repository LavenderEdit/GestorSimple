<?php
namespace Models;
require __DIR__ . "/../models/BaseModel.php";
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