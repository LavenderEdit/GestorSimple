import { getAllMetodosPago, buscarPorId } from "./MetodoPagoController.js";
import { renderItems } from "../api/renderItems.js";
import { renderMetodoPagoTemplate } from "./renderTemplateMetodoPago.js";
import { initModalMetodoPago } from "./modalMetodoPago.js";

export function initMetodoPago() {
  initModalMetodoPago();
  const inputBuscar = document.getElementById("inputBuscarMetodoPago");
  const selectFiltro = document.getElementById("selectFiltroMetodoPago");

  if (!inputBuscar || !selectFiltro) {
    console.warn(
      "Campos de búsqueda para métodos de pago no se encontraron en el DOM."
    );
    return;
  }

  async function cargarMetodosPago() {
    const query = inputBuscar.value.trim();
    const filtro = selectFiltro.value;

    try {
      let metodosPago;
      if (query === "" || filtro === "todos") {
        metodosPago = await getAllMetodosPago();
      } else {
        if (filtro === "id") {
          metodosPago = await buscarPorId(query);
          if (metodosPago && !Array.isArray(metodosPago)) {
            metodosPago = [metodosPago];
          }
        } else {
          metodosPago = await getAllMetodosPago();
        }
      }

      renderItems({
        containerId: "lista-metodopago",
        data: Array.isArray(metodosPago) ? metodosPago : [],
        emptyMessage: "No se encontraron métodos de pago.",
        templateFn: renderMetodoPagoTemplate,
      });
    } catch (error) {
      console.error("Error al cargar los métodos de pago:", error);
      renderItems({
        containerId: "lista-metodopago",
        data: [],
        emptyMessage: "No se encontraron métodos de pago.",
        templateFn: renderMetodoPagoTemplate,
      });
    }
  }

  inputBuscar.addEventListener("input", cargarMetodosPago);
  selectFiltro.addEventListener("change", cargarMetodosPago);

  cargarMetodosPago();
}
