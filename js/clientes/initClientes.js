import { buscarClientes } from "./ClienteController.js";
import { renderItems } from "../api/renderItems.js";
import { clientTemplate } from "./renderTemplateClientes.js";
import { initModalClientes } from "./modalClientes.js?v=2";

export function initClientes() {
  initModalClientes();

  const searchInput = document.getElementById("searchInput");
  const searchType = document.getElementById("searchType");

  if (!searchInput || !searchType) {
    console.warn("Campos de búsqueda no encontrados en el DOM.");
    return;
  }

  const manejarBusqueda = () => {
    const query = searchInput.value.trim();
    const type = searchType.value;

    if (type === "todos") {
      buscarClientes("", "todos")
        .then((clientes) => {
          renderItems({
            containerId: "clienteList",
            data: clientes,
            emptyMessage: "No se encontraron clientes.",
            templateFn: clientTemplate,
          });
        })
        .catch(() => {
          console.error("Error al obtener todos los clientes.");
          renderItems({
            containerId: "clienteList",
            data: [],
            emptyMessage: "No se encontraron clientes.",
            templateFn: clientTemplate,
          });
        });
    } else if (query.length > 0 && type !== "") {
      buscarClientes(query, type)
        .then((clientes) => {
          renderItems({
            containerId: "clienteList",
            data: clientes,
            emptyMessage: "No se encontraron clientes.",
            templateFn: clientTemplate,
          });
        })
        .catch(() => {
          console.error("Error al buscar clientes.");
          renderItems({
            containerId: "clienteList",
            data: [],
            emptyMessage: "No se encontraron clientes.",
            templateFn: clientTemplate,
          });
        });
    } else {
      renderItems({
        containerId: "clienteList",
        data: [],
        emptyMessage: "No se encontraron clientes.",
        templateFn: clientTemplate,
      });
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
}
