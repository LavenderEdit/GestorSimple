<?php
namespace Controllers;

require __DIR__."/../database/database.php";
require __DIR__."/../models/TipoUsuario.php";
use Database\Database;
use Models\TipoUsuario;

class TipoUsuarioController
{
    private TipoUsuario $tipoUsuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->tipoUsuarioModel = new TipoUsuario($pdo);
    }

    public function getTiposUsuarios(): array
    {
        return $this->tipoUsuarioModel->obtenerTiposUsuarios();
    }
}
