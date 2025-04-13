import { buscarPorId } from "./VentasController.js";

export function initModalVentas() {
  const ventasList = document.getElementById("ventas-list");
  if (!ventasList) {
    console.error("No se encontró el contenedor de ventas (#ventas-list).");
    return;
  }

  ventasList.addEventListener("click", async (event) => {
    const li = event.target.closest("li[data-id]");
    if (!li) return;

    const idVenta = li.getAttribute("data-id");
    console.log("Cargando datos para venta con ID:", idVenta);

    try {
      const response = await buscarPorId(idVenta);
      const venta = Array.isArray(response) ? response[0] : response;
      if (!venta) {
        console.error("No se recibió información de la venta.");
        return;
      }

      const modalLabel = document.getElementById("comprobanteModalLabel");
      if (modalLabel) {
        modalLabel.textContent = `Datos de la Venta (VENTA #${venta.id_venta})`;
      }

      const headerDiv = document.querySelector(
        "#comprobanteModal .modal-body .text-center.mb-3"
      );
      if (headerDiv) {
        headerDiv.innerHTML = `
          <h6 class="fw-bold mb-1">VENTA #${venta.id_venta}</h6>
          <h4 class="text-success">S/ ${parseFloat(venta.total).toFixed(2)}</h4>
        `;
      }

      const cardBody = document.querySelector(
        "#comprobanteModal .modal-body .card.bg-secondary .card-body"
      );
      if (cardBody) {
        cardBody.innerHTML = `
          <p class="mb-1">
            <strong>CLIENTE:</strong> ${venta.nombre_cliente || "N/A"}
          </p>
          <p class="mb-1">
            <strong>USUARIO:</strong> ${venta.nombre_usuario || "N/A"}<br>
            <strong>Fecha de Emisión:</strong> ${venta.fecha || "N/A"}
          </p>
        `;
      }

      const modalElement = document.getElementById("comprobanteModal");
      const modalInstance = new bootstrap.Modal(modalElement);
      modalInstance.show();
    } catch (error) {
      console.error("Error al cargar la información de la venta:", error);
    }
  });
}
