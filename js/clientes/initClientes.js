import { buscarClientes } from "./buscarClientes.js";
import { renderizarClientes } from "./renderizarClientes.js";

export function initClientes() {
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
      // Si el tipo es "todos", obtener todos los clientes
      buscarClientes("", "todos")
        .done((clientes) => renderizarClientes(clientes))
        .fail(() => {
          console.error("Error al obtener todos los clientes.");
          renderizarClientes([]);
        });
    } else if (query.length > 0 && type !== "") {
      // Si hay un query y un tipo de búsqueda, realizar la búsqueda
      buscarClientes(query, type)
        .done((clientes) => renderizarClientes(clientes))
        .fail(() => {
          console.error("Error al buscar clientes.");
          renderizarClientes([]);
        });
    } else {
      renderizarClientes([]); // Limpiar la lista si no hay consulta
    }
  };

  // Agregar eventos para búsqueda interactiva
  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
}