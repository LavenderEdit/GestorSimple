<?php
namespace Controllers;

use Core\Controller;
use Models\Usuario;

define('BASE_URL', '/GestorSimple/');

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $this->loadView('auth/login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = (new Usuario())->autenticarUsuario($email, $password);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header("Location: " . BASE_URL . "views/dashboard.php");
                exit;
            } else {
                $_SESSION['error_login'] = "Credenciales incorrectas";
                header("Location: " . BASE_URL . "views/auth/login.php");
                exit;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }
}