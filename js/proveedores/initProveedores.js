import {
  getTodosLosProveedores,
  obtenerProveedoresPorNomOId,
} from "./ProveedorController.js";
import { renderItems } from "../api/renderItems.js";
import { proveedorTemplate } from "./renderTemplateProveedores.js";
import { initModalProveedores } from "./modalProveedores.js?v=1";

export function initProveedores() {
  initModalProveedores();

  const searchInput = document.getElementById("searchInputProveedor");
  const searchType = document.getElementById("searchTypeProveedor");

  if (!searchInput || !searchType) {
    console.warn("Campos de búsqueda no encontrados en el DOM.");
    return;
  }

  getTodosLosProveedores()
    .then((proveedores) => {
      renderItems({
        containerId: "proveedorList",
        data: proveedores,
        emptyMessage: "No se encontraron proveedores.",
        templateFn: proveedorTemplate,
      });
    })
    .catch(() => {
      console.error("Error al cargar todos los proveedores.");
      renderItems({
        containerId: "proveedorList",
        data: [],
        emptyMessage: "No se encontraron proveedores.",
        templateFn: proveedorTemplate,
      });
    });

  const manejarBusqueda = () => {
    const query = searchInput.value.trim();
    const type = searchType.value;

    if (type === "todos") {
      getTodosLosProveedores()
        .then((proveedores) => {
          renderItems({
            containerId: "proveedorList",
            data: proveedores,
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorTemplate,
          });
        })
        .catch(() => {
          renderItems({
            containerId: "proveedorList",
            data: [],
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorTemplate,
          });
        });
    } else if (query.length > 0 && (type === "nombre" || type === "id")) {
      obtenerProveedoresPorNomOId(query, type)
        .then((proveedores) => {
          renderItems({
            containerId: "proveedorList",
            data: proveedores,
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorTemplate,
          });
        })
        .catch(() => {
          renderItems({
            containerId: "proveedorList",
            data: [],
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorTemplate,
          });
        });
    } else {
      renderItems({
        containerId: "proveedorList",
        data: [],
        emptyMessage: "No se encontraron proveedores.",
        templateFn: proveedorTemplate,
      });
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
}
