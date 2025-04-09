<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container d-flex justify-content-center">
        <div class="card bg-transparent border-light shadow-lg p-4" style="max-width: 400px; border-radius: 20px;">
            <div class="card-body">
                <h2 class="text-center mb-4 text-white">Inicia Sesión</h2>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger text-white"> <?= $error ?> </div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="correo" class="form-label text-white">Correo Electrónico</label>
                        <input type="email" class="form-control bg-dark text-white border-light" id="correo"
                            name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasenia" class="form-label text-white">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control bg-dark text-white border-light" id="contrasenia"
                                name="contrasenia" required>
                            <button type="button" class="btn btn-outline-light toggle-password">
                                <i class="fas fa-eye"></i> <!-- Icono de mostrar contraseña -->
                            </button>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-light">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/scripts.php'; ?>