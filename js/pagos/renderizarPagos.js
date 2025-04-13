import { initModalPagos } from './modalPagos.js';

export function renderizarPagos(pagos) {
    const pagoList = document.getElementById("pagoList");
    pagoList.innerHTML = "";

    if (pagos.length === 0) {
        pagoList.innerHTML = `<li class="list-group-item bg-dark text-white">No se encontraron pagos.</li>`;
        return;
    }

    pagos.forEach(pago => {
        const pagoItem = document.createElement("li");
        pagoItem.className = "list-group-item bg-dark text-white d-flex justify-content-between align-items-start";
        pagoItem.innerHTML = `
            <div class="ms-2 me-auto">
                <div class="fw-bold">
                    Pago #${pago.id_pago}
                </div>
                <small>
                    <strong>Cliente:</strong> ${pago.cliente} |
                    <strong>Fecha:</strong> ${pago.fecha_pago} |
                    <strong>Monto:</strong> S/${pago.monto}
                </small>
                <div class="mt-2">
                    <small>
                        <strong>Pago Utilizado:</strong> ${pago.referencia_pago} |
                        <strong>Total Venta:</strong> S/${pago.total_venta}
                    </small>
                </div>
            </div>
            <div>
                <span class="badge bg-${pago.estado_pago === 'COMPLETO' ? 'success' : 'danger'} ms-2">
                    ${pago.estado_pago}
                </span>
                <button class="btn btn-sm btn-info ms-2 ver-detalle" 
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