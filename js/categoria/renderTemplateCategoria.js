export function categoriaOptionTemplate(categoria) {
  return `<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
}
