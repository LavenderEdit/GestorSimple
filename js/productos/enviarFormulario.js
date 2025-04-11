import { buscarProductosPorFiltro } from "../productos/productosController.js";
import { renderizarProductos } from "../productos/renderizarProductos.js";

export function configurarFormulario() {
  $("#filtros-productos").on("submit", function (e) {
    e.preventDefault();

    const formData = $(this).serialize();

    buscarProductosPorFiltro(formData)
      .then(renderizarProductos)
      .catch((err) => {
        console.error("Error al obtener productos:", err);
        $(".list-group").html(`
                    <div class="list-group-item bg-dark text-danger border-secondary text-center">
                        <p class="mb-0">Hubo un error al buscar productos.</p>
                    </div>
                `);
      });
  });
}
