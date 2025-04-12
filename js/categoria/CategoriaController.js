import { apiRequest } from "../api/apiRequest.js";

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
