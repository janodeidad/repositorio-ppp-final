// Cuando la página termina de cargar, se ejecuta este código
document.addEventListener("DOMContentLoaded", function() {

  // Pide al archivo PHP la lista de trayectos
  fetch('./php/obtener_trayectos.php')
    .then(response => response.json())   // Convierte la respuesta en JSON
    .then(data => {

        // Busca el contenedor donde se van a mostrar las tarjetas
        let contenedor = document.getElementById("contenedorTrayectos");

        // Recorre cada trayecto recibido
        data.forEach(t => {

            // Crea una tarjeta con la imagen del trayecto
            let card = `
              <div class="card">
                  <img src="./img/${t.imagen}" width="120px">
              </div>
            `;

            // Agrega la tarjeta al contenedor
            contenedor.innerHTML += card;
        });
    })
    // Si hay un error, lo muestra en la consola
    .catch(err => console.error("Error cargando trayectos:", err));
});