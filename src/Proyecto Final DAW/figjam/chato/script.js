document.addEventListener("DOMContentLoaded", function () {
  const menuIcon = document.getElementById("menu-icon");
  const navDropdown = document.getElementById("nav-dropdown");

  menuIcon.addEventListener("click", () => {
      navDropdown.classList.toggle("active");
  });
});
