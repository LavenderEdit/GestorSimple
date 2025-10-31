<div class="container mt-4">
  <!-- CAMBIO: Título a 'text-dark' -->
  <h4 class="text-dark">Listado de Pagos</h4>

  <!-- Filtro de búsqueda interactiva -->
  <!-- CAMBIO: Inputs a estilo claro (default) -->
  <div class="row mb-3">
    <div class="col-md-4">
      <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Buscar pago...">
    </div>
    <div class="col-md-2">
      <select class="form-select" id="searchType" name="searchType">
        <option value="">Seleccione el tipo de filtrado</option>
        <option value="id">Código de Pago</option>
        <option value="metodo">Método de Pago</option>
      </select>
    </div>
  </div>

  <!-- Listado de pagos -->
  <ul class="list-group" id="pagoList">
    <?php
    require_once __DIR__ . '/../../controllers/PagoController.php';
    use Controllers\PagoController;

    $controller = new PagoController();
    $pagos = $controller->obtenerListaPagos();

    if (empty($pagos)) {
      // CAMBIO: Empty state a 'bg-warning-subtle'
      echo '<li class="list-group-item bg-warning-subtle text-muted">No se encontraron pagos.</li>';
    } else {
      foreach ($pagos as $pago):
        $fecha = ($pago['fecha_pago']);
        $badgeClass = $pago['estado_pago'] === 'COMPLETO' ? 'bg-success' : 'bg-danger';
        ?>
        <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
        <li class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <!-- CAMBIO: Título a 'text-warning-emphasis' -->
            <div class="fw-bold text-warning-emphasis">
              Pago #<?= htmlspecialchars($pago['id_pago']) ?>
            </div>
            <!-- CAMBIO: Texto a 'text-muted' -->
            <small class="d-block text-muted">
              <strong>Cliente:</strong> <?= htmlspecialchars($pago['cliente']) ?> |
              <strong>Pago Utilizado:</strong> <?= htmlspecialchars($pago['referencia_pago']) ?>
            </small>
            <!-- CAMBIO: Texto a 'text-muted' -->
            <small class="d-block mt-1 text-muted">
              <strong>Fecha:</strong> <?= $fecha ?> |
              <strong>Monto:</strong> S/<?= number_format($pago['monto'], 2) ?> |
              <strong>Total Venta:</strong> S/<?= number_format($pago['total_venta'], 2) ?>
            </small>
          </div>
          <div>
            <span class="badge <?= $badgeClass ?> ms-2">
              <?= htmlspecialchars($pago['estado_pago']) ?>
            </span>
            <!-- CAMBIO: Botón 'btn-info' a 'btn-outline-warning' -->
            <button class="btn btn-sm btn-outline-warning ms-2 ver-detalle" data-pago-id="<?= $pago['id_pago'] ?>"
              title="Ver detalles">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </li>
      <?php endforeach;
    }
    ?>
  </ul>

  <!-- Modal para detalles del pago -->
  <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
  <div class="modal fade" id="detallePagoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-dark">
        <div class="modal-header">
          <h5 class="modal-title">Detalles Completos del Pago</h5>
          <!-- CAMBIO: Quitado 'btn-close-red' -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalPagoContent">
          <div class="text-center">
            <!-- CAMBIO: Spinner 'text-primary' a 'text-warning' -->
            <div class="spinner-border text-warning" role="status">
              <span class="visually-hidden">Cargando...</span>
            </div>
            <p>Cargando detalles del pago...</p>
          </div>
        </div>
        <div class="modal-footer">
          <!-- CAMBIO: 'btn-danger' a 'btn-secondary' -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
