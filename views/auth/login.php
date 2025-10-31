<?php
session_start();
$error = $_SESSION['error_login'] ?? null;
unset($_SESSION['error_login']);
?>


<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container-fluid g-0" style="min-height: 100vh;">
    <div class="row g-0 h-100">
        <!-- Columna izquierda: Bienvenida -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="h-100 w-100 d-flex align-items-center justify-content-center" style="
                 background: linear-gradient(135deg, #F7971E 0%, #E94057 100%); /* Gradiente cálido: Naranja a Rojo/Rosa */
                 background-size: cover; 
                 position: relative;
               ">
                
                <div class="position-relative text-center text-white">
                    <!-- Texto blanco sobre fondo de gradiente -->
                    <h1 class="display-5 fw-bold">¡Bienvenido!</h1>
                    <p class="lead">Ingresa tus datos para continuar</p>
                </div>
            </div>
        </div>

        <!-- Columna derecha: formulario de login -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light text-dark"
            style="min-height: 100vh;">
            <!-- Fondo gris claro (bg-light) y texto oscuro (text-dark) -->
            <div class="card bg-white border-0 shadow-lg p-4" style="max-width: 400px; border-radius: 20px;">
                <!-- Tarjeta blanca (bg-white) sin borde y con sombra -->
                <div class="card-body">
                    <h2 class="text-center mb-4 text-dark">Inicia Sesión</h2> <!-- Texto oscuro -->

                    <!-- Formulario -->
                    <form method="POST" action="/GestorSimple/router.php?action=login">
                        <div class="mb-3">
                            <label for="correo" class="form-label text-dark">Correo Electrónico</label>
                            <!-- Input con estilo por defecto (fondo blanco, borde claro) -->
                            <input type="email" class="form-control" id="correo"
                                name="correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenia" class="form-label text-dark">Contraseña</label>
                            <div class="input-group">
                                <!-- Input con estilo por defecto -->
                                <input type="password" class="form-control"
                                    id="contrasenia" name="contrasenia" required>
                                <!-- Botón de ojo en color secundario (gris) -->
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <!-- Checkbox con estilo por defecto -->
                            <input type="checkbox" class="form-check-input"
                                id="recordarme" name="recordarme">
                            <label class="form-check-label text-dark" for="recordarme">
                                Recordarme
                            </label>
                        </div>

                        <div class="d-grid">
                            <!-- Botón principal en color cálido (Naranja - btn-warning) -->
                            <button type="submit" class="btn btn-warning text-dark fw-bold">
                                Iniciar Sesión
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">¿No tienes cuenta?</span>
                            <!-- Enlace en color cálido (Naranja - text-warning) -->
                            <a href="./views/auth/register.php" class="text-warning text-decoration-none fw-bold">Regístrate
                                aquí</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/scripts.php'; ?>