import { buscarClientes } from "./buscarClientes.js";
import { renderizarClientes } from "./renderizarClientes.js";
import { guardarCliente } from "./guardarCliente.js";

export function initModalClientes() {
  const formAgregarCliente = document.getElementById("formAgregarCliente");
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
      const data = await guardarCliente(formData);

      if (data.success) {
        console.log("Cliente guardado correctamente.");
        const modalElement = document.getElementById("modalAgregarCliente");
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();

        formAgregarCliente.reset();

        buscarClientes("", "todos")
          .done((clientes) => renderizarClientes(clientes))
          .fail(() => {
            console.error("Error al obtener todos los clientes.");
          });
      } else {
        console.error("Error al guardar el cliente:", data.message);
      }
    } catch (error) {
      console.error("Error:", error.message);
    }
  });
}
