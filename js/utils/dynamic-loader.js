import { updateHeaderDate } from "../ventas/ventas-date.js";
import { initBusquedaPorFecha } from "../ventas/fechaVentas.js?v=2";
import { initProductos } from "../productos/init.js";
import { initClientes } from "../clientes/initClientes.js?v=1";

const pageCallbacks = {
  ventas: () => {
    updateHeaderDate(".header-date");
    initBusquedaPorFecha();
  },
  productos: () => {
    initProductos();
  },
  clientes: () => {
    initClientes();
  },
  // Cualquier otra función de otra página que sea definida aquí
  //Ejm: dashboard: () => { ... },
};

export function loadPageContent(page) {
  let file = "";

  switch (page) {
    case "dashboard":
      file = "views/home/default.php";
      break;
    case "ventas":
      file = "views/ventas/ventas.php";
      break;
    case "clientes":
      file = "views/clientes/clientes.php";
      break;
    case "productos":
      file = "views/productos/productos.php";
      break;
    case "proveedores":
      file = "views/proveedores/proveedores.php";
      break;
    case "pagos":
      file = "views/pagos/pagos.php";
      break;
    case "categorias":
      file = "views/categorias/categorias.php";
      break;
    default:
      file = "views/error/404.php";
      break;
  }

  fetch(file)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.text();
    })
    .then((html) => {
      const content = document.getElementById("main-content");
      if (content) {
        content.innerHTML = html;
        if (pageCallbacks[page]) {
          pageCallbacks[page]();
        }
      }
    })
    .catch((err) => {
      console.error("Error al cargar contenido:", err);
      const content = document.getElementById("main-content");
      if (content) {
        content.innerHTML = `<div class="alert alert-danger">No se pudo cargar la página <strong>${page}</strong>.</div>`;
      }
    });
}
