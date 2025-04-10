import { pintarVentas } from "./renderVentas.js?v=1";

export function initBusquedaPorFecha() {
  $("#buscar-fecha-btn").on("click", function () {
    const fecha = $("#fecha-busqueda").val();
    if (!fecha) return alert("Selecciona una fecha");

    $.post(
      "/GestorSimple/controllers/VentaController.php?action=buscar_por_fecha",
      { fecha },
      function (ventas) {
        pintarVentas(ventas);
      },
      "json"
    );
  });

  $(document).ready(function () {
    const hoy = getFechaHoyLocal();
    $("#fecha-busqueda").val(hoy);
    $("#buscar-fecha-btn").trigger("click");
  });
}

function getFechaHoyLocal() {
  const hoy = new Date();
  const year = hoy.getFullYear();
  const month = String(hoy.getMonth() + 1).padStart(2, "0");
  const day = String(hoy.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}
