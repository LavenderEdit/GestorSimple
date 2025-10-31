export function renderTipoUsuarioTemplate(tipoUsuario) {
  return `
      <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
      <li 
        class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
        data-id="${tipoUsuario.id_tipo_usuario}"
      >
        <div>
          <!-- CAMBIO: Título a 'text-warning-emphasis' -->
          <div class="fw-bold text-warning-emphasis">${
            tipoUsuario.nombre_tipo
          }</div>
          <!-- CAMBIO: Texto a 'text-muted' -->
          <small class="text-muted">${
            tipoUsuario.descripcion || "Sin descripción"
          }</small>
        </div>

        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-tipo-usuario" data-id="${
            tipoUsuario.id_tipo_usuario
          }">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-tipo-usuario" data-id="${
            tipoUsuario.id_tipo_usuario
          }">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
