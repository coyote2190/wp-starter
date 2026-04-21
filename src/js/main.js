// Main JavaScript entry point
import "../css/app.css";
import AOS from "aos";
import "aos/dist/aos.css";

// ===== TÉMOIGNAGES : slider =====
document.addEventListener("DOMContentLoaded", function () {
  console.log("Bienvenue sur le Wordpress Starter !");
});

// Initialiser AOS
AOS.init({
  duration: 800,
  easing: "ease-in-out",
  once: true,
  offset: 100,
});
