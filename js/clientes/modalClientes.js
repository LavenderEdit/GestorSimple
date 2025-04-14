import {
  guardarCliente,
  editarCliente,
  eliminarCliente,
  getClientePorId,
} from "./ClienteController.js";
import { actualizarListaClientes } from "./clienteMethods.js";

export function initModalClientes() {
  const formCliente = document.getElementById("formAgregarCliente");
  const modalCliente = document.getElementById("modalAgregarCliente");
  const listaClientes = document.getElementById("clienteList");
  const btnRegistrar = document.getElementById("btnRegistrarCliente");

  if (!formCliente || !modalCliente) {
    console.warn(
      "El formulario o el modal de clientes no se encontró en el DOM."
    );
    return;
  }

  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formCliente.reset();
      const hiddenId = formCliente.querySelector('[name="id_cliente"]');
      if (hiddenId) hiddenId.value = "";
      modalCliente.querySelector(".modal-title").textContent =
        "Registrar Cliente";
      const modalInstance = bootstrap.Modal.getOrCreateInstance(modalCliente);
      modalInstance.show();
    });
  }

  formCliente.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formCliente);
    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }
    try {
      let data;
      const idClienteValue = (formData.get("id_cliente") || "")
        .toString()
        .trim();
      if (idClienteValue !== "") {
        data = await editarCliente(formData);
      } else {
        data = await guardarCliente(formData);
      }
      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalCliente);
        modalInstance.hide();
        actualizarListaClientes();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar cliente:", error.message);
    }
  });

  if (listaClientes) {
    listaClientes.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-cliente");
      if (btnEditar) {
        event.stopPropagation();
        const idCliente = btnEditar.getAttribute("data-id");
        try {
          const response = await getClientePorId(idCliente);
          const cliente = Array.isArray(response) ? response[0] : response;
          if (!cliente) {
            console.error("No se encontró el cliente con el id:", idCliente);
            return;
          }
          const form = formCliente;
          form.querySelector('[name="id_cliente"]').value = cliente.id_cliente;
          form.querySelector('[name="num_identificacion"]').value =
            cliente.num_identificacion;
          form.querySelector('[name="nombre"]').value = cliente.nombre;
          form.querySelector('[name="telefono"]').value = cliente.telefono;
          form.querySelector('[name="email"]').value = cliente.email;
          form.querySelector('[name="direccion"]').value = cliente.direccion;
          form.querySelector('[name="id_tipo_cliente"]').value =
            cliente.id_tipo_cliente;

          modalCliente.querySelector(".modal-title").textContent =
            "Editar Cliente";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalCliente);
          modalInstance.show();
        } catch (error) {
          console.error("Error al cargar los datos del cliente:", error);
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-cliente");
      if (btnEliminar) {
        event.stopPropagation();
        const idCliente = btnEliminar.getAttribute("data-id");
        if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
          try {
            const result = await eliminarCliente(idCliente);
            if (result.success) {
              console.log("Cliente eliminado correctamente.");
              actualizarListaClientes();
            } else {
              console.error("Error al eliminar cliente:", result.message);
            }
          } catch (error) {
            console.error("Error al eliminar cliente:", error.message);
          }
        }
      }
    });
  }

  modalCliente.addEventListener("hidden.bs.modal", () => {
    formCliente.reset();
    modalCliente.querySelector(".modal-title").textContent =
      "Registrar Cliente";
  });
}
