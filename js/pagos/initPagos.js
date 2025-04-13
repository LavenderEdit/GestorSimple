import { buscarPagos } from "./buscarPagos.js";
import { renderizarPagos } from "./renderizarPagos.js";
import { initModalPagos } from './modalPagos.js';

export function initPagos() {
  const searchInput = document.getElementById("searchInput");
  const searchType = document.getElementById("searchType");

  if (!searchInput || !searchType) return;

  // Resetear el estado al entrar a la interfaz (para que el placeholder aparezca)
  sessionStorage.removeItem("filtroPagoEliminado");

  // Eliminar placeholder si ya se había seleccionado algo en esta sesión
  if (sessionStorage.getItem("filtroPagoEliminado") === "true" && searchType.options[0]?.value === "") {
    searchType.remove(0);
  }

  const manejarBusqueda = () => {
    // Eliminar placeholder al seleccionar una opción válida
    if (searchType.options[0]?.value === "" && searchType.selectedIndex !== 0) {
      searchType.remove(0);
      sessionStorage.setItem("filtroPagoEliminado", "true"); // Guardar solo para esta sesión
    }

    // Lógica de búsqueda
    const query = searchInput.value.trim();
    const type = searchType.value;
    if (query && type) {
      buscarPagos(query, type).done(renderizarPagos).fail(() => renderizarPagos([]));
    } else {
      renderizarPagos([]);
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
  initModalPagos();
}