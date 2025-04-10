<div class="p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-white mb-0">
            <i class="fas fa-box-open me-2 text-info"></i> Productos / Servicios
        </h3>
        <button class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <form id="filtros-productos" class="mb-4">
        <div class="row g-2 align-items-end">
            <!-- Filtro por nombre -->
            <div class="col-md-4">
                <label for="filtro-nombre" class="form-label text-white">Nombre del Producto</label>
                <input type="text" id="filtro-nombre" name="filtro-nombre"
                    class="form-control bg-dark text-white border-secondary" placeholder="Buscar...">
            </div>
            <!-- Filtro por categoría -->
            <div class="col-md-3">
                <label for="filtro-categoria" class="form-label text-white">Categoría</label>
                <select id="filtro-categoria" name="filtro-categoria"
                    class="form-select bg-dark text-white border-secondary">
                    <option value="" selected>Seleccione Categoría</option>
                    <!-- Opciones de ejemplo. Estas deberán llenarse dinámicamente desde la base de datos -->
                    <option value="1">Lubricantes</option>
                    <option value="2">Filtros</option>
                    <option value="3">Aceites</option>
                </select>
            </div>
            <!-- Filtro por proveedor -->
            <div class="col-md-3">
                <label for="filtro-proveedor" class="form-label text-white">Proveedor</label>
                <select id="filtro-proveedor" name="filtro-proveedor"
                    class="form-select bg-dark text-white border-secondary">
                    <option value="" selected>Seleccione Proveedor</option>
                    <!-- Opciones de ejemplo -->
                    <option value="1">Proveedor 1</option>
                    <option value="2">Proveedor 2</option>
                    <option value="3">Proveedor 3</option>
                </select>
            </div>
            <!-- Botón de búsqueda -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    <i class="fas fa-search me-1"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    <div class="list-group">
        <div
            class="list-group-item bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3 mb-2">
            <div>
                <small class="d-block text-secondary fw-light">ID: 001</small>
                <h5 class="mb-1 text-info">BALDE DE CASTROL VISCUS 25W60</h5>
                <p class="mb-0 text-white small">
                    Sin Categoría | Proveedor genérico
                </p>
            </div>
            <div class="text-end">
                <div class="fs-5 text-success">
                    S/ 320.00
                </div>
                <button class="btn btn-outline-info btn-sm mt-2">
                    VER STOCK
                </button>
            </div>
        </div>

        <div
            class="list-group-item bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3 mb-2">
            <div>
                <small class="d-block text-secondary fw-light">ID: 002</small>
                <h5 class="mb-1 text-info">BALDE DE MOBIL 15W40</h5>
                <p class="mb-0 text-white small">
                    Categoría: Lubricantes | Proveedor: PROV Móvil
                </p>
            </div>
            <div class="text-end">
                <div class="fs-5 text-warning">
                    S/ 290.00
                </div>
                <button class="btn btn-outline-info btn-sm mt-2">
                    VER STOCK
                </button>
            </div>
        </div>

        <div
            class="list-group-item bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3 mb-2">
            <div>
                <small class="d-block text-secondary fw-light">ID: 003</small>
                <h5 class="mb-1 text-info">FILTRO DE ACEITE</h5>
                <p class="mb-0 text-white small">
                    Categoría: Filtros | Proveedor: PROV Shell
                </p>
            </div>
            <div class="text-end">
                <div class="fs-5 text-danger">
                    S/ 180.00
                </div>
                <button class="btn btn-outline-info btn-sm mt-2">
                    VER STOCK
                </button>
            </div>
        </div>
    </div>
</div>