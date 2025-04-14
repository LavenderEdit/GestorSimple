import {
  guardarProducto,
  editarProducto,
  eliminarProducto,
  buscarPorId,
} from "./ProductoController.js?v=1";
import { getAllCategorias } from "../categoria/CategoriaController.js";
import { getTodosLosProveedores } from "../proveedores/ProveedorController.js";
import { renderOptions } from "../api/renderOptions.js";
import { categoriaOptionTemplate } from "../categoria/renderTemplateCategoria.js";
import { proveedorOptionTemplate } from "../proveedores/renderTemplateProveedores.js";
import {
  initCalcularPrecioFinal,
  actualizarListaProductos,
} from "./productMethods.js?v=1";

export function initModalProductos() {
  const formProducto = document.getElementById("formAgregarProducto");
  const modalProducto = document.getElementById("modalAgregarProducto");
  const btnRegistrar = document.getElementById("btnRegistrarProducto");
  const listaProducto = document.getElementById("productoList");

  if (!formProducto || !modalProducto) {
    console.warn(
      "El formulario o el modal de productos no se encontró en el DOM."
    );
    return;
  }

  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formProducto.reset();
      const hiddenId = formProducto.querySelector('[name="id_producto"]');
      if (hiddenId) hiddenId.value = "";
      modalProducto.querySelector(".modal-title").textContent =
        "Registrar Producto";
      const modalInstance = bootstrap.Modal.getOrCreateInstance(modalProducto);
      modalInstance.show();

      getAllCategorias()
        .then((categorias) => {
          renderOptions(
            "categoriaProducto",
            categorias,
            categoriaOptionTemplate
          );
        })
        .catch((error) => console.error("Error al cargar categorías:", error));

      getTodosLosProveedores()
        .then((proveedores) => {
          renderOptions(
            "proveedorProducto",
            proveedores,
            proveedorOptionTemplate
          );
        })
        .catch((error) => console.error("Error al cargar proveedores:", error));

      initCalcularPrecioFinal();
    });
  }

  formProducto.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formProducto);
    const idProductoValue = (formData.get("id_producto") || "")
      .toString()
      .trim();

    try {
      let data;
      if (idProductoValue !== "") {
        data = await editarProducto(formData);
      } else {
        data = await guardarProducto(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalProducto);
        modalInstance.hide();
        formProducto.reset();
        actualizarListaProductos();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar producto:", error.message);
    }
  });

  if (listaProducto) {
    listaProducto.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-producto");
      if (btnEditar) {
        event.stopPropagation();
        const idProducto = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarPorId(idProducto);
          const producto = Array.isArray(response) ? response[0] : response;
          if (!producto) {
            console.error("No se encontró el producto con id:", idProducto);
            return;
          }
          formProducto.querySelector('[name="id_producto"]').value =
            producto.id_producto;
          formProducto.querySelector('[name="nombre"]').value = producto.nombre;
          formProducto.querySelector('[name="precio"]').value = producto.precio;
          formProducto.querySelector('[name="stock"]').value = producto.stock;
          formProducto.querySelector('[name="ganancia"]').value =
            producto.ganancia;
          formProducto.querySelector('[name="precio_final"]').value =
            producto.precio_final;
          formProducto.querySelector('[name="id_categoria"]').value =
            producto.id_categoria;
          formProducto.querySelector('[name="id_proveedor"]').value =
            producto.id_proveedor;
          formProducto.querySelector('[name="descripcion"]').value =
            producto.descripcion;

          modalProducto.querySelector(".modal-title").textContent =
            "Editar Producto";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalProducto);
          modalInstance.show();
        } catch (error) {
          console.error("Error al cargar los datos del producto:", error);
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-producto");
      if (btnEliminar) {
        event.stopPropagation();
        const idProducto = btnEliminar.getAttribute("data-id");
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
          try {
            const result = await eliminarProducto(idProducto);
            if (result.success) {
              console.log("Producto eliminado correctamente.");
              actualizarListaProductos();
            } else {
              console.error("Error al eliminar producto:", result.message);
            }
          } catch (error) {
            console.error("Error al eliminar producto:", error.message);
          }
        }
      }
    });
  }

  modalProducto.addEventListener("hidden.bs.modal", () => {
    formProducto.reset();
    modalProducto.querySelector(".modal-title").textContent =
      "Registrar Producto";
  });

  initCalcularPrecioFinal();
}
