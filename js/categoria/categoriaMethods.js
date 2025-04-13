import { getAllCategorias } from "./CategoriaController.js";
import { renderItems } from "../api/renderItems.js";
import { renderCategoriaTemplate } from "./renderTemplateCategoria.js";

export async function actualizarListaCategorias() {
  const categorias = await getAllCategorias();
  renderItems({
    containerId: "lista-categoria",
    data: Array.isArray(categorias) ? categorias : [],
    emptyMessage: "No se encontraron categorías.",
    templateFn: renderCategoriaTemplate,
  });
}
