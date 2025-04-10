<div class="container-fluid px-3">
    <!-- Encabezado con fecha y selector -->
    <div class="row mb-4 justify-content-between align-items-center">
        <div class="col-auto">
            <h4 class="text-light mb-0">
                <i class="fas fa-calendar-day me-2 text-info"></i>
                <span class="header-date"></span>
            </h4>
        </div>
        <div class="col-auto d-flex align-items-center">
            <input type="date" id="fecha-busqueda"
                class="form-control form-control-sm bg-dark border-secondary me-2 text-white">
            <button id="buscar-fecha-btn" class="btn btn-sm btn-primary">
                <i class="fas fa-check me-1"></i> Seleccionar fecha
            </button>
        </div>
    </div>

    <!-- Listado principal de ventas -->
    <div class="list-group" id="ventas-list">
    </div>
</div>