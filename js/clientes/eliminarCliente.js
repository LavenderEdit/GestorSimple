import { apiRequest } from "../api/apiRequest.js";

export async function eliminarCliente(idCliente) {
  try {
    const response = await apiRequest("clientes", "deletearCliente", "GET", {
      id: idCliente,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar cliente:", error);
    return { success: false, message: error.message };
  }
}
