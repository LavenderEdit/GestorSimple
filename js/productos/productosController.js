export function buscarProductosPorFiltro(filtros) {
  return $.ajax({
    url: "./controllers/ProductoController.php?action=buscar_por_filtro",
    method: "POST",
    data: filtros,
    dataType: "json",
  });
}
