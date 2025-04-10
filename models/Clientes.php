<?php
namespace Models;
require_once __DIR__ . "/../models/BaseModel.php";
class Clientes extends BaseModel
{
    private int $id_cliente;
    private string $num_identificacion;
    private string $nombre;
    private string $direccion;
    private string $telefono;
    private string $email;
    private int $id_tipo_cliente;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearCliente($num_identificacion, $nombre, $direccion, $telefono, $email, $id_tipo_cliente)
    {
        return $this->callProcedure('crear', [$num_identificacion, $nombre, $direccion, $telefono, $email, $id_tipo_cliente]);
    }

    public function obtenerClientes()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerClientePorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    public function obtenerClientesPorNombre($nombre)
    {
        return $this->callProcedure('visualizar_por_nombre', [$nombre]);
    }
    
    // Getters y Setters
    public function getIdCliente(): int
    {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getNumIdentificacion(): string
    {
        return $this->num_identificacion;
    }

    public function setNumIdentificacion(string $num_identificacion): void
    {
        $this->num_identificacion = $num_identificacion;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getIdTipoCliente(): int
    {
        return $this->id_tipo_cliente;
    }

    public function setIdTipoCliente(int $id_tipo_cliente): void
    {
        $this->id_tipo_cliente = $id_tipo_cliente;
    }
}