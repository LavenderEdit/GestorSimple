<?php
namespace Models;
require_once __DIR__ . "/../models/BaseModel.php";
class AvatarUsuario extends BaseModel
{
    private int $id_avatar_usuario;
    private string $avatar_usuario;
    private string $nombre_avatar;
    private string $tipo_avatar;
    private string $peso_avatar;
    private string $dimension_x_avatar;
    private string $dimension_y_avatar;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearAvatarUsuario($avatar_usuario, $nombre_avatar, $tipo_avatar, $peso_avatar, $dimension_x_avatar, $dimension_y_avatar)
    {
        return $this->callProcedure('crear', [$avatar_usuario, $nombre_avatar, $tipo_avatar, $peso_avatar, $dimension_x_avatar, $dimension_y_avatar]);
    }

    public function obtenerAvataresUsuario()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerAvatarUsuarioPorId($id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    // Getters y Setters
    public function getIdAvatarUsuario(): int
    {
        return $this->id_avatar_usuario;
    }

    public function setIdAvatarUsuario(int $id_avatar_usuario): void
    {
        $this->id_avatar_usuario = $id_avatar_usuario;
    }

    public function getAvatarUsuario(): string
    {
        return $this->avatar_usuario;
    }

    public function setAvatarUsuario(string $avatar_usuario): void
    {
        $this->avatar_usuario = $avatar_usuario;
    }

    public function getNombreAvatar(): string
    {
        return $this->nombre_avatar;
    }

    public function setNombreAvatar(string $nombre_avatar): void
    {
        $this->nombre_avatar = $nombre_avatar;
    }

    public function getTipoAvatar(): string
    {
        return $this->tipo_avatar;
    }

    public function setTipoAvatar(string $tipo_avatar): void
    {
        $this->tipo_avatar = $tipo_avatar;
    }

    public function getPesoAvatar(): string
    {
        return $this->peso_avatar;
    }

    public function setPesoAvatar(string $peso_avatar): void
    {
        $this->peso_avatar = $peso_avatar;
    }

    public function getDimensionXAvatar(): string
    {
        return $this->dimension_x_avatar;
    }

    public function setDimensionXAvatar(string $dimension_x_avatar): void
    {
        $this->dimension_x_avatar = $dimension_x_avatar;
    }

    public function getDimensionYAvatar(): string
    {
        return $this->dimension_y_avatar;
    }

    public function setDimensionYAvatar(string $dimension_y_avatar): void
    {
        $this->dimension_y_avatar = $dimension_y_avatar;
    }
}
