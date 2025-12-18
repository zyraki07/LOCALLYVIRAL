// Responsive hamburger on phone
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.querySelector(".nav-links");

  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
  });
});

// View Description Button
function toggleDescription(id, button) {
  const description = document.getElementById(`description-${id}`);
  if (!description) return;

  // Hide all other descriptions
  document.querySelectorAll('.business-description').forEach(desc => {
    if (desc !== description) {
      desc.classList.remove('open');
    }
  });

  // Reset all button texts to VIEW
  document.querySelectorAll('.view').forEach(btn => {
    btn.textContent = 'VIEW';
  });

  // Toggle the selected description
  const isOpen = !
    description.classList.contains('open');
  if (isOpen) {
    description.classList.add('open');
    button.textContent = "HIDE";
  } else {
    description.classList.remove('open');
    button.textContent = "VIEW";
  }
}

function openImage(src) {
  const popup = document.createElement("div");
  popup.id = "popup-container";
  popup.innerHTML = `<img src="${src}" alt="Business Image" style="
      max-width: 90vw;
      max-height: 90vh;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.7);
      object-fit: contain;
      transition: transform 0.3s ease;
      cursor: zoom-in;
  ">`;

  const img = popup.querySelector("img");
  let zoomed = false;

  img.onclick = (e) => {
    e.stopPropagation(); 
    zoomed = !zoomed;
    img.style.transform = zoomed ? "scale(2)" : "scale(1)";
    img.style.cursor = zoomed ? "zoom-out" : "zoom-in";
  };

  popup.style.display = "flex";
  popup.style.justifyContent = "center";
  popup.style.alignItems = "center";
  popup.style.position = "fixed";
  popup.style.inset = "0";
  popup.style.background = "rgba(0,0,0,0.8)";
  popup.style.zIndex = "9999";
  popup.style.cursor = "zoom-out"; 
  popup.onclick = () => popup.remove(); 

  document.body.appendChild(popup);
}




