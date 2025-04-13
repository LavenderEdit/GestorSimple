import { initVentas } from "../ventas/initVentas.js";
import { initProductos } from "../productos/initProductos.js?v=2";
import { initClientes } from "../clientes/initClientes.js?v=4";
import { initProveedores } from "../proveedores/initProveedores.js?v=2";
import { initCategoria } from "../categoria/initCategoria.js";
import { initTipoCliente } from "../tipocliente/initTipoCliente.js";
import { initTipoUsuario } from "../tipousuario/initTipoUsuario.js";
import { initMetodoPago } from "../metodopago/initMetodoPago.js";
import { initPagos } from "../pagos/initPagos.js";

const pageCallbacks = {
  ventas: () => {
    initVentas();
  },
  productos: () => {
    initProductos();
  },
  clientes: () => {
    initClientes();
  },
  proveedores: () => {
    initProveedores();
  },
  categorias: () => {
    initCategoria();
  },
  tipos_usuario: () => {
    initTipoUsuario();
  },
  tipos_cliente: () => {
    initTipoCliente();
  },
  metodos_pago: () => {
    initMetodoPago();
  },
  pagos: () => {
    initPagos();
  },
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
    case "tipos_usuario":
      file = "views/tipousuario/tipousuario.php";
      break;
    case "tipos_cliente":
      file = "views/tipocliente/tipocliente.php";
      break;
    case "metodos_pago":
      file = "views/metodopago/metodopago.php";
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
