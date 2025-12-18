document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.querySelector(".nav-links");
  const adLinks = document.querySelector(".admin_link");

  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    adLinks.classList.toggle("active");
  });
});