<?php
require_once __DIR__ . '/../../controllers/CategoriaController.php';
require_once __DIR__ . '/../../controllers/ProveedoresController.php';
require_once __DIR__ . '/../../controllers/ProductoController.php';
use Controllers\CategoriaController;
use Controllers\ProveedoresController;
use Controllers\ProductoController;

$catController = new CategoriaController();
$provController = new ProveedoresController();
$prodController = new ProductoController();

$categorias = $catController->getCategorias();
$proveedores = $provController->getProveedores();
$productos = $prodController->obtenerListaClientes();
?>

<div class="p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-white mb-0">
            <i class="fas fa-box-open me-2 text-info"></i> Productos / Servicios
        </h3>
        <button class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i> Registrar Nuevo
        </button>
    </div>

    <form id="filtros-productos" class="mb-4">
        <div class="row g-2 align-items-end">
            <!-- Filtro por nombre -->
            <div class="col-md-4">
                <label for="filtro-nombre" class="form-label text-white">Nombre del Producto</label>
                <input type="text" id="filtro-nombre" name="filtro-nombre"
                    class="form-control bg-dark text-white border-secondary" placeholder="Buscar...">
            </div>
            <!-- Filtro por categoría -->
            <div class="col-md-3">
                <label for="filtro-categoria" class="form-label text-white">Categoría</label>
                <select id="filtro-categoria" name="filtro-categoria"
                    class="form-select bg-dark text-white border-secondary">
                    <option value="" selected>Seleccione Categoría</option>
                    <?php
                    foreach ($categorias as $cat) {
                        echo "<option value=\"{$cat['id_categoria']}\">{$cat['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Filtro por proveedor -->
            <div class="col-md-3">
                <label for="filtro-proveedor" class="form-label text-white">Proveedor</label>
                <select id="filtro-proveedor" name="filtro-proveedor"
                    class="form-select bg-dark text-white border-secondary">
                    <option value="" selected>Seleccione Proveedor</option>
                    <?php
                    foreach ($proveedores as $prov) {
                        echo "<option value=\"{$prov['id_proveedor']}\">{$prov['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Botón de búsqueda -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    <i class="fas fa-search me-1"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    <div class="list-group">
        <?php
        foreach ($productos as $prod) {
            echo '
        <div class="list-group-item bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3 mb-2">
            <div>
                <small class="d-block text-secondary fw-light">ID Producto: ' . $prod['id_producto'] . '</small>
                <h5 class="mb-1 text-info">' . $prod['producto'] . '</h5>
                <p class="mb-0 text-white small">
                    Categoría: ' . $prod['categoria'] . ' | Proveedor: ' . $prod['proveedor'] . '
                </p>
                <p class="mb-0 text-white small">
                    Descripción: ' . $prod['descripcion'] . '
                </p>
            </div>
            <div class="text-end">
                <div class="fs-5 text-success">S/ ' . number_format($prod['precio_final'], 2) . '</div>
                <div><small class="text-muted">Stock: ' . $prod['stock'] . '</small></div>
                <button class="btn btn-outline-info btn-sm mt-2">VER STOCK</button>
            </div>
        </div>';
        }
        ?>
    </div>
</div>