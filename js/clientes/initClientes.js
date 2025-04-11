import { buscarClientes } from "./buscarClientes.js";
import { renderizarClientes } from "./renderizarClientes.js";
import { initModalClientes } from "./modalClientes.js";

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
        .done((clientes) => renderizarClientes(clientes))
        .fail(() => {
          console.error("Error al obtener todos los clientes.");
          renderizarClientes([]);
        });
    } else if (query.length > 0 && type !== "") {
      buscarClientes(query, type)
        .done((clientes) => renderizarClientes(clientes))
        .fail(() => {
          console.error("Error al buscar clientes.");
          renderizarClientes([]);
        });
    } else {
      renderizarClientes([]);
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
}
