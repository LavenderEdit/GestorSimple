import { sidebarConfig } from "./sidebar-config.js";
import { loadPageContent } from "../utils/dynamic-loader.js?v=17";

export function initSidebar() {
  const { sidebarId, contentClass, sidebarWidth } = sidebarConfig;
  const sidebar = document.getElementById(sidebarId);
  const content = document.querySelector(`.${contentClass}`);

  if (!sidebar || !content) {
    console.error("Elementos del sidebar no encontrados");
    return;
  }

  const adjustLayout = () => {
    const isExpanded = !sidebar.classList.contains("collapse");
    content.style.marginLeft = isExpanded ? `${sidebarWidth}px` : "0";
  };

  sidebar.addEventListener("hidden.bs.collapse", adjustLayout);
  sidebar.addEventListener("shown.bs.collapse", adjustLayout);

  adjustLayout();

  // ----------------------------------------------------------------
  // Agregar funcionalidad para la carga dinámica de contenido
  // ----------------------------------------------------------------
  const sidebarLinks = sidebar.querySelectorAll("[data-page]");

  sidebarLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const page = this.getAttribute("data-page");

      loadPageContent(page);

      sidebarLinks.forEach((l) => l.classList.remove("active", "bg-primary"));
      this.classList.add("active", "bg-primary");
    });
  });

  loadPageContent("dashboard");
}
