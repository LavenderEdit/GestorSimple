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
