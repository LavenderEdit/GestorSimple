import { apiRequest } from "../api/apiRequest.js";

export function buscarClientes(query, type) {
  return apiRequest("clientes", "getProveedores", "GET", { query, type });
}