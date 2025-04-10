<?php
namespace Controllers;

require __DIR__ . '/../database/database.php';
require __DIR__ . '/../models/Usuario.php';

use Database\Database;
use Models\Usuario;

class AuthController
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioModel = new Usuario($pdo);
    }

    // 🔐 Login de usuario
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $correo = $_POST['correo'] ?? '';
            $password = $_POST['contrasenia'] ?? '';

            $usuario = $this->usuarioModel->autenticarUsuario($correo, $password);

            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre' => $usuario['nombre']
                ];

                header("Location: " . "views/dashboard.php");
                exit;
            } else {
                $_SESSION['error_login'] = "Credenciales incorrectas.";
                header("Location: " . "views/auth/login.php");
                exit;
            }
        }
    }

    // 🚪 Cierre de sesión
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . "/GestorSimple/");
        exit;
    }

    // 📝 Registro de nuevo usuario
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $password = $_POST['contrasenia'] ?? '';
            $tipoUsuario = $_POST['tipo_id_usuario'] ?? 1;

            if (empty($nombre) || empty($correo) || empty($password)) {
                $_SESSION['error_register'] = "Todos los campos son obligatorios.";
                header("Location: " . "/GestorSimple/" . "views/auth/register.php");
                exit;
            }

            $resultado = $this->usuarioModel->crearUsuario($nombre, $correo, $password, $tipoUsuario);

            if ($resultado) {
                $_SESSION['success_register'] = "Usuario registrado correctamente.";
                header("Location: " . "/GestorSimple/" . "views/auth/login.php");
                exit;
            } else {
                $_SESSION['error_register'] = "Error al registrar el usuario.";
                header("Location: " . "/GestorSimple/" . "views/auth/register.php");
                exit;
            }
        }
    }
}
