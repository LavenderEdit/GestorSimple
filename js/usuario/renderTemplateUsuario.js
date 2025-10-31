export function usuarioLiTemplate(usuario) {
  return `
      <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
      <li 
        class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
        data-id="${usuario.id_usuario}"
      >
        <div>
          <!-- CAMBIO: Título a 'text-warning-emphasis' -->
          <div class="fw-bold text-warning-emphasis">Usuario: ${usuario.nombre}</div>
          <!-- CAMBIO: Texto a 'text-muted' -->
          <small class="text-muted">Correo: ${usuario.correo}</small>
          <div><small class="text-muted">Tipo: ${usuario.tipo_usuario}</small></div>
        </div>
        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-usuario" data-id="${usuario.id_usuario}">
            <i class="fas fa-pen"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-usuario" data-id="${usuario.id_usuario}">
            <i class="fas fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
