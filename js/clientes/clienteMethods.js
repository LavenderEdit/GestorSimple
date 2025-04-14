import { getAllClientes } from "./ClienteController.js?v=1";
import { renderItems } from "../api/renderItems.js";
import { clientTemplate } from "./renderTemplateClientes.js";

export async function actualizarListaClientes() {
  try {
    const clientes = await getAllClientes();
    renderItems({
      containerId: "clienteList",
      data: Array.isArray(clientes) ? clientes : [],
      emptyMessage: "No se encontraron clientes.",
      templateFn: clientTemplate,
    });
  } catch (error) {
    console.error("Error al actualizar la lista de clientes:", error);
  }
}
