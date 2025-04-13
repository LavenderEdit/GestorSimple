import { getAllTiposUsuario, buscarPorId } from "./TipoUsuarioController.js";
import { renderItems } from "../api/renderItems.js";
import { renderTipoUsuarioTemplate } from "./renderTemplateTipoUsuario.js";
import { initModalTipoUsuario } from "./modalTipoUsuario.js";

export function initTipoUsuario() {
  initModalTipoUsuario();
  const inputBuscar = document.getElementById("inputBuscarTipoUsuario");
  const selectFiltro = document.getElementById("selectFiltroTipoUsuario");

  if (!inputBuscar || !selectFiltro) {
    console.warn(
      "Campos de búsqueda para tipo de usuario no se encontraron en el DOM."
    );
    return;
  }

  async function cargarTiposUsuario() {
    const query = inputBuscar.value.trim();
    const filtro = selectFiltro.value;
    try {
      let tiposUsuario;
      if (query === "" || filtro === "todos") {
        tiposUsuario = await getAllTiposUsuario();
      } else {
        if (filtro === "id") {
          tiposUsuario = await buscarPorId(query);
          if (tiposUsuario && !Array.isArray(tiposUsuario)) {
            tiposUsuario = [tiposUsuario];
          }
        } else {
          tiposUsuario = await getAllTiposUsuario();
        }
      }

      renderItems({
        containerId: "lista-tipousuario",
        data: Array.isArray(tiposUsuario) ? tiposUsuario : [],
        emptyMessage: "No se encontraron tipos de usuario.",
        templateFn: renderTipoUsuarioTemplate,
      });
    } catch (error) {
      console.error("Error al cargar los tipos de usuario:", error);
      renderItems({
        containerId: "lista-tipousuario",
        data: [],
        emptyMessage: "No se encontraron tipos de usuario.",
        templateFn: renderTipoUsuarioTemplate,
      });
    }
  }

  inputBuscar.addEventListener("input", cargarTiposUsuario);
  selectFiltro.addEventListener("change", cargarTiposUsuario);

  cargarTiposUsuario();
}
