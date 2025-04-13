export function renderTipoClienteTemplate(tipoCliente) {
  return `
      <li 
        class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
        data-id="${tipoCliente.id_tipo_cliente}"
      >
        <div>
          <div class="fw-bold text-success">${tipoCliente.nombre_tipo}</div>
          <small class="text-white">${
            tipoCliente.descripcion || "Sin descripción"
          }</small>
        </div>

        <div class="d-flex">
          <button class="btn btn-sm btn-editar-tipo-cliente me-2" data-id="${
            tipoCliente.id_tipo_cliente
          }" style="background-color: #00A36C; color: white; border: none;">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-eliminar-tipo-cliente" data-id="${
            tipoCliente.id_tipo_cliente
          }" style="background-color: #FF073A; color: white; border: none;">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
