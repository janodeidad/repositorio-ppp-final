// script.js - comportamiento: carrusel simple, menú móvil y toggle claro/oscuro

document.addEventListener('DOMContentLoaded', () => {
  
  // Toggle claro/oscuro
  const darkToggle = document.getElementById('darkToggle');
  const body = document.body;
  // Mantener preferencia en localStorage
  const saved = localStorage.getItem('theme');
  if(saved === 'dark') body.classList.add('dark');
  darkToggle.addEventListener('click', () => {
    const isDark = body.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    darkToggle.setAttribute('aria-pressed', String(isDark));
  });

});