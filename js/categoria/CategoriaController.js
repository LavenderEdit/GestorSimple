import { apiRequest } from "../api/apiRequest.js";

export async function guardarCategoria(formData) {
  try {
    const data = await apiRequest(
      "categoria",
      "storeCategoria",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarCategoria(formData) {
  try {
    const data = await apiRequest(
      "categoria",
      "updateCategoria",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarCategoria(idCategoria) {
  try {
    const response = await apiRequest("categoria", "deleteCategoria", "GET", {
      id: idCategoria,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar la categoria:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idCategoria) {
  try {
    const data = await apiRequest("categoria", "getCategoriaById", "GET", {
      id: idCategoria,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

export async function getAllCategorias() {
  try {
    const response = await apiRequest(
      "categoria",
      "getCategorias",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer las categorias:", error);
    return { success: false, message: error.message };
  }
}
