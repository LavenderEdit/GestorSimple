import { buscarClientes } from "./buscarClientes.js";
import { renderizarClientes } from "./renderizarClientes.js";

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchType = document.getElementById("searchType");

    // Evento para realizar la búsqueda al escribir en el campo de búsqueda
    searchInput.addEventListener("input", function () {
        const query = searchInput.value.trim();
        const type = searchType.value;

        if (query.length > 0) {
            buscarClientes(query, type)
                .done(clientes => renderizarClientes(clientes))
                .fail(() => {
                    console.error("Error al buscar clientes.");
                });
        } else {
            renderizarClientes([]); // Limpiar la lista si no hay consulta
        }
    });
});