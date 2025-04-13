import { apiRequest } from "../api/apiRequest.js";

// 4 métodos CRUD para desarrollar a los productos
export async function guardarProducto(formData) {
  try {
    const data = await apiRequest(
      "productos",
      "insertarProducto",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function editarProducto(formData) {
  try {
    const data = await apiRequest(
      "productos",
      "editarProducto",
      "POST",
      formData
    );
    return data;
  } catch (error) {
    throw error;
  }
}

export async function eliminarProducto(idProducto) {
  try {
    const response = await apiRequest("productos", "eliminarProducto", "GET", {
      id: idProducto,
    });

    return response;
  } catch (error) {
    console.error("Error al eliminar producto:", error);
    return { success: false, message: error.message };
  }
}

/**
 * @param {number|string}
 * @returns {Promise<Object>}
 */
export async function buscarPorId(idProducto) {
  try {
    const data = await apiRequest("productos", "buscarPorId", "GET", {
      id: idProducto,
    });
    return data;
  } catch (error) {
    console.error("Error en buscarPorId:", error);
    throw error;
  }
}

// Métodos Extra
export async function obtenerProductosPorFiltro(query, categoria, proveedor) {
  try {
    const data = await apiRequest("productos", "buscarFiltro", "GET", {
      "filtro-nombre": query,
      "filtro-categoria": categoria,
      "filtro-proveedor": proveedor,
    });
    return data;
  } catch (error) {
    console.error("Error en obtenerProductosPorFiltro:", error);
    throw error;
  }
}

export async function obtenerTodosLosProductos() {
  try {
    const response = await apiRequest(
      "productos",
      "obtenerListaProductos",
      "GET",
      null
    );

    return response;
  } catch (error) {
    console.error("Error al traer los productos:", error);
    return { success: false, message: error.message };
  }
}
