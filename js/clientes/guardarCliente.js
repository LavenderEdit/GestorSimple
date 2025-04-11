import { apiRequest } from "../api/apiRequest.js";

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
