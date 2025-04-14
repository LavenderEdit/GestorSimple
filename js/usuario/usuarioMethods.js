import { getCompleteUsers } from "./UsuarioController.js";
import { renderItems } from "../api/renderItems.js";
import { usuarioLiTemplate } from "./renderTemplateUsuario.js?v=1";

export async function actualizarListaUsuarios() {
  try {
    const usuarios = await getCompleteUsers();
    renderItems({
      containerId: "lista-usuarios",
      data: Array.isArray(usuarios) ? usuarios : [],
      emptyMessage: "No se encontraron usuarios.",
      templateFn: usuarioLiTemplate,
    });
  } catch (error) {
    console.error("Error al actualizar la lista de usuarios:", error);
  }
}
