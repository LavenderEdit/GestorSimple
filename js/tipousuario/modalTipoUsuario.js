import {
  guardarTipoUsuario,
  editarTipoUsuario,
  eliminarTipoUsuario,
  buscarPorId as buscarTipoUsuarioPorId,
} from "./TipoUsuarioController.js";
import { actualizarListaTiposUsuario } from "./tipousuarioMethods.js";

export function initModalTipoUsuario() {
  const formTipoUsuario = document.getElementById("formTipoUsuario");
  const modalTipoUsuario = document.getElementById("modalTipoUsuario");
  const listaTipoUsuario = document.getElementById("lista-tipousuario");
  const btnRegistrar = document.getElementById("btnRegistrarTipoUsuario");

  if (!formTipoUsuario || !modalTipoUsuario) {
    console.warn(
      "Formulario o modal de tipos de usuario no se encontró en el DOM."
    );
    return;
  }

  // Listener para el botón "Registrar Nueva"
  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formTipoUsuario.reset();
      const hiddenId = formTipoUsuario.querySelector(
        '[name="id_tipo_usuario"]'
      );
      if (hiddenId) hiddenId.value = "";
      modalTipoUsuario.querySelector(".modal-title").textContent =
        "Registrar Tipo de Usuario";
      const modalInstance =
        bootstrap.Modal.getOrCreateInstance(modalTipoUsuario);
      modalInstance.show();
    });
  }

  // Listener para el envío del formulario (guardar o editar)
  formTipoUsuario.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formTipoUsuario);
    const idTipoValue = (formData.get("id_tipo_usuario") || "")
      .toString()
      .trim();

    try {
      let data;
      if (idTipoValue !== "") {
        data = await editarTipoUsuario(formData);
      } else {
        data = await guardarTipoUsuario(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalTipoUsuario);
        modalInstance.hide();
        actualizarListaTiposUsuario();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar tipo de usuario:", error.message);
    }
  });

  // Delegación de eventos en la lista para editar y eliminar
  if (listaTipoUsuario) {
    listaTipoUsuario.addEventListener("click", async (event) => {
      // Edición
      const btnEditar = event.target.closest(".btn-editar-tipo-usuario");
      if (btnEditar) {
        event.stopPropagation();
        const idTipoUsuario = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarTipoUsuarioPorId(idTipoUsuario);
          const tipoUsuario = Array.isArray(response) ? response[0] : response;
          if (!tipoUsuario) {
            console.error(
              "No se encontró el tipo de usuario con el id:",
              idTipoUsuario
            );
            return;
          }
          formTipoUsuario.querySelector('[name="id_tipo_usuario"]').value =
            tipoUsuario.id_tipo_usuario;
          formTipoUsuario.querySelector('[name="nombre"]').value =
            tipoUsuario.nombre_tipo;
          formTipoUsuario.querySelector('[name="descripcion"]').value =
            tipoUsuario.descripcion;

          modalTipoUsuario.querySelector(".modal-title").textContent =
            "Editar Tipo de Usuario";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalTipoUsuario);
          modalInstance.show();
        } catch (error) {
          console.error(
            "Error al cargar los datos del tipo de usuario:",
            error
          );
        }
      }

      // Eliminación
      const btnEliminar = event.target.closest(".btn-eliminar-tipo-usuario");
      if (btnEliminar) {
        event.stopPropagation();
        const idTipoUsuario = btnEliminar.getAttribute("data-id");
        if (
          confirm("¿Estás seguro de que deseas eliminar este tipo de usuario?")
        ) {
          try {
            const result = await eliminarTipoUsuario(idTipoUsuario);
            if (result.success) {
              console.log("Tipo de usuario eliminado correctamente.");
              actualizarListaTiposUsuario();
            } else {
              console.error(
                "Error al eliminar tipo de usuario:",
                result.message
              );
            }
          } catch (error) {
            console.error("Error al eliminar tipo de usuario:", error.message);
          }
        }
      }
    });
  }

  // Al cerrar el modal, resetear el formulario y restablecer el título a "Registrar Tipo de Usuario"
  modalTipoUsuario.addEventListener("hidden.bs.modal", () => {
    formTipoUsuario.reset();
    modalTipoUsuario.querySelector(".modal-title").textContent =
      "Registrar Tipo de Usuario";
  });
}
