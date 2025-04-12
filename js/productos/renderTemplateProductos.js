export function productoLiTemplate(producto) {
  return `
    <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-start p-3">
      <div class="ms-2 flex-grow-1">
        <div class="fw-bold text-info mb-1">${producto.producto}</div>
        <small class="d-block mb-1">
          ID: ${producto.id_producto} | Categoría: ${
    producto.categoria
  } | Proveedor: ${producto.proveedor}
        </small>
        <p class="mb-0 text-white small">Descripción: ${
          producto.descripcion
        }</p>
      </div>
      <div class="d-flex flex-column align-items-end">
        <div class="fs-5 text-success mb-2">S/ ${parseFloat(
          producto.precio_final
        ).toFixed(2)}</div>
        <div class="mb-2"><small class="text-muted">Stock: ${
          producto.stock
        }</small></div>
        <div class="d-flex">
          <button class="btn btn-sm btn-editar-producto me-2" data-id="${
            producto.id_producto
          }" style="background-color: #00A36C; color: white; border: none;">
            <i class="bi bi-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-eliminar-producto" data-id="${
            producto.id_producto
          }" style="background-color: #FF073A; color: white; border: none;">
            <i class="bi bi-trash"></i> Eliminar
          </button>
        </div>
      </div>
    </li>
  `;
}
