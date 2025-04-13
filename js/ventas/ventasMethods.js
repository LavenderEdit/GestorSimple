export function getFechaHoyLocal() {
  const hoy = new Date();
  const year = hoy.getFullYear();
  const month = String(hoy.getMonth() + 1).padStart(2, "0");
  const day = String(hoy.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}

export function updateHeaderDate(selector) {
  const element = document.querySelector(selector);
  if (element) {
    const now = new Date();
    const options = {
      weekday: "long",
      day: "numeric",
      month: "long",
      year: "numeric",
    };
    element.textContent = now.toLocaleDateString("es-ES", options);
  }
}
