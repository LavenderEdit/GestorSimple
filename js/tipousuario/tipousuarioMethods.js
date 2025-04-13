import { getAllTiposUsuario } from "./TipoUsuarioController.js";
import { renderItems } from "../api/renderItems.js";
import { renderTipoUsuarioTemplate } from "./renderTemplateTipoUsuario.js";

export async function actualizarListaTiposUsuario() {
  const tipos_usuario = await getAllTiposUsuario();
  renderItems({
    containerId: "lista-tipousuario",
    data: Array.isArray(tipos_usuario) ? tipos_usuario : [],
    emptyMessage: "No se encontraron tipos de usuario.",
    templateFn: renderTipoUsuarioTemplate,
  });
}
