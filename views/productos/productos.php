<div class="p-3">
    <!-- CAMBIO: Título a 'text-dark', Botón a 'btn-warning' -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark mb-0">
            <!-- CAMBIO: Icono a 'text-warning' -->
            <i class="fas fa-box-open me-2 text-warning"></i> Productos / Servicios
        </h3>
        <!-- CAMBIO: Botón a 'btn-warning' -->
        <button class="btn btn-sm btn-warning text-dark fw-bold" id="btnRegistrarProducto">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <!-- Modal para Agregar Producto -->
    <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                    <!-- CAMBIO: Quitado 'btn-close-white' -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <form id="formAgregarProducto">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Campo oculto para id_producto en caso de edición -->
                            <div class="col-12">
                                <input type="hidden" name="id_producto">
                            </div>
                            <div class="col-md-6">
                                <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                                <!-- CAMBIO: Inputs a estilo claro (default) -->
                                <input type="text" class="form-control" id="nombreProducto" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="precioProducto" class="form-label">Precio (normal)</label>
                                <input type="number" step="0.01" class="form-control" id="precioProducto" name="precio"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="stockProducto" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stockProducto" name="stock" required>
                            </div>
                            <div class="col-md-6">
                                <label for="gananciaProducto" class="form-label">Ganancia (%)</label>
                                <input type="number" step="0.01" class="form-control" id="gananciaProducto"
                                    name="ganancia" required>
                            </div>
                            <!-- Campo calculado: Precio Final -->
                            <div class="col-md-6">
                                <label for="precioFinalProducto" class="form-label">Precio Final</label>
                                <input type="number" step="0.01" class="form-control" id="precioFinalProducto"
                                    name="precio_final" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="categoriaProducto" class="form-label">Categoría</label>
                                <select id="categoriaProducto" name="id_categoria" class="form-select" required>
                                    <option value="" selected>Seleccione Categoría</option>
                                    <!-- Las opciones se cargarán dinámicamente o desde PHP -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="proveedorProducto" class="form-label">Proveedor</label>
                                <select id="proveedorProducto" name="id_proveedor" class="form-select" required>
                                    <option value="" selected>Seleccione Proveedor</option>
                                    <!-- Las opciones se cargarán dinámicamente o desde PHP -->
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="descripcionProducto" class="form-label">Descripción</label>
                                <textarea id="descripcionProducto" name="descripcion" class="form-control"
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <!-- CAMBIO: Botón principal a 'btn-warning' -->
                        <button type="submit" class="btn btn-warning text-dark fw-bold">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form id="filtros-productos" class="mb-4">
        <div class="row g-2 align-items-end">
            <!-- Filtro por nombre -->
            <div class="col-md-6">
                <!-- CAMBIO: Label a 'text-dark' -->
                <label for="filtro-nombre" class="form-label text-dark">Nombre del Producto</label>
                <!-- CAMBIO: Inputs a estilo claro (default) -->
                <input type="text" id="filtro-nombre" name="filtro-nombre" class="form-control"
                    placeholder="Buscar...">
            </div>
            <!-- Filtro por categoría -->
            <div class="col-md-3">
                <!-- CAMBIO: Label a 'text-dark' -->
                <label for="filtro-categoria" class="form-label text-dark">Categoría</label>
                <!-- CAMBIO: Inputs a estilo claro (default) -->
                <select id="filtro-categoria" name="filtro-categoria" class="form-select">
                    <!-- Opciones se cargarán dinámicamente -->
                </select>
            </div>
            <!-- Filtro por proveedor -->
            <div class="col-md-3">
                <!-- CAMBIO: Label a 'text-dark' -->
                <label for="filtro-proveedor" class="form-label text-dark">Proveedor</label>
                <!-- CAMBIO: Inputs a estilo claro (default) -->
                <select id="filtro-proveedor" name="filtro-proveedor" class="form-select">
                    <!-- Opciones se cargarán dinámicamente -->
                </select>
            </div>
        </div>
    </form>

    <!-- Contenedor para la lista de productos -->
    <ul class="list-group" id="productoList">
        <!-- Los productos se renderizarán dinámicamente aquí -->
        <!-- JS 'renderTemplateProductos.js' generará items 'bg-warning-subtle' -->
    </ul>

</div>
