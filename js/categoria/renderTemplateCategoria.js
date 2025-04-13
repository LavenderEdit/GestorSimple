export function renderCategoriaTemplate(categoria) {
  return `
    <li 
      class="list-group-item list-group-item-action bg-dark border-secondary text-light d-flex justify-content-between align-items-center p-3"
      data-id="${categoria.id_categoria}"
    >
      <div>
        <div class="fw-bold text-info">${categoria.nombre}</div>
        <small class="text-white">${
          categoria.descripcion || "Sin descripción"
        }</small>
      </div>

      <div class="d-flex">
          <button class="btn btn-sm btn-editar-categoria me-2" data-id="${
            categoria.id_categoria
          }" style="background-color: #00A36C; color: white; border: none;">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-eliminar-categoria" data-id="${
            categoria.id_categoria
          }" style="background-color: #FF073A; color: white; border: none;">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
    </li>
  `;
}

export function categoriaOptionTemplate(categoria) {
  return `<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
}
