import { buscarClientes } from "./buscarClientes.js";
import { renderItems } from "../api/renderItems.js";
import { clientTemplate } from "./renderTemplateClientes.js";
import { guardarCliente } from "./guardarCliente.js";
import { editarCliente } from "./editarCliente.js";
import { getClientePorId } from "./infoCliente.js";

export function initModalClientes() {
  const formAgregarCliente = document.getElementById("formAgregarCliente");
  const modalAgregarCliente = document.getElementById("modalAgregarCliente");

  if (!formAgregarCliente) {
    console.warn("No se encontró el formulario de agregar cliente.");
    return;
  }

  formAgregarCliente.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(formAgregarCliente);

    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    try {
      let data;
      if (formData.get("id_cliente")) {
        data = await editarCliente(formData);
      } else {
        data = await guardarCliente(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente.");
        const modalInstance = bootstrap.Modal.getInstance(modalAgregarCliente);
        modalInstance.hide();

        formAgregarCliente.reset();

        buscarClientes("", "todos")
          .then((clientes) => {
            renderItems({
              containerId: "clienteList",
              data: clientes,
              emptyMessage: "No se encontraron clientes.",
              templateFn: clientTemplate,
            });
          })
          .catch(() => {
            console.error("Error al obtener todos los clientes.");
            renderItems({
              containerId: "clienteList",
              data: [],
              emptyMessage: "No se encontraron clientes.",
              templateFn: clientTemplate,
            });
          });
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error:", error.message);
    }
  });

  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-editar-cliente")) {
      const idCliente = event.target.getAttribute("data-id");

      try {
        const response = await getClientePorId(idCliente);
        const cliente = response[0];

        formAgregarCliente.querySelector('[name="id_cliente"]').value =
          cliente.id_cliente;
        formAgregarCliente.querySelector('[name="num_identificacion"]').value =
          cliente.num_identificacion;
        formAgregarCliente.querySelector('[name="nombre"]').value =
          cliente.nombre;
        formAgregarCliente.querySelector('[name="telefono"]').value =
          cliente.telefono;
        formAgregarCliente.querySelector('[name="email"]').value =
          cliente.email;
        formAgregarCliente.querySelector('[name="direccion"]').value =
          cliente.direccion;
        formAgregarCliente.querySelector('[name="id_tipo_cliente"]').value =
          cliente.id_tipo_cliente;

        modalAgregarCliente.querySelector(".modal-title").textContent =
          "Editar Cliente";
        const modalInstance = new bootstrap.Modal(modalAgregarCliente);
        modalInstance.show();
      } catch (error) {
        console.error("Error al cargar los datos del cliente:", error);
      }
    }
  });
}
