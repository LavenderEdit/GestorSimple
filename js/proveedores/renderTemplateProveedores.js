export function proveedorLiTemplate(proveedor) {
  return `
      <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
      <li class="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start p-3">
        <div class="ms-2 me-auto">
          <!-- CAMBIO: Título a 'text-warning-emphasis' -->
          <div class="fw-bold text-warning-emphasis">${proveedor.nombre}</div>
          <!-- CAMBIO: Texto a 'text-muted' -->
          <small class="text-muted">
            ID: ${proveedor.id_proveedor} |
            Email: ${proveedor.email} |
            Tel: ${proveedor.telefono}
          </small>
          <br>
          <!-- CAMBIO: Badge a 'text-bg-secondary' (default light) -->
          <span class="badge text-bg-secondary">${proveedor.direccion}</span>
        </div>
        <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-proveedor" data-id="${proveedor.id_proveedor}">
            <i class="bi bi-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-proveedor" data-id="${proveedor.id_proveedor}">
            <i class="bi bi-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}

export function proveedorOptionTemplate(proveedor) {
  return `<option value="${proveedor.id_proveedor}">${proveedor.nombre}</option>`;
}
