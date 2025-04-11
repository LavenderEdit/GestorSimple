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
        <span class="badge bg-primary rounded-pill">
          Tipo ${cliente.id_tipo_cliente}
        </span>
      </li>
    `;
}
