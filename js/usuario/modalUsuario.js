import {
  editarUsuario,
  eliminarUsuario,
  buscarPorId as buscarUsuarioPorId,
} from "./UsuarioController.js";
import { actualizarListaUsuarios } from "./usuarioMethods.js";
import { getAllTiposUsuario } from "../tipousuario/TipoUsuarioController.js";
import { renderOptions } from "../api/renderOptions.js";

export function initModalUsuario() {
  const formUsuario = document.getElementById("formUsuario");
  const modalUsuario = document.getElementById("modalUsuario");
  const listaUsuarios = document.getElementById("lista-usuarios");

  if (!formUsuario || !modalUsuario) {
    console.warn(
      "El formulario o el modal de usuario no se encontró en el DOM."
    );
    return;
  }

  formUsuario.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formUsuario);
    const idUsuarioValue = (formData.get("id_usuario") || "").toString().trim();

    try {
      let data;
      if (idUsuarioValue !== "") {
        data = await editarUsuario(formData);
      } else {
        console.error("No se encontró ID de usuario; solo se permite edición.");
        return;
      }
      if (data.success) {
        console.log("Usuario actualizado correctamente:", data.message);
        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalUsuario);
        modalInstance.hide();
        actualizarListaUsuarios();
      } else {
        console.error("Error al actualizar usuario:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar usuario:", error.message);
    }
  });

  if (listaUsuarios) {
    listaUsuarios.addEventListener("click", async (event) => {
      const btnEditar = event.target.closest(".btn-editar-usuario");
      if (btnEditar) {
        event.stopPropagation();
        const idUsuario = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarUsuarioPorId(idUsuario);
          const usuario = Array.isArray(response) ? response[0] : response;
          if (!usuario) {
            console.error("No se encontró el usuario con id:", idUsuario);
            return;
          }
          formUsuario.querySelector('[name="id_usuario"]').value =
            usuario.id_usuario;
          formUsuario.querySelector('[name="nombre"]').value = usuario.nombre;
          formUsuario.querySelector('[name="correo"]').value = usuario.correo;
          formUsuario.querySelector('[name="contrasenia"]').value =
            usuario.contrasenia;
          formUsuario.querySelector('[name="id_tipo_usuario"]').value =
            usuario.tipo_id_usuario;

          modalUsuario.querySelector(".modal-title").textContent =
            "Editar Usuario";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalUsuario);
          modalInstance.show();
        } catch (error) {
          console.error("Error al cargar los datos del usuario:", error);
        }
      }

      const btnEliminar = event.target.closest(".btn-eliminar-usuario");
      if (btnEliminar) {
        event.stopPropagation();
        const idUsuario = btnEliminar.getAttribute("data-id");
        if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
          try {
            const result = await eliminarUsuario(idUsuario);
            if (result.success) {
              console.log("Usuario eliminado correctamente.");
              actualizarListaUsuarios();
            } else {
              console.error("Error al eliminar usuario:", result.message);
            }
          } catch (error) {
            console.error("Error al eliminar usuario:", error.message);
          }
        }
      }
    });
  }

  modalUsuario.addEventListener("hidden.bs.modal", () => {
    formUsuario.reset();
    modalUsuario.querySelector(".modal-title").textContent = "Editar Usuario";
  });

  const selectTipoUsuario = formUsuario.querySelector(
    '[name="id_tipo_usuario"]'
  );
  if (selectTipoUsuario) {
    getAllTiposUsuario()
      .then((tipos) => {
        renderOptions("tipo_usuario", tipos, (tipo) => {
          return `<option value="${tipo.id_tipo_usuario}">${tipo.nombre_tipo}</option>`;
        });
      })
      .catch((error) =>
        console.error("Error al cargar tipos de usuario:", error)
      );
  }
}
