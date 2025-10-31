<div class="p-3">

    <!-- CAMBIO: Título a 'text-dark', Botón a 'btn-warning' -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark mb-0">
            <!-- CAMBIO: Icono a 'text-warning' -->
            <i class="fa-solid fa-id-card-clip me-2 text-warning"></i> Proveedores
        </h3>
        <!-- CAMBIO: Botón a 'btn-warning' -->
        <button class="btn btn-sm btn-warning text-dark fw-bold" id="btnRegistrarProveedor">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <!-- Modal Bootstrap 5 -->
    <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
    <div class="modal fade" id="modalAgregarProveedor" tabindex="-1" aria-labelledby="modalLabelProveedor">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelProveedor">Proveedor</h5>
                    <!-- CAMBIO: Quitado 'btn-close-white' -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <form id="formAgregarProveedor">
                            <div class="row g-3 p-3">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_proveedor">

                                    <label for="nombre" class="form-label">Nombre o razón social</label>
                                    <!-- CAMBIO: Inputs a estilo claro (default) -->
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        autocomplete="email">
                                </div>

                                <div class="col-md-12">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <!-- CAMBIO: Botón principal a 'btn-warning' -->
                                <button type="submit" class="btn btn-warning text-dark fw-bold">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="container mt-4">
        <!-- CAMBIO: Título a 'text-dark' -->
        <h4 class="text-dark">Listado de Proveedores</h4>

        <!-- Filtro de búsqueda -->
        <!-- CAMBIO: Inputs a estilo claro (default) -->
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="searchInputProveedor" placeholder="Buscar proveedor...">
            </div>
            <div class="col-md-2">
                <select class="form-select" id="searchTypeProveedor">
                    <option value="todos">Seleccione el tipo de filtrado</option>
                    <option value="id">ID Proveedor</option>
                    <option value="nombre">Nombre Proveedor</option>
                </select>
            </div>
        </div>

        <!-- Lista dinámica de proveedores -->
        <ul class="list-group" id="proveedorList">
            <!-- JS 'renderTemplateProveedores.js' generará items 'bg-warning-subtle' -->
        </ul>
    </div>
</div>
