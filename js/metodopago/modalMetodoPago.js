import {
  guardarMetodosPago,
  editarMetodosPago,
  eliminarMetodosPago,
  buscarPorId as buscarMetodoPagoPorId,
} from "./MetodoPagoController.js";
import { actualizarListaMetodosPago } from "./metodopagoMethods.js";

export function initModalMetodoPago() {
  const formMetodoPago = document.getElementById("formMetodoPago");
  const modalMetodoPago = document.getElementById("modalMetodoPago");
  const listaMetodoPago = document.getElementById("lista-metodopago");
  const btnRegistrar = document.getElementById("btnRegistrarMetodoPago");

  if (!formMetodoPago || !modalMetodoPago) {
    console.warn(
      "Formulario o modal de métodos de pago no se encontró en el DOM."
    );
    return;
  }

  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formMetodoPago.reset();
      const hiddenId = formMetodoPago.querySelector('[name="id_metodo_pago"]');
      if (hiddenId) hiddenId.value = "";
      modalMetodoPago.querySelector(".modal-title").textContent =
        "Registrar Método de Pago";
      const modalInstance =
        bootstrap.Modal.getOrCreateInstance(modalMetodoPago);
      modalInstance.show();
    });
  }

  formMetodoPago.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formMetodoPago);
    const idValue = (formData.get("id_metodo_pago") || "").toString().trim();

    try {
      let data;
      if (idValue !== "") {
        data = await editarMetodosPago(formData);
      } else {
        data = await guardarMetodosPago(formData);
      }

      if (data.success) {
        console.log("Operación exitosa:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalMetodoPago);
        modalInstance.hide();
        actualizarListaMetodosPago();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar método de pago:", error.message);
    }
  });

  if (listaMetodoPago) {
    listaMetodoPago.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-metodo-pago");
      if (btnEditar) {
        event.stopPropagation();
        const idMetodoPago = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarMetodoPagoPorId(idMetodoPago);
          const metodoPago = Array.isArray(response) ? response[0] : response;

          if (!metodoPago) {
            console.error(
              "No se encontró el método de pago con ID:",
              idMetodoPago
            );
            return;
          }

          formMetodoPago.querySelector('[name="id_metodo_pago"]').value =
            metodoPago.id_metodo_pago;
          formMetodoPago.querySelector('[name="nombre"]').value =
            metodoPago.nombre_metodo;
          formMetodoPago.querySelector('[name="descripcion"]').value =
            metodoPago.descripcion;

          modalMetodoPago.querySelector(".modal-title").textContent =
            "Editar Método de Pago";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalMetodoPago);
          modalInstance.show();
        } catch (error) {
          console.error("Error al cargar el método de pago:", error);
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-metodo-pago");
      if (btnEliminar) {
        event.stopPropagation();
        const idMetodoPago = btnEliminar.getAttribute("data-id");
        if (
          confirm("¿Estás seguro de que deseas eliminar este método de pago?")
        ) {
          try {
            const result = await eliminarMetodosPago(idMetodoPago);
            if (result.success) {
              console.log("Método de pago eliminado correctamente.");
              actualizarListaMetodosPago();
            } else {
              console.error(
                "Error al eliminar método de pago:",
                result.message
              );
            }
          } catch (error) {
            console.error("Error al eliminar método de pago:", error.message);
          }
        }
      }
    });
  }

  modalMetodoPago.addEventListener("hidden.bs.modal", () => {
    formMetodoPago.reset();
    modalMetodoPago.querySelector(".modal-title").textContent =
      "Registrar Método de Pago";
  });
}
