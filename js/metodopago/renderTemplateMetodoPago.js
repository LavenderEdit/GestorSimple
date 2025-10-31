export function renderMetodoPagoTemplate(metodoPago) {
  return `
      <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
      <li 
        class="list-group-item list-group-item-action bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
        data-id="${metodoPago.id_metodo_pago}"
      >
        <div>
          <!-- CAMBIO: Título a 'text-warning-emphasis' -->
          <div class="fw-bold text-warning-emphasis">${
            metodoPago.nombre_metodo
          }</div>
          <!-- CAMBIO: Descripción a 'text-muted' -->
          <small class="text-muted">${
            metodoPago.descripcion || "Sin descripción"
          }</small>
        </div>

        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-metodo-pago" data-id="${
            metodoPago.id_metodo_pago
          }">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-metodo-pago" data-id="${
            metodoPago.id_metodo_pago
          }">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
