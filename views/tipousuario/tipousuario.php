<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-white mb-0"><i class="fas fa-user me-2"></i> Tipos de Usuario</h4>
        <button class="btn btn-success" id="btnRegistrarTipoUsuario">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <div class="modal fade" id="modalTipoUsuario" tabindex="-1" aria-labelledby="modalTipoUsuarioLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: rgba(33, 37, 41, 1) !important; color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTipoUsuarioLabel">Registrar Tipo de Usuario</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <form id="formTipoUsuario">
                    <div class="modal-body">
                        <input type="hidden" name="id_tipo_usuario">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Tipo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" id="inputBuscarTipoUsuario" placeholder="Buscar...">
                <select class="form-select" id="selectFiltroTipoUsuario">
                    <option value="">Selecciona...</option>
                    <option value="id">Id</option>
                </select>
            </div>
        </div>
    </div>

    <ul class="list-group" id="lista-tipousuario">
        <!-- Aquí se renderizan los tipos de usuario dinámicamente -->
    </ul>
</div>