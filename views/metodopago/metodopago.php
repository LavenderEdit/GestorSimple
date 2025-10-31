<div class="container mt-4">
    <!-- CAMBIO: Título a 'text-dark', Botón a 'btn-warning' -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark mb-0">
            <!-- CAMBIO: Icono a 'text-warning' -->
            <i class="fa-solid fa-comment-dollar me-2 text-warning"></i> Métodos de Pago
        </h4>
        <!-- CAMBIO: Botón a 'btn-warning' -->
        <button class="btn btn-warning text-dark fw-bold" id="btnRegistrarMetodoPago">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
    <div class="modal fade" id="modalMetodoPago" tabindex="-1" aria-labelledby="modalMetodoPagoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMetodoPagoLabel">Registrar Método de Pago</h5>
                    <!-- CAMBIO: Quitado 'btn-close-white' -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <form id="formMetodoPago">
                    <div class="modal-body">
                        <input type="hidden" name="id_metodo_pago">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Método</label>
                            <!-- CAMBIO: Inputs a estilo claro (default) -->
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <!-- CAMBIO: Inputs a estilo claro (default) -->
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
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

    <!-- CAMBIO: Inputs a estilo claro (default) -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" id="inputBuscarMetodoPago" placeholder="Buscar...">
                <select class="form-select" id="selectFiltroMetodoPago">
                    <option value="">Selecciona...</option>
                    <option value="id">Id</option>
                </select>
            </div>
        </div>
    </div>

    <ul class="list-group" id="lista-metodopago">
        <!-- Aquí se renderizan los métodos de pago dinámicamente -->
        <!-- JS 'renderTemplateMetodoPago.js' generará items 'bg-warning-subtle' -->
    </ul>
</div>
