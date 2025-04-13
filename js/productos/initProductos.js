import { getAllCategorias } from "../categoria/CategoriaController.js";
import { getTodosLosProveedores } from "../proveedores/ProveedorController.js";
import {
  obtenerProductosPorFiltro,
  obtenerTodosLosProductos,
} from "./ProductoController.js";
import { renderOptions } from "../api/renderOptions.js";
import { categoriaOptionTemplate } from "../categoria/renderTemplateCategoria.js";
import { proveedorOptionTemplate } from "../proveedores/renderTemplateProveedores.js";
import { renderItems } from "../api/renderItems.js";
import { productoLiTemplate } from "./renderTemplateProductos.js?v=1";
import { initModalProductos } from "./modalProductos.js?v=1";

export function initProductos() {
  initModalProductos();

  const searchInput = document.getElementById("filtro-nombre");
  const selectCategoria = document.getElementById("filtro-categoria");
  const selectProveedor = document.getElementById("filtro-proveedor");

  if (!searchInput || !selectCategoria || !selectProveedor) {
    console.warn("Campos de búsqueda no encontrados en el DOM.");
    return;
  }

  getAllCategorias()
    .then((categorias) => {
      renderOptions("filtro-categoria", categorias, categoriaOptionTemplate);
    })
    .catch((error) => console.error("Error al cargar categorías:", error));

  getTodosLosProveedores()
    .then((proveedores) => {
      renderOptions("filtro-proveedor", proveedores, proveedorOptionTemplate);
    })
    .catch((error) => console.error("Error al cargar proveedores:", error));

  const manejarBusqueda = async () => {
    const query = searchInput.value.trim();
    const categoria = selectCategoria.value;
    const proveedor = selectProveedor.value;

    try {
      let productos;
      if (query === "" && categoria === "" && proveedor === "") {
        productos = await obtenerTodosLosProductos();
      } else {
        productos = await obtenerProductosPorFiltro(
          query,
          categoria,
          proveedor
        );
      }
      renderItems({
        containerId: "productoList",
        data: productos,
        emptyMessage: "No se encontraron productos.",
        templateFn: productoLiTemplate,
      });
    } catch (error) {
      console.error("Error al buscar productos:", error);
      renderItems({
        containerId: "productoList",
        data: [],
        emptyMessage: "No se encontraron productos.",
        templateFn: productoLiTemplate,
      });
    }
  };

  searchInput.addEventListener("input", manejarBusqueda);
  selectCategoria.addEventListener("change", manejarBusqueda);
  selectProveedor.addEventListener("change", manejarBusqueda);

  manejarBusqueda();
}
