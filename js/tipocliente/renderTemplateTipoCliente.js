export function renderTipoClienteTemplate(tipoCliente) {
  return `
      <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
      <li 
        class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
        data-id="${tipoCliente.id_tipo_cliente}"
      >
        <div>
          <!-- CAMBIO: Título a 'text-warning-emphasis' -->
          <div class="fw-bold text-warning-emphasis">${
            tipoCliente.nombre_tipo
          }</div>
          <!-- CAMBIO: Texto a 'text-muted' -->
          <small class="text-muted">${
            tipoCliente.descripcion || "Sin descripción"
          }</small>
        </div>

        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button classs="btn btn-sm btn-outline-warning btn-editar-tipo-cliente" data-id="${
            tipoCliente.id_tipo_cliente
          }">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-tipo-cliente" data-id="${
            tipoCliente.id_tipo_cliente
          }">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
