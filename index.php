<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vicente</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
   <!-- navbar -->
   <?php include 'layouts/navbar.php'; ?>
    <!-- canvas -->
    <div>
    <?php include 'layouts/offcanvas.php'; ?>
    </div>
  <!-- Carousel -->
  <div class="flexbox-margin-auto">
    <div class="flexbox-margin-auto_content">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/C-empresa.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h4>Administración Empresarial</h4>
              <p>Algún contenido placeholder representativo para la primera diapositiva.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/C-IA.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h4>Inteligencia artificial</h4>
              <p>Algún contenido placeholder representativo para la segunda diapositiva.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/C-tecnologia.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tecnologías</h5>
              <p>Algún contenido placeholder representativo para la tercera diapositiva.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </div>

  <!-- carousel con tarjetas más buscados -->
  <div class="contenedor-carouselt">
    <div class="wrapperfv">
      <h4>Cursos más buscados por nuestros alumnos...</h4>
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carouselfv">
        <li class="cardfv">
          <div class="img"><img src="images/I_tecnicas_negociacion.jpg" alt="img" draggable="false"></div>
          <h5>Técnicas de negociación</h5>
          <h6>Breve descripción del curso de Técnicas de negociación</h6>
          <a href="tecnicasnegociacion.php" class="card-link">Más información...</a>
        </li>
        <li class="cardfv">
          <div class="img"><img src="images/I_big_data.jpg" alt="img" draggable="false"></div>
          <h5>Big Data: procesamiento y análisis</h5>
          <h6>Breve descripción del curso Big Data: procesamiento y análisis</h6>
          <a href="#" class="card-link">Más información...</a>
        </li>
        <li class="cardfv">
          <div class="img"><img src="images/I_disenio_web.jpg" alt="img" draggable="false"></div>
          <h5>Diseño Web desde cero</h5>
          <h6>Breve descripción del curso Diseño Web desde cero</h6>
          <a href="#" class="card-link">Más información...</a>
        </li>
        <li class="cardfv">
          <div class="img"><img src="images/I_administracion_servidores.jpg" alt="img" draggable="false"></div>
          <h5>Manejo de servidores Linux</h5>
          <h6>Breve descripción del curso Manejo de servidores Linux</h6>
          <a href="#" class="card-link">Más información...</a>
        </li>
        <li class="cardfv">
          <div class="img"><img src="images/I_gestion_proyectos.jpg" alt="img" draggable="false"></div>
          <h5>Gestión de proyectos</h5>
          <h6>Breve descripción del curso Gestión de proyectos</h6>
          <a href="#" class="card-link">Más información...</a>
        </li>
        <li class="cardfv">
          <div class="img"><img src="images/I_comunicacion_corporativa.jpg" alt="img" draggable="false"></div>
          <h5>Comunicación corporativa</h5>
          <h6>Breve descripción del curso Comunicación corporativa</h6>
          <a href="#" class="card-link">Más información...</a>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'layouts/footer.php'; ?>

  <script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const mostrarLogin = urlParams.get('mostrarLogin');

        if (mostrarLogin === 'true') {
            $('#offcanvasWithBothOptions').offcanvas('show');
        }
    });
  </script>

  <script src="js/carousel.js"></script>
  <script src="js/script.js"></script>
</body>

</html>