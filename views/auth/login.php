<?php
session_start();
$error = $_SESSION['error_login'] ?? null;
unset($_SESSION['error_login']);
?>


<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container-fluid g-0" style="min-height: 100vh;">
    <div class="row g-0 h-100">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="h-100 w-100 d-flex align-items-center justify-content-center" style="
             background: linear-gradient(135deg, #292E49 0%, #536976 100%);
             background-size: cover; 
             position: relative;
           ">

                <div class="position-absolute top-50 start-50 translate-middle" style="
               width: 500px; 
               height: 300px; 
               background: radial-gradient(closest-corner at 50% 50%, #682DEE 0%, transparent 80%);
               filter: blur(80px);
               opacity: 0.6;
             ">
                </div>

                <div class="position-relative text-center text-white">
                    <h1 class="display-5 fw-bold">¡Bienvenido!</h1>
                    <p class="lead">Ingresa tus datos</p>
                </div>
            </div>
        </div>

        <!-- Columna derecha: formulario de login -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-dark text-white"
            style="min-height: 100vh;">
            <div class="card bg-transparent border-light shadow-lg p-4" style="max-width: 400px; border-radius: 20px;">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-white">Inicia Sesión</h2>

                    <!-- Formulario -->
                    <form method="POST" action="/GestorSimple/router.php?action=login">
                        <div class="mb-3">
                            <label for="correo" class="form-label text-white">Correo Electrónico</label>
                            <input type="email" class="form-control bg-dark text-white border-light" id="correo"
                                name="correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenia" class="form-label text-white">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control bg-dark text-white border-light"
                                    id="contrasenia" name="contrasenia" required>
                                <button type="button" class="btn btn-outline-light toggle-password">
                                    <i class="fas fa-eye"></i> <!-- Icono de mostrar contraseña -->
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input bg-dark border-light text-white"
                                id="recordarme" name="recordarme">
                            <label class="form-check-label text-white" for="recordarme">
                                Recordarme
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-light">
                                Iniciar Sesión
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">¿No tienes cuenta?</span>
                            <a href="./views/auth/register.php" class="text-primary text-decoration-none">Regístrate
                                aquí</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/scripts.php'; ?>