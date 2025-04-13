import { getAllTiposCliente, buscarPorId } from "./TipoClienteController.js";
import { renderItems } from "../api/renderItems.js";
import { renderTipoClienteTemplate } from "./renderTemplateTipoCliente.js?v=1";
import { initModalTipoCliente } from "./modalTipoCliente.js";

export function initTipoCliente() {
  initModalTipoCliente();

  const inputBuscar = document.getElementById("inputBuscarTipoCliente");
  const selectFiltro = document.getElementById("selectFiltroTipoCliente");

  if (!inputBuscar || !selectFiltro) {
    console.warn(
      "Campos de búsqueda de tipos de cliente no se encontraron en el DOM."
    );
    return;
  }

  async function cargarTiposCliente() {
    const query = inputBuscar.value.trim();
    const filtro = selectFiltro.value;
    try {
      let tiposCliente;
      if (query === "" || filtro === "todos") {
        tiposCliente = await getAllTiposCliente();
      } else {
        if (filtro === "id") {
          tiposCliente = await buscarPorId(query);
          if (tiposCliente && !Array.isArray(tiposCliente)) {
            tiposCliente = [tiposCliente];
          }
        } else {
          tiposCliente = await getAllTiposCliente();
        }
      }

      renderItems({
        containerId: "lista-tipocliente",
        data: Array.isArray(tiposCliente) ? tiposCliente : [],
        emptyMessage: "No se encontraron tipos de cliente.",
        templateFn: renderTipoClienteTemplate,
      });
    } catch (error) {
      console.error("Error al cargar los tipos de cliente:", error);
      renderItems({
        containerId: "lista-tipocliente",
        data: [],
        emptyMessage: "No se encontraron tipos de cliente.",
        templateFn: renderTipoClienteTemplate,
      });
    }
  }

  inputBuscar.addEventListener("input", cargarTiposCliente);
  selectFiltro.addEventListener("change", cargarTiposCliente);

  cargarTiposCliente();
}
