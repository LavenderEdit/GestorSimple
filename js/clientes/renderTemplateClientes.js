export function clientTemplate(cliente) {
  return `
    <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <div class="fw-bold">${cliente.nombre}</div>
        <small>
          ID: ${cliente.id_cliente} |
          Doc: ${cliente.num_identificacion} |
          Email: ${cliente.email} |
          Tel: ${cliente.telefono}
        </small>
        <br>
        <span class="badge bg-secondary">${cliente.direccion}</span>
      </div>
      <div>
        <button class="btn btn-sm btn-editar-cliente me-2" data-id="${cliente.id_cliente}" style="background-color: #00A36C; color: white; border: none;">
          <i class="bi bi-pencil"></i> Editar
        </button>
        <button class="btn btn-sm btn-eliminar-cliente" data-id="${cliente.id_cliente}" style="background-color: #FF073A; color: white; border: none;">
          <i class="bi bi-trash"></i> Eliminar
        </button>
      </div>
    </li>
  `;
}
