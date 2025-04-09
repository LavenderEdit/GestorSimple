export function togglePasswordVisibility() {
  const togglePasswordButton = document.querySelector(".toggle-password");
  const passwordField = togglePasswordButton.previousElementSibling;

  togglePasswordButton.addEventListener("click", function () {
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;

    const icon = type === "password" ? "fa-eye" : "fa-eye-slash";
    togglePasswordButton.innerHTML = `<i class="fas ${icon}"></i>`;
  });
}
