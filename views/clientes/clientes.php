<?php
// Requerimos los controladores necesarios al inicio
require_once __DIR__ . '/../../controllers/TipoClienteController.php';
require_once __DIR__ . '/../../controllers/ClientesController.php';

use Controllers\TipoClienteController;
use Controllers\ClientesController;

// Obtenemos los tipos de cliente para el modal
$tipoClienteController = new TipoClienteController();
$tipos = $tipoClienteController->getTiposClientes();

// Obtenemos los clientes para la carga inicial
$clientesController = new ClientesController();
$clientes = $clientesController->obtenerClientes();
?>

<div class="p-3">

    <!-- CAMBIO: Título a 'text-dark', Botón a 'btn-warning' -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark mb-0">
            <!-- CAMBIO: Icono a 'text-warning' -->
            <i class="fa-solid fa-id-card-clip me-2 text-warning"></i> Clientes
        </h3>
        <!-- CAMBIO: Botón a 'btn-warning' -->
        <button class="btn btn-sm btn-warning text-dark fw-bold" id="btnRegistrarCliente">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <!-- Modal Bootstrap 5 -->
    <!-- CAMBIO: Modal a tema claro (bg-white, text-dark) -->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="modalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Cliente / Proveedor</h5>
                    <!-- CAMBIO: Quitado 'btn-close-white' -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Único tab activo: INFORMACIÓN -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <form id="formAgregarCliente">
                            <div class="row g-3 p-3">
                                <div class="col-md-6">
                                    <input type="hidden" name="id_cliente">
                                    <label for="num_identificacion" class="form-label">Número de Identificación</label>
                                    <!-- CAMBIO: Inputs a estilo claro (default) -->
                                    <input type="text" class="form-control" id="num_identificacion"
                                        name="num_identificacion" required>
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
                                    <input type="email" class="form-control" id="email" name="email"
                                        autocomplete="email">
                                </div>

                                <div class="col-md-12">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>

                                <div class="col-md-12">
                                    <label for="id_tipo_cliente" class="form-label">Tipo de Cliente</label>
                                    <!-- CAMBIO: Select a estilo claro (default) -->
                                    <select class="form-select" id="id_tipo_cliente" name="id_tipo_cliente" required>
                                        <option value="" selected>Seleccione su Tipo de Cliente</option>
                                        <?php
                                        foreach ($tipos as $tipo) {
                                            echo "<option value='{$tipo['id_tipo_cliente']}'>" . htmlspecialchars($tipo['nombre_tipo']) . "</option>";
                                        }
                                        ?>
                                    </select>
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
        </div>
    </div>

    <!-- Listado de clientes general -->
    <div class="container mt-4">
        <!-- CAMBIO: Título a 'text-dark' -->
        <h4 class="text-dark">Listado de Clientes</h4>

        <!-- Filtro de búsqueda interactiva -->
        <!-- CAMBIO: Inputs a estilo claro (default) -->
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="searchInput" name="searchInput"
                    placeholder="Buscar cliente...">
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
                <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
                <li
                    class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold text-warning-emphasis"><?php echo htmlspecialchars($cliente['nombre']); ?>
                        </div>
                        <small class="text-muted">
                            ID: <?php echo htmlspecialchars($cliente['id_cliente']); ?> |
                            Doc: <?php echo htmlspecialchars($cliente['num_identificacion']); ?> |
                            Email: <?php echo htmlspecialchars($cliente['email']); ?> |
                            Tel: <?php echo htmlspecialchars($cliente['telefono']); ?>
                        </small>
                        <br>
                        <span
                            class="badge bg-secondary-subtle text-dark-emphasis"><?php echo htmlspecialchars($cliente['direccion']); ?></span>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-warning btn-editar-cliente"
                            data-id="<?php echo $cliente['id_cliente']; ?>">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-outline-danger btn-eliminar-cliente"
                            data-id="<?php echo $cliente['id_cliente']; ?>">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
