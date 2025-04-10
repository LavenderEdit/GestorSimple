export function renderizarProductos(productos) {
  const $lista = $(".list-group");
  $lista.empty();

  if (!Array.isArray(productos)) {
    console.error("El dato recibido no es un array:", productos);
    $lista.append(
      `<div class="text-danger">Error interno al cargar productos.</div>`
    );
    return;
  }

  if (productos.length === 0) {
    $lista.append(`
      <div class="list-group-item bg-dark text-light border-secondary text-center">
        <p class="mb-0">No se encontraron productos con los filtros aplicados.</p>
      </div>
    `);
    return;
  }

  productos.forEach((prod) => {
    $lista.append(`
      <div class="list-group-item bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3 mb-2">
        <div>
          <small class="d-block text-secondary fw-light">ID Producto: ${
            prod.id_producto
          }</small>
          <h5 class="mb-1 text-info">${prod.producto}</h5>
          <p class="mb-0 text-white small">
            Categoría: ${prod.categoria} | Proveedor: ${prod.proveedor}
          </p>
          <p class="mb-0 text-white small">
            Descripción: ${prod.descripcion}
          </p>
        </div>
        <div class="text-end">
          <div class="fs-5 text-success">S/ ${parseFloat(
            prod.precio_final
          ).toFixed(2)}</div>
          <div><small class="text-muted">Stock: ${prod.stock}</small></div>
          <button class="btn btn-outline-info btn-sm mt-2">VER STOCK</button>
        </div>
      </div>
    `);
  });
}
