<div class="container mt-4">
  <h4 class="text-white">Listado de Pagos</h4>

  <!-- Filtro de búsqueda interactiva -->
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
        echo '<li class="list-group-item bg-dark text-white">No se encontraron pagos.</li>';
    } else {
        foreach ($pagos as $pago): 
            $fecha = ($pago['fecha_pago']);
            $badgeClass = $pago['estado_pago'] === 'COMPLETO' ? 'bg-success' : 'bg-danger';
        ?>
            <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        Pago #<?= htmlspecialchars($pago['id_pago']) ?>    
                    </div>
                    <small class="d-block">
                        <strong>Cliente:</strong> <?= htmlspecialchars($pago['cliente']) ?> |
                        <strong>Pago Utilizado:</strong> <?= htmlspecialchars($pago['referencia_pago']) ?>
                    </small>
                    <small class="d-block mt-1">
                        <strong>Fecha:</strong> <?= $fecha ?> |
                        <strong>Monto:</strong> S/<?= number_format($pago['monto'], 2) ?> |
                        <strong>Total Venta:</strong> S/<?= number_format($pago['total_venta'], 2) ?>
                    </small>
                </div>
                <div>
                    <span class="badge <?= $badgeClass ?> ms-2">
                        <?= htmlspecialchars($pago['estado_pago']) ?>
                    </span>
                    <button class="btn btn-sm btn-info ms-2 ver-detalle" 
                            data-pago-id="<?= $pago['id_pago'] ?>"
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
  <div class="modal fade" id="detallePagoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title">Detalles Completos del Pago</h5>
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body" id="modalPagoContent">
          <div class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Cargando...</span>
            </div>
            <p>Cargando detalles del pago...</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
