export function clientTemplate(cliente) {
  return `
    <!-- CAMBIO: Lista a 'bg-warning-subtle' y botones a 'outline' -->
    <li class
="list-group-item bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <!-- CAMBIO: Título a 'text-warning-emphasis' -->
        <div class="fw-bold text-warning-emphasis">${cliente.nombre}</div>
        <!-- CAMBIO: Texto a 'text-muted' -->
        <small class="text-muted">
          ID: ${cliente.id_cliente} |
          Doc: ${cliente.num_identificacion} |
          Email: ${cliente.email} |
          Tel: ${cliente.telefono}
        </small>
        <br>
        <!-- CAMBIO: Badge a 'bg-secondary-subtle' -->
        <span class="badge bg-secondary-subtle text-dark-emphasis">${cliente.direccion}</span>
      </div>
      <!-- CAMBIO: Botones a 'outline' y 'gap-2' -->
      <div class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-warning btn-editar-cliente" data-id="${cliente.id_cliente}">
          <i class="bi bi-pencil"></i> Editar
        </button>
        <button class="btn btn-sm btn-outline-danger btn-eliminar-cliente" data-id="${cliente.id_cliente}">
          <i class="bi bi-trash"></i> Eliminar
        </button>
      </div>
    </li>
  `;
}
