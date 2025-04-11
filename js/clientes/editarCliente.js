export async function editarCliente(formData) {
    try {
      const response = await fetch(
        "/GestorSimple/router.php?controller=clientes&action=editarCliente",
        {
          method: "POST",
          body: formData,
        }
      );
  
      if (!response.ok) {
        throw new Error("Error al editar el cliente.");
      }
  
      const data = await response.json();
      return data;
    } catch (error) {
      throw error;
    }
  }