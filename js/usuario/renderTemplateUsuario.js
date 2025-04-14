export function usuarioLiTemplate(usuario) {
  return `
      <li 
        class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
        data-id="${usuario.id_usuario}"
      >
        <div>
          <div class="fw-bold text-info">Usuario: ${usuario.nombre}</div>
          <small class="text-white">Correo: ${usuario.correo}</small>
          <div><small class="text-light">Tipo: ${usuario.tipo_usuario}</small></div>
        </div>
        <div class="text-end">
          <button class="btn btn-sm btn-outline-primary me-2 btn-editar-usuario" data-id="${usuario.id_usuario}">
            <i class="fas fa-pen"></i>
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-usuario" data-id="${usuario.id_usuario}">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </li>
    `;
}
