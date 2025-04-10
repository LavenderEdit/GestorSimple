<!-- Sidebar -->
<div class="bg-dark text-white vh-100 position-fixed collapse collapse-horizontal show sidebar-custom" id="app-sidebar">
    <div class="p-3 border-bottom border-secondary d-flex align-items-center justify-content-between">
        <h5 class="mb-0 d-flex align-items-center">
            <a href="./index.php" style="">
            <i class="fas fa-store me-2"></i>
            <span class="fw-bold">Gestor Ventas</span>
            </a>
        </h5>
        <button class="btn btn-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#app-sidebar"
            aria-controls="app-sidebar" aria-expanded="true">
            <i class="fas fa-angle-double-left"></i>
        </button>
    </div>

    <ul class="nav flex-column p-3 w-100">
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white active bg-primary rounded" data-page="dashboard">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="ventas">
                <i class="fas fa-shopping-cart me-2"></i> Ventas
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="clientes">
                <i class="fas fa-users me-2"></i> Clientes
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="productos">
                <i class="fas fa-box-open me-2"></i> Productos
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="proveedores">
                <i class="fas fa-file-invoice-dollar me-2"></i> Proveedores
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="pagos">
                <i class="fas fa-chart-line me-2"></i> Pagos
            </a>
        </li>
        <li class="nav-item mt-4 pt-3 border-top border-secondary">
            <a href="#" class="nav-link text-white" data-page="categorias">
                <i class="fas fa-cog me-2"></i> Categorias
            </a>
        </li>
    </ul>
</div>

<button id="sidebar-expander" class="btn btn-primary" type="button" data-bs-toggle="collapse"
    data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="false">
    <i class="fas fa-angle-double-right"></i>
</button>