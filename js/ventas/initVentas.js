import { buscarVentasPorFecha } from "./VentasController.js";
import { renderItems } from "../api/renderItems.js";
import { ventasLiTemplate } from "./renderTemplateVentas.js";
import { getFechaHoyLocal, updateHeaderDate } from "./ventasMethods.js";
import { initDatepicker } from "../utils/initDatePicker.js";
import { initModalVentas } from "./modalVentas.js";

export function initVentas() {
  initModalVentas();
  updateHeaderDate(".header-date");
  initDatepicker("#fechaBusqueda");

  const fechaInput = document.getElementById("fechaBusqueda");
  if (fechaInput) {
    fechaInput.value = getFechaHoyLocal();
  }

  async function cargarVentas(fecha) {
    try {
      const ventas = await buscarVentasPorFecha(fecha);
      const ventasConIndex = Array.isArray(ventas)
        ? ventas.map((venta, i) => ({ ...venta, index: i }))
        : [];
      renderItems({
        containerId: "ventas-list",
        data: ventasConIndex,
        emptyMessage: "No hay ventas para esta fecha.",
        templateFn: ventasLiTemplate,
      });
    } catch (error) {
      console.error("Error al cargar ventas:", error);
      renderItems({
        containerId: "ventas-list",
        data: [],
        emptyMessage: "No hay ventas para esta fecha.",
        templateFn: ventasLiTemplate,
      });
    }
  }

  cargarVentas(getFechaHoyLocal());

  if (fechaInput) {
    fechaInput.addEventListener("change", handleFechaChange);
    $(fechaInput).on("changeDate", handleFechaChange);
  }

  function handleFechaChange(event) {
    const nuevaFecha = event.target.value;
    const headerEl = document.querySelector(".header-date");
    if (headerEl) {
      const date = new Date(nuevaFecha + "T00:00");
      const options = {
        weekday: "long",
        day: "numeric",
        month: "long",
        year: "numeric",
      };
      headerEl.textContent = date.toLocaleDateString("es-ES", options);
    }
    cargarVentas(nuevaFecha);
  }
}
