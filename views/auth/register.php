<?php
require_once __DIR__ . '/../../controllers/TipoUsuarioController.php';
use Controllers\TipoUsuarioController;

$controller = new TipoUsuarioController();
$tiposUsuarios = $controller->getTiposUsuarios();
?>


<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container-fluid g-0" style="min-height: 100vh;">
    <div class="row g-0 h-100">
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-dark text-white"
            style="min-height: 100vh;">
            <div class="card bg-transparent border-light shadow-lg p-4" style="max-width: 500px; border-radius: 20px;">
                <div class="card-body">
                    <h2 class="text-center mb-4 text-white">Regístrate</h2>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-white"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST" action="/GestorSimple/router.php?action=register">
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-white">Nombre</label>
                            <input type="text" class="form-control bg-dark text-white border-light" id="nombre"
                                name="nombre" required>
                        </div>

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
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 d-none" id="confirmarContraseniaContainer">
                            <label for="confirmar_contrasenia" class="form-label text-white">Confirmar
                                Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control bg-dark text-white border-light"
                                    id="confirmar_contrasenia" name="confirmar_contrasenia">
                                <button type="button" class="btn btn-outline-light toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_id_usuario" class="form-label text-white">Tipo de Usuario</label>
                            <select class="form-select bg-dark text-white border-light" id="tipo_id_usuario"
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
                            <button type="submit" class="btn btn-outline-light">Registrarse</button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">¿Ya tienes cuenta?</span>
                            <a href="./views/auth/login.php" class="text-primary text-decoration-none">Inicia sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                "></div>

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