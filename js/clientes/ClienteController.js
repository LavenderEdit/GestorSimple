import { apiRequest } from "../api/apiRequest.js";

export function buscarClientes(query, type) {
  return apiRequest("clientes", "buscar_clientes", "GET", { query, type });
}

export async function editarCliente(formData) {
  try {
    const data = await apiRequest(
      "clientes",
      "editarCliente",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

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

export async function guardarCliente(formData) {
  try {
    const data = await apiRequest(
      "clientes",
      "guardarCliente",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function getClientePorId(idCliente) {
  try {
    const data = await apiRequest("clientes", "obtenerClientePorId", "GET", {
      id: idCliente,
    });
    return data;
  } catch (error) {
    console.error("Error en getClientePorId:", error);
    throw error;
  }
}
