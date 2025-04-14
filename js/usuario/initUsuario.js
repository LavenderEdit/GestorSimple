import {
  getCompleteUsers,
  buscarUsuarioCompletoPorId,
} from "./UsuarioController.js";
import { renderItems } from "../api/renderItems.js";
import { usuarioLiTemplate } from "./renderTemplateUsuario.js?v=1";
import { initModalUsuario } from "./modalUsuario.js";

export function initUsuario() {
  initModalUsuario();

  const inputBuscar = document.getElementById("inputBuscarUsuario");
  const selectFiltro = document.getElementById("selectFiltroUsuario");

  if (!inputBuscar || !selectFiltro) {
    console.warn("Campos de búsqueda de usuario no encontrados en el DOM.");
    return;
  }

  async function cargarUsuarios() {
    const query = inputBuscar.value.trim();
    const filtro = selectFiltro.value;

    try {
      let usuarios;
      if (filtro === "todos" || query === "") {
        usuarios = await getCompleteUsers();
      } else if (filtro === "id") {
        usuarios = await buscarUsuarioCompletoPorId(query);
        if (!Array.isArray(usuarios)) {
          usuarios = [usuarios];
        }
      } else {
        usuarios = await getCompleteUsers();
      }

      renderItems({
        containerId: "lista-usuarios",
        data: Array.isArray(usuarios) ? usuarios : [],
        emptyMessage: "No se encontraron usuarios.",
        templateFn: usuarioLiTemplate,
      });
    } catch (error) {
      console.error("Error al cargar usuarios:", error);
      renderItems({
        containerId: "lista-usuarios",
        data: [],
        emptyMessage: "No se encontraron usuarios.",
        templateFn: usuarioLiTemplate,
      });
    }
  }

  inputBuscar.addEventListener("input", cargarUsuarios);
  selectFiltro.addEventListener("change", cargarUsuarios);

  cargarUsuarios();
}
