import { obtenerTodosLosProductos } from "./ProductoController.js";
import { renderItems } from "../api/renderItems.js";
import { productoLiTemplate } from "./renderTemplateProductos.js?v=1";

export function initCalcularPrecioFinal() {
  const precioInput = document.getElementById("precioProducto");
  const gananciaInput = document.getElementById("gananciaProducto");
  const precioFinalInput = document.getElementById("precioFinalProducto");

  if (!precioInput || !gananciaInput || !precioFinalInput) {
    console.warn(
      "Campos para calcular el precio final no se encontraron en el DOM."
    );
    return;
  }

  const calcularPrecioFinal = () => {
    const precio = parseFloat(precioInput.value) || 0;
    let gananciaValor = parseFloat(gananciaInput.value) || 0;

    if (gananciaValor >= 1) {
      gananciaValor = gananciaValor / 100;
    }

    const precioFinal = precio + precio * gananciaValor;
    precioFinalInput.value = precioFinal.toFixed(2);
  };

  precioInput.addEventListener("input", calcularPrecioFinal);
  gananciaInput.addEventListener("input", calcularPrecioFinal);
}

export async function actualizarListaProductos() {
  try {
    const productos = await obtenerTodosLosProductos();
    renderItems({
      containerId: "productoList",
      data: Array.isArray(productos) ? productos : [],
      emptyMessage: "No se encontraron productos.",
      templateFn: productoLiTemplate,
    });
  } catch (error) {
    console.error("Error al actualizar la lista de productos:", error);
  }
}
