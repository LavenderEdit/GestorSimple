import { apiRequest } from "../api/apiRequest.js";

// 5 métodos CRUD para desarrollar a los proveedores
export async function guardarProveedor(formData) {
  try {
    const data = await apiRequest(
      "proveedores",
      "insertarProveedor",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarProveedor(formData) {
  try {
    const data = await apiRequest(
      "proveedores",
      "editarProveedor",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarProveedor(idProveedor) {
  try {
    const response = await apiRequest("proveedores", "deleteProveedor", "GET", {
      id: idProveedor,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar proveedor:", error);
    return { success: false, message: error.message };
  }
}

export async function getTodosLosProveedores() {
  try {
    const response = await apiRequest(
      "proveedores",
      "getProveedores",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer a los proveedores:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function getProveedorPorId(idProveedor) {
  try {
    const data = await apiRequest(
      "proveedores",
      "obtenerProveedorPorId",
      "GET",
      {
        id: idProveedor,
      }
    );
    return data;
  } catch (error) {
    console.error("Error en obtenerProveedorPorId:", error);
    throw error;
  }
}

// Métodos extra
export async function obtenerProveedoresPorNomOId(query, type) {
  try {
    const data = await apiRequest(
      "proveedores",
      "buscarProveedoresPorNomOId",
      "GET",
      { query, type }
    );
    return data;
  } catch (error) {
    console.error("Error en buscarProveedoresPorNomOId:", error);
    throw error;
  }
}

export async function obtenerProductosPorProveedorId(idProveedor) {
  try {
    const data = await apiRequest(
      "proveedores",
      "obtenerProductosPorProvId",
      "GET",
      { id: idProveedor }
    );
    return data;
  } catch (error) {
    console.error("Error en obtenerProductosPorProvId:", error);
    throw error;
  }
}
