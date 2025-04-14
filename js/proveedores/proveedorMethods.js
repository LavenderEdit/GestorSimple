import { getTodosLosProveedores } from "./ProveedorController.js";
import { renderItems } from "../api/renderItems.js";
import { proveedorLiTemplate } from "./renderTemplateProveedores.js";

export async function actualizarListaProveedores() {
  try {
    const proveedores = await getTodosLosProveedores();
    renderItems({
      containerId: "proveedorList",
      data: Array.isArray(proveedores) ? proveedores : [],
      emptyMessage: "No se encontraron proveedores.",
      templateFn: proveedorLiTemplate,
    });
  } catch (error) {
    console.error("Error al actualizar la lista de proveedores:", error);
  }
}
