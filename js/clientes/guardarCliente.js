export async function guardarCliente(formData) {
  try {
    const response = await fetch(
      "/GestorSimple/router.php?controller=clientes&action=guardarCliente",
      {
        method: "POST",
        body: formData,
      }
    );

    if (!response.ok) {
      throw new Error("Error al guardar el cliente.");
    }

    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}
