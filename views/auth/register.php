<?php
require_once __DIR__ . '/../../controllers/TipoUsuarioController.php';
use Controllers\TipoUsuarioController;

$controller = new TipoUsuarioController();
$tiposUsuarios = $controller->getTiposUsuarios();
?>


<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container-fluid g-0" style="min-height: 100vh;">
    <div class="row g-0 h-100">

        <!-- Columna izquierda: formulario de registro -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light text-dark"
            style="min-height: 100vh;">
            <div class="card bg-white border-0 shadow-lg p-4" style="max-width: 500px; border-radius: 20px;">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-dark">Regístrate</h2>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-white"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST" action="/GestorSimple/router.php?action=register">
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-dark">Nombre</label>
                            <input type="text" class="form-control" id="nombre"
                                name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label text-dark">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo"
                                name="correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenia" class="form-label text-dark">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control"
                                    id="contrasenia" name="contrasenia" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 d-none" id="confirmarContraseniaContainer">
                            <label for="confirmar_contrasenia" class="form-label text-dark">Confirmar
                                Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control"
                                    id="confirmar_contrasenia" name="confirmar_contrasenia">
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_id_usuario" class="form-label text-dark">Tipo de Usuario</label>
                            <select class="form-select" id="tipo_id_usuario"
                                name="tipo_id_usuario" required>
                                <option value="" selected disabled>Selecciona tipo de usuario</option>
                                <?php
                                foreach ($tiposUsuarios as $tipo) {
                                    echo "<option value=\"{$tipo['id_tipo_usuario']}\">{$tipo['nombre_tipo']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-dark fw-bold">Registrarse</button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">¿Ya tienes cuenta?</span>
                            <a href="./views/auth/login.php" class="text-warning text-decoration-none fw-bold">Inicia sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Bienvenida -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="h-100 w-100 d-flex align-items-center justify-content-center" style="
                  background: linear-gradient(135deg, #F7971E 0%, #E94057 100%);
                  background-size: cover;
                  position: relative;
                ">

                <!-- Sin el efecto blur -->

                <div class="position-relative text-center text-white">
                    <h1 class="display-5 fw-bold">¡Bienvenido!</h1>
                    <p class="lead">Crea tu cuenta para comenzar</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/scripts.php'; ?>

<script>
    document.getElementById('contrasenia').addEventListener('input', function () {
        const confirmContainer = document.getElementById('confirmarContraseniaContainer');
        if (this.value.trim().length > 0) {
            confirmContainer.classList.remove('d-none');
        } else {
            confirmContainer.classList.add('d-none');
        }
    });
</script>