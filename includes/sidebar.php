<!-- Estilos personalizados para el tema cálido del Sidebar -->
<style>
    /* Fondo naranja suave */
    #app-sidebar {
        background-color: #FFFBF2 !important; /* Un naranja muy pálido, más suave que bg-warning-subtle */
    }

    /* Color de texto de los enlaces */
    #app-sidebar .nav-link {
        color: #66460D; /* Un marrón/naranja oscuro para la legibilidad */
    }

    /* Color de HOVER (cuando pasas el ratón) - Esto quita el azul */
    #app-sidebar .nav-link:not(.active):hover {
        background-color: #FFEFC6; /* Un naranja pálido para el hover */
        color: #000;
    }

    /* Color de ACTIVO (el seleccionado) */
    #app-sidebar .nav-link.active {
        background-color: #F7971E !important; /* Naranja fuerte de la paleta */
        color: #000 !important;
        font-weight: bold;
    }
</style>

<!-- Sidebar -->
<!-- CAMBIO: Fondo a 'bg-warning-subtle' (naranja suave) y texto oscuro */ -->
<div class="text-dark vh-100 position-fixed collapse collapse-horizontal show sidebar-custom" id="app-sidebar">
    <!-- CAMBIO: Borde a 'border-light' o 'border-warning-subtle' */ -->
    <div class="p-3 border-bottom border-warning-subtle d-flex align-items-center justify-content-between">
        <h5 class="mb-0 d-flex align-items-center">
            <a class="text-dark" href="./index.php" style="text-decoration: none;">
                <i class="fas fa-store me-2 text-warning"></i>
                <span class="fw-bold">VentaGo</span>
            </a>
        </h5>
        <!-- CAMBIO: Botón a 'btn-outline-warning' para fondo naranja suave */ -->
        <button class="btn btn-outline-warning border-0" type="button" data-bs-toggle="collapse" data-bs-target="#app-sidebar"
            aria-controls="app-sidebar" aria-expanded="true">
            <i class="fas fa-angle-double-left"></i>
        </button>
    </div>

    <ul class="nav flex-column p-3 w-100">
        <li class="nav-item mb-2">
            <!-- CAMBIO: Eliminado 'bg-warning' - Ahora se controla por <style> y la clase 'active' -->
            <a href="#" class="nav-link active rounded" data-page="dashboard">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link rounded" data-page="ventas">
                <i class="fas fa-shopping-cart me-2"></i> Ventas
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link rounded" data-page="clientes">
                <i class="fas fa-users me-2"></i> Clientes
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link rounded" data-page="productos">
                <i class="fas fa-box-open me-2"></i> Productos
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link rounded" data-page="proveedores">
                <i class="fas fa-file-invoice-dollar me-2"></i> Proveedores
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link rounded" data-page="pagos">
                <i class="fas fa-chart-line me-2"></i> Pagos
            </a>
        </li>
        <?php if (isset($_SESSION['usuario']) && in_array($_SESSION['usuario']['id_tipo_usuario'], [1, 5])): ?>
            <!-- CAMBIO: Borde a 'border-warning-subtle' */ -->
            <li class="nav-item mt-4 pt-3 mb-2 border-top border-warning-subtle">
                <a href="#" class="nav-link rounded" data-page="categorias">
                    <i class="fas fa-cog me-2"></i> Categorias
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link rounded" data-page="tipos_usuario">
                    <i class="fa-solid fa-user me-2"></i> Tipos de Usuario
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link rounded" data-page="tipos_cliente">
                    <i class="fa-solid fa-people-group me-2"></i> Tipos de Cliente
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link rounded" data-page="metodos_pago">
                    <i class="fa-solid fa-comment-dollar me-2"></i> Métodos de Pago
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link rounded" data-page="usuario">
                    <i class="fa-solid fa-user-gear me-2"></i> Usuario
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>

<!-- CAMBIO: Botón a 'btn-warning' (se mantiene) -->
<button id="sidebar-expander" class="btn btn-warning text-dark fw-bold" type="button" data-bs-toggle="collapse"
    data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="false">
    <i class="fas fa-angle-double-right"></i>
</button>

