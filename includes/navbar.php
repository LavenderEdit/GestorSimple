<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg"
    style="background: linear-gradient(45deg, #1a1a1a, #2d2d2d);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <img src="images/logos/MP-PHP-Logo-Rectangle.webp" alt="Logo"
                class="img-fluid me-2 rounded-circle shadow-sm" style="max-width: 40px; max-height: 40px;">
            <span class="fw-bold">MP-PHP</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link d-flex align-items-center active-link" href="index.php">
                        <i class="fas fa-home me-2"></i>Inicio
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link d-flex align-items-center" href="index.php#info">
                        <i class="fas fa-users me-2"></i>Sobre Nosotros
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link d-flex align-items-center" href="index.php#objectives">
                        <i class="fas fa-cube me-2"></i>Servicios
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link d-flex align-items-center" href="index.php#contact">
                        <i class="fas fa-envelope me-2"></i>Contacto
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="dropdown">
                        <a class="btn btn-success rounded-pill px-4 dropdown-toggle" href="#" role="button"
                            id="userDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i><?= $_SESSION['usuario']['nombre'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="./views/dashboard.php">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="/GestorSimple/router.php?action=logout">
                                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="./views/auth/login.php" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>