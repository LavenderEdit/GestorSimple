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
            <input type="text" id="fechaBusqueda"
                class="form-control form-control-sm bg-dark border-secondary me-2 text-white">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="comprobanteModal" tabindex="-1" aria-labelledby="comprobanteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-anchura-media">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="comprobanteModalLabel"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Encabezado tipo factura y monto -->
                    <div class="text-center mb-3">
                        <h6 class="fw-bold mb-1"></h6>
                        <h4 class="text-success"></h4>
                    </div>

                    <!-- Información del cliente, usuario y estado -->
                    <div class="card bg-secondary mb-3">
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

                    <!-- Botones organizados en dos columnas -->
                    <div class="row g-2">
                        <div class="col-md-6 d-grid">
                            <button class="btn btn-primary">ENVIAR POR EMAIL</button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button class="btn btn-primary">VISUALIZAR PDF</button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button class="btn btn-primary">DESCARGAR PDF</button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button class="btn btn-primary">IMPRIMIR</button>
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-danger">DAR DE BAJA (ANULAR)</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Listado principal de ventas -->
    <div class="list-group" id="ventas-list">
    </div>
</div>