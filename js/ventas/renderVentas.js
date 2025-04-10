export function pintarVentas(ventas) {
  const $listado = $("#ventas-list");
  $listado.empty();

  if (!ventas || ventas.length === 0) {
    $listado.append(
      '<div class="text-center text-white">No hay ventas para esta fecha.</div>'
    );
    return;
  }

  ventas.forEach((venta, index) => {
    const claseMonto = venta.total >= 100 ? "bg-success" : "bg-danger";
    const itemHTML = `
            <a href="#" class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3">
                <div>
                    <div class="fw-bold text-info">Venta #${index + 1}</div>
                    <small class="text-white">Cliente: ${
                      venta.cliente
                    } | Usuario: ${venta.usuario}</small>
                    <div><small class="text-white">Fecha: ${
                      venta.fecha
                    }</small></div>
                </div>
                <span class="badge fs-6 ${claseMonto}">S/ ${venta.total}</span>
            </a>`;
    $listado.append(itemHTML);
  });
}
