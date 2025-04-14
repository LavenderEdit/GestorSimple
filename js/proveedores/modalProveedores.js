import {
  guardarProveedor,
  editarProveedor,
  eliminarProveedor,
  getProveedorPorId as buscarProveedorPorId,
} from "./ProveedorController.js";
import { actualizarListaProveedores } from "./proveedorMethods.js";

export function initModalProveedores() {
  const formProveedor = document.getElementById("formAgregarProveedor");
  const modalProveedor = document.getElementById("modalAgregarProveedor");
  const listaProveedor = document.getElementById("proveedorList");
  const btnRegistrar = document.getElementById("btnRegistrarProveedor");

  if (!formProveedor || !modalProveedor) {
    console.warn("Formulario o modal de proveedores no se encontró en el DOM.");
    return;
  }

  // Listener para abrir el modal en modo 'Registrar Proveedor'
  if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
      formProveedor.reset();
      const hiddenId = formProveedor.querySelector('[name="id_proveedor"]');
      if (hiddenId) hiddenId.value = "";
      modalProveedor.querySelector(".modal-title").textContent =
        "Registrar Proveedor";
      const modalInstance = bootstrap.Modal.getOrCreateInstance(modalProveedor);
      modalInstance.show();
    });
  }

  // Listener para el envío del formulario (Registrar o Editar)
  formProveedor.addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(formProveedor);
    const idProveedorValue = (formData.get("id_proveedor") || "")
      .toString()
      .trim();

    try {
      let data;
      if (idProveedorValue !== "") {
        // Si existe un id, es edición
        data = await editarProveedor(formData);
      } else {
        // Si no existe, se crea un nuevo registro
        data = await guardarProveedor(formData);
      }

      if (data.success) {
        console.log("Operación realizada correctamente:", data.message);
        const modalInstance =
          bootstrap.Modal.getOrCreateInstance(modalProveedor);
        modalInstance.hide();
        // Actualizar la lista de proveedores tras la operación
        actualizarListaProveedores();
      } else {
        console.error("Error en la operación:", data.message);
      }
    } catch (error) {
      console.error("Error al guardar/editar proveedor:", error.message);
    }
  });

  // Delegación de eventos en la lista para editar y eliminar
  if (listaProveedor) {
    listaProveedor.addEventListener("click", async (event) => {
      // Manejar edición
      const btnEditar = event.target.closest(".btn-editar-proveedor");
      if (btnEditar) {
        event.stopPropagation();
        const idProveedor = btnEditar.getAttribute("data-id");
        try {
          const response = await buscarProveedorPorId(idProveedor);
          // Asumimos que la respuesta es un array; si no, ajústalo según tu lógica.
          const proveedor = Array.isArray(response) ? response[0] : response;
          if (!proveedor) {
            console.error("No se encontró el proveedor con id:", idProveedor);
            return;
          }
          // Rellenar el formulario con la data obtenida
          formProveedor.querySelector('[name="id_proveedor"]').value =
            proveedor.id_proveedor || "";
          formProveedor.querySelector('[name="nombre"]').value =
            proveedor.nombre || "";
          formProveedor.querySelector('[name="telefono"]').value =
            proveedor.telefono || "";
          formProveedor.querySelector('[name="email"]').value =
            proveedor.email || "";
          formProveedor.querySelector('[name="direccion"]').value =
            proveedor.direccion || "";

          modalProveedor.querySelector(".modal-title").textContent =
            "Editar Proveedor";
          const modalInstance =
            bootstrap.Modal.getOrCreateInstance(modalProveedor);
          modalInstance.show();
        } catch (error) {
          console.error("Error al obtener datos del proveedor:", error);
          alert("Error al cargar los datos del proveedor: " + error.message);
        }
      }

      // Manejar eliminación
      const btnEliminar = event.target.closest(".btn-eliminar-proveedor");
      if (btnEliminar) {
        event.stopPropagation();
        const idProveedor = btnEliminar.getAttribute("data-id");
        if (confirm("¿Estás seguro de que deseas eliminar este proveedor?")) {
          try {
            const result = await eliminarProveedor(idProveedor);
            if (result.success) {
              console.log("Proveedor eliminado correctamente.");
              actualizarListaProveedores();
            } else {
              console.error("Error al eliminar proveedor:", result.message);
            }
          } catch (error) {
            console.error("Error al eliminar proveedor:", error.message);
          }
        }
      }
    });
  }

  // Al cerrar el modal, se resetea el formulario y se restablece el título
  modalProveedor.addEventListener("hidden.bs.modal", () => {
    formProveedor.reset();
    modalProveedor.querySelector(".modal-title").textContent =
      "Registrar Proveedor";
  });
}
