import { apiRequest } from "../api/apiRequest.js";

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function getClientePorId(idCliente) {
  try {
    // Usamos GET y pasamos el id como parámetro adicional.
    const data = await apiRequest("clientes", "obtenerClientePorId", "GET", {
      id: idCliente,
    });
    return data;
  } catch (error) {
    console.error("Error en getClientePorId:", error);
    throw error;
  }
}
