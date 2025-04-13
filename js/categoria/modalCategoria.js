import {
  guardarCategoria,
  editarCategoria,
  eliminarCategoria,
  buscarPorId as buscarCategoriaPorId,
} from "./CategoriaController.js";
import { actualizarListaCategorias } from "./categoriaMethods.js";

export function initModalCategoria() {
  const formCategoria = document.getElementById("formCategoria");
  const modalCategoria = document.getElementById("modalCategoria");
  const listaCategoria = document.getElementById("lista-categoria");
  const btnRegistrar = document.getElementById("btnRegistrarCategoria");

  if (!formCategoria || !modalCategoria) {
    console.warn("Formulario o modal de categorías no se encontró en el DOM.");
    return;
  }

  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formCategoria.reset();
      const hiddenId = formCategoria.querySelector('[name="id_categoria"]');
      if (hiddenId) hiddenId.value = "";
      modalCategoria.querySelector(".modal-title").textContent =
        "Registrar Categoría";
      const modalInstance = bootstrap.Modal.getOrCreateInstance(modalCategoria);
      modalInstance.show();
    });
  }

  formCategoria.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formCategoria);

    const idCategoriaValue = (formData.get("id_categoria") || "")
      .toString()
      .trim();

    try {
      let data;
      if (idCategoriaValue !== "") {
        data = await editarCategoria(formData);
      } else {
        data = await guardarCategoria(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalCategoria);
        modalInstance.hide();
        actualizarListaCategorias();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar categoría:", error.message);
    }
  });

  if (listaCategoria) {
    listaCategoria.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-categoria");
      if (btnEditar) {
        event.stopPropagation();
        const idCategoria = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarCategoriaPorId(idCategoria);
          const categoria = Array.isArray(response) ? response[0] : response;
          if (!categoria) {
            console.error(
              "No se encontró la categoría con el id:",
              idCategoria
            );
            return;
          }
          formCategoria.querySelector('[name="id_categoria"]').value =
            categoria.id_categoria;
          formCategoria.querySelector('[name="nombre"]').value =
            categoria.nombre;
          formCategoria.querySelector('[name="descripcion"]').value =
            categoria.descripcion;

          modalCategoria.querySelector(".modal-title").textContent =
            "Editar Categoría";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalCategoria);
          modalInstance.show();
        } catch (error) {
          console.error("Error al cargar los datos de la categoría:", error);
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-categoria");
      if (btnEliminar) {
        event.stopPropagation();
        const idCategoria = btnEliminar.getAttribute("data-id");
        if (confirm("¿Estás seguro de que deseas eliminar esta categoría?")) {
          try {
            const result = await eliminarCategoria(idCategoria);
            if (result.success) {
              console.log("Categoría eliminada correctamente.");
              actualizarListaCategorias();
            } else {
              console.error("Error al eliminar categoría:", result.message);
            }
          } catch (error) {
            console.error("Error al eliminar categoría:", error.message);
          }
        }
      }
    });
  }

  modalCategoria.addEventListener("hidden.bs.modal", () => {
    formCategoria.reset();
    modalCategoria.querySelector(".modal-title").textContent =
      "Registrar Categoría";
  });
}
