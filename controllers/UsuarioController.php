<?php
namespace Controllers;

require_once __DIR__ . "/../database/database.php";
require_once __DIR__ . "/../models/Usuario.php";
use Models\Usuario;
use Core\Controller;

class UsuarioController extends Controller
{
    //Métodos para el crud API - REST
    public function index()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerUsuarios();
        $this->loadView("usuarios/index", ["usuarios" => $usuarios]);
    }

    public function create()
    {
        $this->loadView("usuarios/crear");
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $contrasenia = $_POST['contrasenia'] ?? '';
            $tipoUsuario = $_POST['tipo_id_usuario'] ?? 1;

            $usuarioModel = new Usuario();
            $resultado = $usuarioModel->crearUsuario($nombre, $correo, $contrasenia, $tipoUsuario);

            header("Location: /usuarios");
            exit;
        }
    }

    public function show($id)
    {
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->obtenerUsuarioPorId($id);

        if ($usuario) {
            $this->loadView("usuarios/ver", ["usuario" => $usuario]);
        } else {
            header("Location: /usuarios?error=Usuario no encontrado");
            exit;
        }
    }
}