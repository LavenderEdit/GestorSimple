import { apiRequest } from "../api/apiRequest.js";

export function buscarClientes(query, type) {
  return apiRequest("clientes", "buscar_clientes", "GET", { query, type });
}