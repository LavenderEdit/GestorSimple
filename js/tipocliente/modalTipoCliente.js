import {
  guardarTipoCliente,
  editarTipoCliente,
  eliminarTipoCliente,
  buscarPorId as buscarTipoClientePorId,
} from "./TipoClienteController.js";
import { actualizarListaTiposCliente } from "./tipoclienteMethods.js";

export function initModalTipoCliente() {
  const formTipoCliente = document.getElementById("formTipoCliente");
  const modalTipoCliente = document.getElementById("modalTipoCliente");
  const listaTipoCliente = document.getElementById("lista-tipocliente");
  const btnRegistrar = document.getElementById("btnRegistrarTipoCliente");

  if (!formTipoCliente || !modalTipoCliente) {
    console.warn(
      "Formulario o modal de Tipos de Cliente no se encontró en el DOM."
    );
    return;
  }

  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formTipoCliente.reset();
      const hiddenId = formTipoCliente.querySelector(
        '[name="id_tipo_cliente"]'
      );
      if (hiddenId) hiddenId.value = "";
      modalTipoCliente.querySelector(".modal-title").textContent =
        "Registrar Tipo de Cliente";
      const modalInstance =
        bootstrap.Modal.getOrCreateInstance(modalTipoCliente);
      modalInstance.show();
    });
  }

  formTipoCliente.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formTipoCliente);
    const idTipoValue = (formData.get("id_tipo_cliente") || "")
      .toString()
      .trim();

    try {
      let data;
      if (idTipoValue !== "") {
        data = await editarTipoCliente(formData);
      } else {
        data = await guardarTipoCliente(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalTipoCliente);
        modalInstance.hide();
        actualizarListaTiposCliente();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar Tipo de Cliente:", error.message);
    }
  });

  if (listaTipoCliente) {
    listaTipoCliente.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-tipo-cliente");
      if (btnEditar) {
        event.stopPropagation();
        const idTipoCliente = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarTipoClientePorId(idTipoCliente);
          const tipoCliente = Array.isArray(response) ? response[0] : response;
          if (!tipoCliente) {
            console.error(
              "No se encontró el tipo de cliente con el id:",
              idTipoCliente
            );
            return;
          }
          formTipoCliente.querySelector('[name="id_tipo_cliente"]').value =
            tipoCliente.id_tipo_cliente;
          formTipoCliente.querySelector('[name="nombre"]').value =
            tipoCliente.nombre_tipo;
          formTipoCliente.querySelector('[name="descripcion"]').value =
            tipoCliente.descripcion;

          modalTipoCliente.querySelector(".modal-title").textContent =
            "Editar Tipo de Cliente";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalTipoCliente);
          modalInstance.show();
        } catch (error) {
          console.error(
            "Error al cargar los datos del tipo de cliente:",
            error
          );
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-tipo-cliente");
      if (btnEliminar) {
        event.stopPropagation();
        const idTipoCliente = btnEliminar.getAttribute("data-id");
        if (
          confirm("¿Estás seguro de que deseas eliminar este tipo de cliente?")
        ) {
          try {
            const result = await eliminarTipoCliente(idTipoCliente);
            if (result.success) {
              console.log("Tipo de cliente eliminado correctamente.");
              actualizarListaTiposCliente();
            } else {
              console.error(
                "Error al eliminar tipo de cliente:",
                result.message
              );
            }
          } catch (error) {
            console.error("Error al eliminar tipo de cliente:", error.message);
          }
        }
      }
    });
  }

  modalTipoCliente.addEventListener("hidden.bs.modal", () => {
    formTipoCliente.reset();
    modalTipoCliente.querySelector(".modal-title").textContent =
      "Registrar Tipo de Cliente";
  });
}
