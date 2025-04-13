import { getAllMetodosPago } from "./MetodoPagoController.js";
import { renderItems } from "../api/renderItems.js";
import { renderMetodoPagoTemplate } from "./renderTemplateMetodoPago.js";

export async function actualizarListaMetodosPago() {
  const metodo_pago = await getAllMetodosPago();
  renderItems({
    containerId: "lista-metodopago",
    data: Array.isArray(metodo_pago) ? metodo_pago : [],
    emptyMessage: "No se encontraron métodos de pago.",
    templateFn: renderMetodoPagoTemplate,
  });
}
