export function productoLiTemplate(producto) {
  return `
    <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
    <li class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start p-3">
      <div class="ms-2 flex-grow-1">
        <!-- CAMBIO: Título a 'text-warning-emphasis' -->
        <div class="fw-bold text-warning-emphasis mb-1">${
          producto.producto
        }</div>
        <!-- CAMBIO: Texto a 'text-muted' -->
        <small class="d-block mb-1 text-muted">
          ID: ${producto.id_producto} | Categoría: ${
    producto.categoria
  } | Proveedor: ${producto.proveedor}
        </small>
        <!-- CAMBIO: Texto a 'text-muted' -->
        <p class="mb-0 text-muted small">Descripción: ${
          producto.descripcion
        }</p>
      </div>
      <div class="d-flex flex-column align-items-end">
        <!-- El verde 'text-success' para el precio está bien -->
        <div class="fs-5 text-success mb-2">S/ ${parseFloat(
          producto.precio_final
        ).toFixed(2)}</div>
        <div class="mb-2"><small class="text-muted">Stock: ${
          producto.stock
        }</small></div>
        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-producto" data-id="${
            producto.id_producto
          }">
            <i class="bi bi-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-producto" data-id="${
            producto.id_producto
          }">
            <i class="bi bi-trash"></i> Eliminar
          </button>
        </div>
      </div>
    </li>
  `;
}
