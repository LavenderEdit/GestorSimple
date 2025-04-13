export function ventasLiTemplate(venta) {
  const index = venta.index ?? 0;

  let claseEstado = "";
  switch (venta.estado_pago) {
    case "P":
      claseEstado = "bg-success";
      break;
    case "FP":
      claseEstado = "bg-warning";
      break;
    case "E":
      claseEstado = "bg-danger";
      break;
    default:
      claseEstado = "bg-secondary";
  }

  return `
    <li 
      class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
      style="cursor: pointer;"
      data-id="${venta.id_venta}"
    >
      <div>
        <div class="fw-bold text-info">Venta #${index + 1}</div>
        <small class="text-white">Cliente: ${venta.cliente} | Usuario: ${
    venta.usuario
  }</small>
        <div><small class="text-white">Fecha: ${venta.fecha}</small></div>
      </div>
      <div class="text-end">
        <span class="badge fs-6 ${claseEstado}">S/ ${venta.total}</span><br>
        <small class="text-light fst-italic">${venta.estado_pago}</small>
      </div>
    </li>
  `;
}
