import {
  guardarProducto,
  editarProducto,
  eliminarProducto,
  buscarPorId,
  obtenerTodosLosProductos,
} from "./ProductoController.js?v=1";
import { getAllCategorias } from "../categoria/CategoriaController.js";
import { getTodosLosProveedores } from "../proveedores/ProveedorController.js";
import { renderOptions } from "../api/renderOptions.js";
import { renderItems } from "../api/renderItems.js";
import { categoriaOptionTemplate } from "../categoria/renderTemplateCategoria.js";
import { proveedorOptionTemplate } from "../proveedores/renderTemplateProveedores.js";
import { productoLiTemplate } from "./renderTemplateProductos.js?v=1";
import { initCalcularPrecioFinal } from "./productMethods.js";

export function initModalProductos() {
  const formAgregarProducto = document.getElementById("formAgregarProducto");
  const modalAgregarProducto = document.getElementById("modalAgregarProducto");

  if (!formAgregarProducto || !modalAgregarProducto) {
    console.warn(
      "El formulario o el modal de productos no se encontró en el DOM."
    );
    return;
  }

  // Manejo del envío del formulario para guardar o editar producto
  formAgregarProducto.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formAgregarProducto);

    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    try {
      let data;
      if (formData.get("id_producto")) {
        data = await editarProducto(formData);
      } else {
        data = await guardarProducto(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente.");
        const modalInstance = bootstrap.Modal.getInstance(modalAgregarProducto);
        if (modalInstance) {
          modalInstance.hide();
        }
        formAgregarProducto.reset();

        const productos = await obtenerTodosLosProductos();
        renderItems({
          containerId: "productoList",
          data: productos,
          emptyMessage: "No se encontraron productos.",
          templateFn: productoLiTemplate,
        });
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar producto:", error.message);
    }
  });

  document.addEventListener("click", async (event) => {
    // Edición de producto
    if (
      event.target.classList.contains("btn-editar-producto") ||
      event.target.closest(".btn-editar-producto")
    ) {
      const btn = event.target.closest(".btn-editar-producto");
      const idProducto = btn.getAttribute("data-id");

      try {
        const response = await buscarPorId(idProducto);
        const producto = Array.isArray(response) ? response[0] : response;

        // Rellenar el formulario con la data obtenida
        formAgregarProducto.querySelector('[name="id_producto"]').value =
          producto.id_producto;
        formAgregarProducto.querySelector('[name="nombre"]').value =
          producto.nombre;
        formAgregarProducto.querySelector('[name="precio"]').value =
          producto.precio;
        formAgregarProducto.querySelector('[name="stock"]').value =
          producto.stock;
        formAgregarProducto.querySelector('[name="ganancia"]').value =
          producto.ganancia;
        formAgregarProducto.querySelector('[name="precio_final"]').value =
          producto.precio_final;
        formAgregarProducto.querySelector('[name="id_categoria"]').value =
          producto.id_categoria;
        formAgregarProducto.querySelector('[name="id_proveedor"]').value =
          producto.id_proveedor;
        formAgregarProducto.querySelector('[name="descripcion"]').value =
          producto.descripcion;

        // Cambiar el título del modal para edición
        modalAgregarProducto.querySelector(".modal-title").textContent =
          "Editar Producto";

        // Mostrar el modal para edición
        const modalInstance = new bootstrap.Modal(modalAgregarProducto);
        modalInstance.show();
      } catch (error) {
        console.error("Error al cargar los datos del producto:", error);
      }
    }
    // Eliminación de producto
    else if (
      event.target.classList.contains("btn-eliminar-producto") ||
      event.target.closest(".btn-eliminar-producto")
    ) {
      const btn = event.target.closest(".btn-eliminar-producto");
      const idProducto = btn.getAttribute("data-id");
      if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        try {
          const result = await eliminarProducto(idProducto);
          if (result.success) {
            console.log("Producto eliminado correctamente.");
            const productos = await obtenerTodosLosProductos();
            renderItems({
              containerId: "productoList",
              data: productos,
              emptyMessage: "No se encontraron productos.",
              templateFn: productoLiTemplate,
            });
          } else {
            console.error("Error al eliminar producto:", result.message);
          }
        } catch (error) {
          console.error("Error al eliminar producto:", error.message);
        }
      }
    }
  });

  getAllCategorias()
    .then((categorias) => {
      renderOptions("categoriaProducto", categorias, categoriaOptionTemplate);
    })
    .catch((error) => console.error("Error al cargar categorías:", error));

  getTodosLosProveedores()
    .then((proveedores) => {
      renderOptions("proveedorProducto", proveedores, proveedorOptionTemplate);
    })
    .catch((error) => console.error("Error al cargar proveedores:", error));

  initCalcularPrecioFinal();
}
