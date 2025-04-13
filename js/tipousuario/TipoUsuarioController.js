import { apiRequest } from "../api/apiRequest.js";

export async function guardarTipoUsuario(formData) {
  try {
    const data = await apiRequest(
      "tipousuario",
      "storeTipoUsuario",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarTipoUsuario(formData) {
  try {
    const data = await apiRequest(
      "tipousuario",
      "updateTipoUsuario",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarTipoUsuario(idTipoUsuario) {
  try {
    const response = await apiRequest(
      "tipousuario",
      "deleteTipoUsuario",
      "GET",
      {
        id: idTipoUsuario,
      }
    );

    return response;
  } catch (error) {
    console.error("Error al eliminar el tipo de usuario:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idTipoUsuario) {
  try {
    const data = await apiRequest("tipousuario", "getTipoUsuarioById", "GET", {
      id: idTipoUsuario,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function getAllTiposUsuario() {
  try {
    const response = await apiRequest(
      "tipousuario",
      "getAllTiposUsuario",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer los tipos de usuario:", error);
    return { success: false, message: error.message };
  }
}
