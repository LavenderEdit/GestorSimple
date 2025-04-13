import { apiRequest } from "../api/apiRequest.js";

export async function guardarMetodosPago(formData) {
  try {
    const data = await apiRequest(
      "metodopago",
      "storeMetodoPago",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarMetodosPago(formData) {
  try {
    const data = await apiRequest(
      "metodopago",
      "updateMetodoPago",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarMetodosPago(idMetodoPago) {
  try {
    const response = await apiRequest("metodopago", "deleteMetodoPago", "GET", {
      id: idMetodoPago,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar el método de pago:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idMetodoPago) {
  try {
    const data = await apiRequest("metodopago", "getMetodoPagoById", "GET", {
      id: idMetodoPago,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function getAllMetodosPago() {
  try {
    const response = await apiRequest(
      "metodopago",
      "getAllMetodosDePago",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer los métodos de pago:", error);
    return { success: false, message: error.message };
  }
}
