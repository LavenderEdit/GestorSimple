import { renderItems } from "../api/renderItems.js";
import { proveedorLiTemplate } from "./renderTemplateProveedores.js";
import {
  guardarProveedor,
  editarProveedor,
  getProveedorPorId,
  eliminarProveedor,
  getTodosLosProveedores,
} from "./ProveedorController.js";

export function initModalProveedores() {
  const formAgregarProveedor = document.getElementById("formAgregarProveedor");
  const modalAgregarProveedor = document.getElementById(
    "modalAgregarProveedor"
  );

  if (!formAgregarProveedor) {
    console.warn("No se encontró el formulario de agregar proveedor.");
    return;
  }

  formAgregarProveedor.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(formAgregarProveedor);
    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    try {
      let response;
      if (formData.get("id_proveedor")) {
        response = await editarProveedor(formData);
      } else {
        response = await guardarProveedor(formData);
      }

      if (response.success) {
        console.log("Proveedor guardado correctamente.");
        const modalInstance = bootstrap.Modal.getInstance(
          modalAgregarProveedor
        );
        modalInstance.hide();
        formAgregarProveedor.reset();

        const proveedores = await getTodosLosProveedores();
        renderItems({
          containerId: "proveedorList",
          data: proveedores,
          emptyMessage: "No se encontraron proveedores.",
          templateFn: proveedorLiTemplate,
        });
      } else {
        console.error("Error en operación:", response.message);
      }
    } catch (error) {
      console.error("Error al guardar proveedor:", error.message);
    }
  });

  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-editar-proveedor")) {
      const idProveedor = event.target.getAttribute("data-id");

      try {
        const response = await getProveedorPorId(idProveedor);
        const proveedor = response[0];

        const form = formAgregarProveedor;
        form.querySelector('[name="id_proveedor"]').value =
          proveedor.id_proveedor || "";
        form.querySelector('[name="nombre"]').value = proveedor.nombre || "";
        form.querySelector('[name="telefono"]').value =
          proveedor.telefono || "";
        form.querySelector('[name="email"]').value = proveedor.email || "";
        form.querySelector('[name="direccion"]').value =
          proveedor.direccion || "";

        modalAgregarProveedor.querySelector(".modal-title").textContent =
          "Editar Proveedor";

        const modalInstance = bootstrap.Modal.getOrCreateInstance(
          modalAgregarProveedor
        );
        modalInstance.show();
      } catch (error) {
        console.error("Error al obtener datos del proveedor:", error);
        alert("Error al cargar los datos del proveedor: " + error.message);
      }
    }

    if (event.target.classList.contains("btn-eliminar-proveedor")) {
      const idProveedor = event.target.getAttribute("data-id");

      if (confirm("¿Estás seguro de que deseas eliminar este proveedor?")) {
        try {
          const result = await eliminarProveedor(idProveedor);

          if (result.success) {
            console.log("Proveedor eliminado correctamente.");
            const proveedores = await getTodosLosProveedores();
            renderItems({
              containerId: "proveedorList",
              data: proveedores,
              emptyMessage: "No se encontraron proveedores.",
              templateFn: proveedorLiTemplate,
            });
          } else {
            console.error("Error al eliminar proveedor:", result.message);
          }
        } catch (error) {
          console.error("Error al eliminar proveedor:", error.message);
        }
      }
    }
  });
  modalAgregarProveedor.addEventListener("hidden.bs.modal", () => {
    formAgregarProveedor.reset();
    formAgregarProveedor.querySelector('[name="id_cliente"]').value = "";
    modalAgregarProveedor.querySelector(".modal-title").textContent =
      "Agregar Proveedor";
  });
}
