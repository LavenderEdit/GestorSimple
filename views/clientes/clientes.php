<div class="p-3">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-white mb-0">
      <i class="fa-solid fa-id-card-clip me-2 text-info"></i> Clientes
    </h3>
    <button class="btn btn-sm btn-primary" id="btnRegistrarCliente">
      <i class="fas fa-plus me-1"></i> Registrar Nuevo
    </button>
  </div>

  <!-- Modal Bootstrap 5 -->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="modalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background-color: rgba(33, 37, 41, 1) !important; color: white;">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Cliente / Proveedor</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
              aria-label="Cerrar"></button>
          </div>

          <!-- Único tab activo: INFORMACIÓN -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="info" role="tabpanel">
              <form id="formAgregarCliente">
                <div class="row g-3 p-3">
                  <div class="col-md-6">
                    <input type="hidden" name="id_cliente">

                    <label for="num_identificacion" class="form-label">Número de Identificación</label>
                    <input type="text" class="form-control" id="num_identificacion" name="num_identificacion" required>
                  </div>

                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre o razón social</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>

                  <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                  </div>

                  <div class="col-md-6">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="email">
                  </div>

                  <div class="col-md-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                  </div>

                  <div class="col-md-12">
                    <label for="id_tipo_cliente" class="form-label">Tipo de Cliente</label>
                    <select class="form-select" id="id_tipo_cliente" name="id_tipo_cliente" required>
                      <option value="" selected>Seleccione su Tipo de Cliente</option>
                      <?php
                      require_once __DIR__ . '/../../controllers/TipoClienteController.php';
                      use Controllers\TipoClienteController;

                      $controller = new TipoClienteController();
                      $tipos = $controller->getTiposClientes();

                      foreach ($tipos as $tipo) {
                        echo "<option value='{$tipo['id_tipo_cliente']}'>{$tipo['nombre_tipo']}</option>";
                      }
                      ?>
                    </select>
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
      </div>
    </div>

    <!-- Listado de clientes general -->
    <?php
    require_once __DIR__ . '/../../controllers/ClientesController.php';
    use Controllers\ClientesController;

    $controller = new ClientesController();
    $clientes = $controller->obtenerClientes();
    ?>

    <div class="container mt-4">
      <h4 class="text-white">Listado de Clientes</h4>

      <!-- Filtro de búsqueda interactiva -->
      <div class="row mb-3">
        <div class="col-md-4">
          <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Buscar cliente...">
        </div>
        <div class="col-md-2">
          <select class="form-select" id="searchType" name="searchType">
            <option value="todos">Seleccione el tipo de filtrado</option>
            <option value="id">ID Cliente</option>
            <option value="nombre">Nombre Cliente</option>
          </select>
        </div>
      </div>

      <!-- Listado de clientes, que se actualizará con AJAX -->
      <ul class="list-group" id="clienteList">
        <?php foreach ($clientes as $cliente): ?>
          <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?php echo htmlspecialchars($cliente['nombre']); ?></div>
              <small>
                ID: <?php echo htmlspecialchars($cliente['id_cliente']); ?> |
                Doc: <?php echo htmlspecialchars($cliente['num_identificacion']); ?> |
                Email: <?php echo htmlspecialchars($cliente['email']); ?> |
                Tel: <?php echo htmlspecialchars($cliente['telefono']); ?>
              </small>
              <br>
              <span class="badge bg-secondary"><?php echo htmlspecialchars($cliente['direccion']); ?></span>
            </div>
            <div>
              <button class="btn btn-sm btn-editar-cliente me-2" data-id="<?php echo $cliente['id_cliente']; ?>"
                style="background-color: #00A36C; color: white; border: none;">
                <i class="bi bi-pencil"></i> Editar
              </button>
              <button class="btn btn-sm btn-eliminar-cliente" data-id="<?php echo $cliente['id_cliente']; ?>"
                style="background-color: #FF073A; color: white; border: none;">
                <i class="bi bi-trash"></i> Eliminar
              </button>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
</div>