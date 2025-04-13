import { apiRequest } from "../api/apiRequest.js";

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idVenta) {
  try {
    const data = await apiRequest("ventas", "obtenerInfoModal", "GET", {
      id: idVenta,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function buscarVentasPorFecha(fecha) {
  try {
    const data = await apiRequest("ventas", "buscarPorFecha", "GET", {
      fecha: fecha,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}
