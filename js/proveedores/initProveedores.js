import {
  getTodosLosProveedores,
  obtenerProveedoresPorNomOId,
} from "./ProveedorController.js";
import { renderItems } from "../api/renderItems.js";
import { proveedorLiTemplate } from "./renderTemplateProveedores.js?v=1";
import { initModalProveedores } from "./modalProveedores.js?v=3";

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
        templateFn: proveedorLiTemplate,
      });
    })
    .catch(() => {
      console.error("Error al cargar todos los proveedores.");
      renderItems({
        containerId: "proveedorList",
        data: [],
        emptyMessage: "No se encontraron proveedores.",
        templateFn: proveedorLiTemplate,
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
            templateFn: proveedorLiTemplate,
          });
        })
        .catch(() => {
          renderItems({
            containerId: "proveedorList",
            data: [],
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorLiTemplate,
          });
        });
    } else if (query.length > 0 && (type === "nombre" || type === "id")) {
      obtenerProveedoresPorNomOId(query, type)
        .then((proveedores) => {
          renderItems({
            containerId: "proveedorList",
            data: proveedores,
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorLiTemplate,
          });
        })
        .catch(() => {
          renderItems({
            containerId: "proveedorList",
            data: [],
            emptyMessage: "No se encontraron proveedores.",
            templateFn: proveedorLiTemplate,
          });
        });
    } else {
      renderItems({
        containerId: "proveedorList",
        data: [],
        emptyMessage: "No se encontraron proveedores.",
        templateFn: proveedorLiTemplate,
      });
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  searchType.addEventListener("change", manejarBusqueda);
}
