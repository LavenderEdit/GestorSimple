export function renderCategoriaTemplate(categoria) {
  return `
    <li 
      class="list-group-item list-group-item-action bg-warning-subtle border-warning-subtle text-dark d-flex justify-content-between align-items-center p-3"
      data-id="${categoria.id_categoria}"
    >
      <div>
        <!-- CAMBIO: Título a 'text-warning-emphasis' -->
        <div class="fw-bold text-warning-emphasis">${categoria.nombre}</div>
        <!-- CAMBIO: Descripción a 'text-muted' -->
        <small class="text-muted">${
          categoria.descripcion || "Sin descripción"
        }</small>
      </div>

      <!-- CAMBIO: Botones a clases de Bootstrap (outline-warning y outline-danger) y 'gap-2' -->
      <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-warning btn-editar-categoria" data-id="${
            categoria.id_categoria
          }">
            <i class="fa-solid fa-pencil"></i> Editar
          </button>
          <button class="btn btn-sm btn-outline-danger btn-eliminar-categoria" data-id="${
            categoria.id_categoria
          }">
            <i class="fa-solid fa-trash"></i> Eliminar
          </button>
        </div>
    </li>
  `;
}

export function categoriaOptionTemplate(categoria) {
  return `<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
}
