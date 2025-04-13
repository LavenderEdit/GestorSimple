import { getAllTiposCliente } from "./TipoClienteController.js";
import { renderItems } from "../api/renderItems.js";
import { renderTipoClienteTemplate } from "./renderTemplateTipoCliente.js";

export async function actualizarListaTiposCliente() {
  const tipos_cliente = await getAllTiposCliente();
  renderItems({
    containerId: "lista-tipocliente",
    data: Array.isArray(tipos_cliente) ? tipos_cliente : [],
    emptyMessage: "No se encontraron tipos de cliente.",
    templateFn: renderTipoClienteTemplate,
  });
}
