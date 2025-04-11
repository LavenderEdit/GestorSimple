import { apiRequest } from "../api/apiRequest.js";

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
