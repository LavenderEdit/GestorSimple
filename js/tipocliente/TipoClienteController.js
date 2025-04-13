import { apiRequest } from "../api/apiRequest.js";

export async function guardarTipoCliente(formData) {
  try {
    const data = await apiRequest(
      "tipocliente",
      "storeTipoCliente",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarTipoCliente(formData) {
  try {
    const data = await apiRequest(
      "tipocliente",
      "updateTipoCliente",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarTipoCliente(idTipoCliente) {
  try {
    const response = await apiRequest(
      "tipocliente",
      "deleteTipoCliente",
      "GET",
      {
        id: idTipoCliente,
      }
    );

    return response;
  } catch (error) {
    console.error("Error al eliminar el tipo de cliente:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idTipoCliente) {
  try {
    const data = await apiRequest("tipocliente", "getTipoClienteById", "GET", {
      id: idTipoCliente,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function getAllTiposCliente() {
  try {
    const response = await apiRequest(
      "tipocliente",
      "getAllTiposCliente",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer los tipos de cliente:", error);
    return { success: false, message: error.message };
  }
}
