export function renderMetodoPagoTemplate(metodoPago) {
  return `
      <li 
        class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
        data-id="${metodoPago.id_metodo_pago}"
      >
        <div>
          <div class="fw-bold text-primary">${metodoPago.nombre_metodo}</div>
          <small class="text-white">${
            metodoPago.descripcion || "Sin descripción"
          }</small>
        </div>

        <div class="d-flex">
          <button class="btn btn-sm btn-editar-metodo-pago me-2" data-id="${
            metodoPago.id_metodo_pago
          }" style="background-color: #00A36C; color: white; border: none;">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-eliminar-metodo-pago" data-id="${
            metodoPago.id_metodo_pago
          }" style="background-color: #FF073A; color: white; border: none;">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
      </li>
    `;
}
