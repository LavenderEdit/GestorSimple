export function ventasLiTemplate(venta) {
  const index = venta.index ?? 0;

  // Los estados semánticos (éxito, advertencia, peligro) se mantienen
  let claseEstado = "";
  let textoEstado = "";
  switch (venta.estado_pago) {
    case "P":
      claseEstado = "bg-success";
      textoEstado = "Pagado";
      break;
    case "FP":
      claseEstado = "bg-warning text-dark"; // Amarillo cálido, texto oscuro
      textoEstado = "Falta Pago";
      break;
    case "E":
      claseEstado = "bg-danger";
      textoEstado = "Anulado";
      break;
    default:
      claseEstado = "bg-secondary";
      textoEstado = "Desconocido";
  }

  return `
    <!-- CAMBIO: Lista a 'bg-warning-subtle' -->
    <li 
      class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
      style="cursor: pointer;"
      data-id="${venta.id_venta}"
    >
      <div>
        <!-- CAMBIO: Título a 'text-warning-emphasis' -->
        <div class="fw-bold text-warning-emphasis">Venta #${index + 1}</div>
        <!-- CAMBIO: Texto a 'text-muted' -->
        <small class="text-muted">Cliente: ${venta.cliente} | Usuario: ${
    venta.usuario
  }</small>
        <div><small class="text-muted">Fecha: ${venta.fecha}</small></div>
      </div>
      <div class="text-end">
        <!-- El total usa el color semántico del estado -->
        <span class="badge fs-6 ${claseEstado}">S/ ${parseFloat(
    venta.total
  ).toFixed(2)}</span><br>
        <!-- CAMBIO: Texto a 'text-dark' -->
        <small class="text-dark fst-italic">${textoEstado}</small>
      </div>
    </li>
  `;
}
