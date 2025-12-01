<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>CFP - Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/claro_oscuro.css" />
</head>

<body class="light">
  <!-- Top bar -->
  <header class="topbar">
    <div class="topbar-left">
      <div class="logo">CFP<span class="small">61</span></div>
    </div>

    <nav class="nav-main" aria-label="Navegación principal">

      <ul class="nav-links" id="navLinks">
        <li><a href="#proyectos">Trayectos</a></li>
        <li><a href="#contacto">Contacto</a></li>
        <li><a href="#mapa">Ubicacion</a></li>
      </ul>
    </nav>

    <div class="">
      <div class="actions">
        <button id="darkToggle" aria-pressed="false">Claro / Oscuro</button>
      </div>
    </div>
  </header>

  <!-- carrusel-->


  <section id="sobremi" class="py-5">
    <div class="container color">
      <div class="row align-items-center text-center text-md-start">
        <div class="col-md-4 mb-3 mb-md-0">
          <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./img/informacion.jpeg" alt="..." width="400px">
              </div>

              <div class="carousel-item">
                <img src="./img/cfp.jpeg" alt="..." width="440px">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-md-8 text-center">
          <h2>El Centro de Formación Profesional N° 61</h2>
          <p>El Centro de Formación Profesional N° 61 en La Criolla, Entre Ríos, es una institución educativa que ofrece
            cursos de formación profesional y capacitación laboral para una rápida inserción en el mercado
            socioproductivo local y regional. La institución se destaca por su oferta gratuita y con validez nacional, y
            ofrece capacitaciones en diversas áreas, incluyendo Construcción de muebles de placas de madera.</p>

        </div>
      </div>

    </div>
  </section>

  <hr class="my-4">
 <div class="project-grid" id="contenedorTrayectos"></div>

<br>
  <p>

    Amplia oferta educativa: cursos de oficios y trayectos de formación profesional en áreas como electricidad,
    construcción, estética, gastronomía, informática, artesanías, diseño gráfico, entre otros.
    <br>
    Las inscripciones para cursos se realizan con sistema online (preinscripción) y también de forma presencial en
    determinados períodos.
    <br>
    El CFP 61 también se involucra en proyectos comunitarios, colaboraciones con el barrio, ferias, talleres prácticos
    que conectan formación profesional con contexto social.
  </p>
  <h2 class="text-center mb-3 ">
    <a href="php/lista_trayectos.php" class="btn btn-primary" style="background-color: rgb(118, 187, 248);">cargar
      trayectos</a>
   
  <hr class="my-4">

  
</form>
  <!-- formalario-->

  <div class="container-fluid" id="contacto">
    <div class="row">
      <div class="col-sm-6">
        <form class="p-4 rounded shadow" id="formulario" method="POST" action="./php/insertar_registros.php">
          <h1>Contacto</h1>
          <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">correo</label>
            <input type="email" class="form-control" name="correo" id="email" required>
          </div>

          <div class="mb-3">
            <label for="tel" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" name="telefono" id="tel" required>
          </div>

          <div class="mb-3">
            <label for="msg" class="form-label">Mensaje</label>
            <textarea class="form-control" name="mensaje" id="msg" rows="4"></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm" id="parrafo">
            <h2>Direccion</h2>
            <p style="font-size: 20px;">Rio Bermejo 278, La Criolla, Argentina</p>
            <h2>Telefono</h2>
            <p style="font-size: 20px;">15-412-3356</p>
            <h2>Correo</h2>
            <p style="font-size: 20px;">cfplacriolla@gmail.com</p>
            <h2>Facebook</h2>
            <p style="font-size: 20px;">cfp24oficial</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.176902593833!2d-58.10936102512565!3d-31.271201589246594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95adecb04d7457bd%3A0x98aa53d46aa8cd3f!2sR%C3%ADo%20Bermejo%2C%20La%20Criolla%2C%20Entre%20R%C3%ADos!5e0!3m2!1ses-419!2sar!4v1763381882175!5m2!1ses-419!2sar"
              width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div><br>

  <!-- mapa -->
  <div class="container">
    <div class="row align-items-center text-center text-md-start">
      <div class="col-md-8">
      </div>
    </div>
  </div>

  <footer class="foot" id="mapa">
    <small>© CFP - ejemplo</small>

  </footer>

  <script src="./js/scrips.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

<script>

// Espera a que todo el HTML haya cargado antes de ejecutar el código
document.addEventListener("DOMContentLoaded", function() {

  // Realiza una petición al archivo PHP que devuelve los trayectos en formato JSON
  fetch('./php/obtener_trayectos.php')
    .then(response => response.json())   // Convierte la respuesta del PHP (texto) a JSON
    .then(data => {
        // Obtiene el contenedor donde se van a insertar las tarjetas de trayectos
        let contenedor = document.getElementById("contenedorTrayectos");

        // Recorre cada elemento recibido desde el PHP (cada trayecto)
        data.forEach(t => {

            // Crea una estructura HTML (card) que muestra la imagen del trayecto
            let card = `
              <div class="card">
                  <img src="./img/${t.imagen}" width="120px">
              </div>
            `;

            // Inserta la tarjeta dentro del contenedor, sumándola al contenido existente
            contenedor.innerHTML += card;
        });
    })
    // Si ocurre un error cargando los datos (ruta mala, fallo PHP, JSON mal formado...)
    // se muestra en la consola del navegador
    .catch(err => console.error("Error cargando trayectos:", err));

});
</script>

</body>

</html>