document.addEventListener("DOMContentLoaded", () => {
    const formAgregarCliente = document.getElementById("formAgregarCliente");
  
    if (formAgregarCliente) {
      formAgregarCliente.addEventListener("submit", async (event) => {
        event.preventDefault(); // Evitar el envío tradicional del formulario
  
        const formData = new FormData(formAgregarCliente);
  
        // Depuración: Mostrar los datos que se están enviando
        for (let [key, value] of formData.entries()) {
          console.log(`${key}: ${value}`);
        }
  
        try {
          const response = await fetch("router.php?controller=clientes&action=guardar", {
            method: "POST",
            body: formData,
          });
  
          if (!response.ok) {
            throw new Error("Error al guardar el cliente.");
          }
  
          const data = await response.json();
  
          if (data.success) {
            console.log("Cliente guardado correctamente.");
            const modal = bootstrap.Modal.getInstance(
              document.getElementById("modalAgregarCliente")
            );
            modal.hide();
  
            formAgregarCliente.reset();
  
            // Actualizar el listado de clientes
            buscarClientes("", "todos")
              .done((clientes) => renderizarClientes(clientes))
              .fail(() => {
                console.error("Error al obtener todos los clientes.");
              });
          } else {
            console.error("Error al guardar el cliente:", data.message);
          }
        } catch (error) {
          console.error("Error:", error);
        }
      });
    }
  });