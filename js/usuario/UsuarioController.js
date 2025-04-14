import { apiRequest } from "../api/apiRequest.js";

export async function editarUsuario(formData) {
  try {
    const data = await apiRequest("usuario", "updateUsuario", "POST", formData);
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarUsuario(idUsuario) {
  try {
    const response = await apiRequest("usuario", "deleteUsuario", "GET", {
      id: idUsuario,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar el usuario:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idUsuario) {
  try {
    const data = await apiRequest("usuario", "getUsuarioById", "GET", {
      id: idUsuario,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarUsuarioCompletoPorId(idUsuario) {
  try {
    const data = await apiRequest("usuario", "getCompleteUserById", "GET", {
      id: idUsuario,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function getCompleteUsers() {
  try {
    const response = await apiRequest(
      "usuario",
      "getUsuariosCompleto",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer los usuarios:", error);
    return { success: false, message: error.message };
  }
}

export async function getAllUsuarios() {
  try {
    const response = await apiRequest("usuario", "getUsuarios", "GET", null);

    return response;
  } catch (error) {
    console.error("Error al traer los usuarios:", error);
    return { success: false, message: error.message };
  }
}
