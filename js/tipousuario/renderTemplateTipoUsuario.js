export function renderTipoUsuarioTemplate(tipoUsuario) {
  return `
      <li 
        class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
        data-id="${tipoUsuario.id_tipo_usuario}"
      >
        <div>
          <div class="fw-bold text-warning">${tipoUsuario.nombre_tipo}</div>
          <small class="text-white">${
            tipoUsuario.descripcion || "Sin descripción"
          }</small>
        </div>

        <div class="d-flex">
          <button class="btn btn-sm btn-editar-tipo-usuario me-2" data-id="${
            tipoUsuario.id_tipo_usuario
          }" style="background-color: #00A36C; color: white; border: none;">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-eliminar-tipo-usuario" data-id="${
            tipoUsuario.id_tipo_usuario
          }" style="background-color: #FF073A; color: white; border: none;">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
