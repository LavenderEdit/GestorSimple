export function renderizarClientes(clientes) {
    const clienteList = document.getElementById("clienteList");
    clienteList.innerHTML = "";

    if (clientes.length === 0) {
        clienteList.innerHTML = `<li class="list-group-item bg-dark text-white">No se encontraron clientes.</li>`;
        return;
    }

    clientes.forEach(cliente => {
        const clienteItem = document.createElement("li");
        clienteItem.className = "list-group-item bg-dark text-white d-flex justify-content-between align-items-start";
        clienteItem.innerHTML = `
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
            <span class="badge bg-primary rounded-pill">Tipo ${cliente.id_tipo_cliente}</span>
        `;
        clienteList.appendChild(clienteItem);
    });
}