import { initModalPagos } from "./modalPagos.js";

export function renderizarPagos(pagos) {
  const pagoList = document.getElementById("pagoList");
  pagoList.innerHTML = "";

  if (pagos.length === 0) {
    // CAMBIO: Empty state a 'bg-warning-subtle'
    pagoList.innerHTML = `<li class="list-group-item bg-warning-subtle text-muted">No se encontraron pagos.</li>`;
    return;
  }

  pagos.forEach((pago) => {
    const pagoItem = document.createElement("li");
    // CAMBIO: Lista a 'bg-warning-subtle'
    pagoItem.className =
      "list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start";
    pagoItem.innerHTML = `
        <div class="ms-2 me-auto">
            <!-- CAMBIO: Título a 'text-warning-emphasis' -->
            <div class="fw-bold text-warning-emphasis">
                Pago #${pago.id_pago}
            </div>
            <!-- CAMBIO: Texto a 'text-muted' -->
            <small class="text-muted">
                <strong>Cliente:</strong> ${pago.cliente} |
                <strong>Fecha:</strong> ${pago.fecha_pago} |
                <strong>Monto:</strong> S/${pago.monto}
            </small>
            <!-- CAMBIO: Texto a 'text-muted' -->
            <div class="mt-2">
                <small class="text-muted">
                    <strong>Pago Utilizado:</strong> ${pago.referencia_pago} |
                    <strong>Total Venta:</strong> S/${pago.total_venta}
                </small>
            </div>
        </div>
        <div>
            <span class="badge bg-${
              pago.estado_pago === "COMPLETO" ? "success" : "danger"
            } ms-2">
                ${pago.estado_pago}
            </span>
            <!-- CAMBIO: Botón 'btn-info' a 'btn-outline-warning' -->
            <button class="btn btn-sm btn-outline-warning ms-2 ver-detalle" 
                    data-pago-id="${pago.id_pago}"
                    title="Ver detalles">
                <i class="fas fa-eye"></i>
            </button>
        </div>
      `;
    pagoList.appendChild(pagoItem);
  });

  // Inicializar modal para los nuevos elementos
  initModalPagos();
}
