import { getAllCategorias, buscarPorId } from "./CategoriaController.js";
import { renderItems } from "../api/renderItems.js";
import { renderCategoriaTemplate } from "./renderTemplateCategoria.js";
import { initModalCategoria } from "./modalCategoria.js";

export function initCategoria() {
  initModalCategoria();

  const inputBuscar = document.getElementById("inputBuscarCategoria");
  const selectFiltro = document.getElementById("selectFiltroCategoria");

  if (!inputBuscar || !selectFiltro) {
    console.warn("Campos de búsqueda de categorías no encontrados en el DOM.");
    return;
  }

  async function cargarCategorias() {
    const query = inputBuscar.value.trim();
    const filtro = selectFiltro.value;
    try {
      let categorias;
      if (query === "") {
        categorias = await getAllCategorias();
      } else {
        if (filtro === "id") {
          categorias = await buscarPorId(query);
        } else {
          categorias = await getAllCategorias();
        }
      }

      renderItems({
        containerId: "lista-categoria",
        data: Array.isArray(categorias) ? categorias : [],
        emptyMessage: "No se encontraron categorías.",
        templateFn: renderCategoriaTemplate,
      });
    } catch (error) {
      console.error("Error al cargar categorías:", error);
      renderItems({
        containerId: "lista-categoria",
        data: [],
        emptyMessage: "No se encontraron categorías.",
        templateFn: renderCategoriaTemplate,
      });
    }
  }

  inputBuscar.addEventListener("input", cargarCategorias);
  selectFiltro.addEventListener("change", cargarCategorias);

  cargarCategorias();
}
