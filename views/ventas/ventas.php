<div class="container-fluid px-3 mt-4">
    <!-- Encabezado con fecha y selector -->
    <!-- CAMBIO: Título a 'text-dark', ícono a 'text-warning', inputs a estilo claro -->
    <div class="row mb-4 justify-content-between align-items-center">
        <div class="col-auto">
            <h4 class="text-dark mb-0">
                <i class="fas fa-calendar-day me-2 text-warning"></i>
                <span class="header-date"></span>
            </h4>
        </div>
        <div class="col-auto d-flex align-items-center">
            <input type="text" id="fechaBusqueda"
                class="form-control form-control-sm">
        </div>
    </div>

    <!-- Modal -->
    <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
    <div class="modal fade" id="comprobanteModal" tabindex="-1" aria-labelledby="comprobanteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-anchura-media">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="comprobanteModalLabel"></h5>
                    <!-- CAMBIO: Quitado 'btn-close-white' -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Encabezado tipo factura y monto -->
                    <div class="text-center mb-3">
                        <h6 class="fw-bold mb-1"></h6>
                        <!-- Mantenemos text-success por semántica de dinero -->
                        <h4 class="text-success"></h4> 
                    </div>

                    <!-- Información del cliente, usuario y estado -->
                    <!-- CAMBIO: Card a 'bg-light' -->
                    <div class="card bg-light border-secondary-subtle mb-3">
                        <div class="card-body">
                            <p class="mb-1">
                                <strong></strong><br>
                                <br>
                            </p>
                            <p class="mb-1">
                                <strong></strong><br>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="d-grid mt-3">
                        <!-- Mantenemos 'btn-danger' por semántica de acción peligrosa -->
                        <button class="btn btn-danger">DAR DE BAJA (ANULAR)</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Listado principal de ventas -->
    <div class="list-group" id="ventas-list">
         <!-- JS 'renderTemplateVentas.js' generará items 'bg-warning-subtle' -->
    </div>
</div>

