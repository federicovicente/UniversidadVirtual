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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
              <img src="images/logoCompleto.png" alt="Bootstrap" height="40" style="margin: 0 0 0 0;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link " href="#" id="iniciar" role="button" data-bs-toggle="modal" data-bs-target="#modalLoguin"></a>
                  </li>
              </ul>
              <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>
              <div class="iniciar-sesion-nav" id="iniciar-sesion-nav">
                  <button id="btniniciarsesion" class="btn btn-primary btnSubmit" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Iniciar sesión</button>
              </div>
              <div class="mi-cuenta-nav" id="mi-cuenta-nav">
                  <button id="btnIniciales" class="btn btn-primary btnSubmit" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" onclick="cerrarcanvas()"><?= isset($_SESSION['user_iniciales']) ? $_SESSION['user_iniciales'] : '' ?></button>
              </div>
          </div>
      </div>
  </nav>
  <!-- canvas -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" id="form-offcanvas">
          <!-- Formulario de registro -->
          <div class="card-body" id="form-registro">
              <h5 class="mt-3 mb-5 text-center">Regístrate</h5>
              <form action="./controllers/signup.php" method="POST">
                  <input class="form-control mb-3" type="text" name="name" placeholder="Nombre" required>
                  <input class="form-control mb-3" type="text" name="surname" placeholder="Apellido" required>
                  <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
                  <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>
                  <button class="btn btn-primary mb-3 btnSubmit" type="submit">Crear usuario</button>
                  <div style="margin-left: 5px;"><span id="acceder">Ya tengo un usuario</span></div>
              </form>
          </div>
          <!-- Formulario iniciar sesión -->
          <div class="card-body" id="form-acceso">
              <h5 class="mt-3 mb-5 text-center">Iniciar sesión</h5>
              <!-- pregunto si la variable de sesión está disponible -->
              <?php if (isset($_SESSION['registro'])) { ?>
                  <script>
                      $(document).ready(function() {
                          $('#offcanvasWithBothOptions').offcanvas('show');
                      });
                  </script>
                  <div class="alert alert-success" role="alert">
                      <?= $_SESSION['registro'] ?>
                  </div>
              <?php }
              unset($_SESSION['registro']);
              ?>
              <?php if (isset($_SESSION['login'])) {
                  echo '';
              ?>
                  <script>
                      $(document).ready(function() {
                          $('#offcanvasWithBothOptions').offcanvas('show');
                      });
                  </script>
                  <div class="alert alert-danger" role="alert">
                      <?= $_SESSION['login'] ?>
                  </div>
              <?php }
              unset($_SESSION['login']);
              ?>
              <form action="./controllers/signin.php" method="POST">
                  <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
                  <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>
                  <button class="btn btn-primary mb-3 btnSubmit" type="submit">Iniciar sesión</button>
                  <div style="margin-left: 5px;"><span id="registro">Aún no tengo un usuario creado</span></div>
              </form>
          </div>
          <!-- Formulario Mi cuenta -->
          <div class="card-body" id="form-micuenta">
              <h3 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h3>
              <p style="color:#6d6d6d !important;" class=""><?= $_SESSION['user_email'] ?></p>
              <hr>
              <div class="items-menu"><a id="acceder">Mis cursos</a></div>
              <div class="items-menu"><a id="acceder">Favoritos</a></div>
              <div class="items-menu"><a id="acceder">Notificaciones</a></div>
              <div class="items-menu"><a id="acceder">Mensajes</a></div>
              <div class="items-menu"><a id="acceder">Métodos de pago</a></div>
              <div class="items-menu"><a id="acceder">Cupones UV</a></div>
              <div class="items-menu"><a id="acceder" href="./controllers/update_sesion.php">Configuración de mi cuenta</a></div>
              <hr>
              <div class="items-menu"><a style="font-weight: 500;" id="acceder" href="./controllers/logout.php">Salir</a></div>
          </div>
          <!-- Formulario Administrador -->
          <div class="card-body" id="form-admin">
              <h3 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h3>
              <p style="color:#6d6d6d !important;" class=""><?= $_SESSION['user_email'] ?></p>
              <hr>
              <div class="items-menu"><a id="acceder" href="./controllers/update_sesion.php">Administrar cursos</a></div>
              <div class="items-menu"><a id="acceder" href="./controllers/get_usuarios.php">Administrar usuarios</a></div>
              <div class="items-menu"><a id="acceder" href="./controllers/update_sesion.php">Configuración de mi cuenta</a></div>
              <hr>
              <div class="items-menu"><a style="font-weight: 500;" id="acceder" href="./controllers/logout.php">Salir</a></div>
          </div>
      </div>
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
  <div class="contenedor-encabezado-carousel">
    <div class="encabezado-carousel">
      <h4>Cursos más buscados por nuestros alumnos...</h4>
    </div>
  </div>
  <div class="contenedor-carouselt">
    <div class="wrapperfv">
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
  <footer class="footer">
          <div class="wrap-footer">
              <div class="text-element-footer element-footer">
                  <div class="imgLogo"><img src="images/logo.png" alt="img" draggable="false"></div>
                  <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, blanditiis hic quaerat nesciunt, labore
                      eligendi consequatur voluptas dolores earum soluta tenetur iure officia error accusamus?</h6>
              </div>
              <div class="text-element-footer element-footer">
                  <h5>Dirección</h5>
                  <ul>
                      <li>Oficina cetral</li>
                      <li>La calle - 111</li>
                      <li>Cel: (011) 1111-11111</li>
                      <li>Tel: (011) 2222-2222</li>
                  </ul>
              </div>
              <div class="text-element-footer link-elements-footer element-footer">
                  <h5>Más Información</h5>
                  <ul>
                      <li><a href="/">Inicio</a></li>
                      <li><a href="./nosotros.php">Nosotros</a></li>
                      <li><a href="#">Contactar</a></li>
                  </ul>
              </div>
              <div class="rrss-element-footer element-footer">
                  <h5>Redes Sociales</h5>
                  <ul>
                      <li>
                          <a href="https://facebook.com" target="_blank" rel="nofollow noopener noreferer"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtNTEyIDc1djM2MmMwIDQxLjM5ODQzOC0zMy42MDE1NjIgNzUtNzUgNzVoLTEyMWwtMzAtMzBoLTMwbC0zMCAzMGgtMTUxYy00MS4zOTg0MzggMC03NS0zMy42MDE1NjItNzUtNzV2LTM2MmMwLTQxLjM5ODQzOCAzMy42MDE1NjItNzUgNzUtNzVoMzYyYzQxLjM5ODQzOCAwIDc1IDMzLjYwMTU2MiA3NSA3NXptMCAwIiBmaWxsPSIjNzk4NGViIi8+PHBhdGggZD0ibTUxMiA3NXYzNjJjMCA0MS4zOTg0MzgtMzMuNjAxNTYyIDc1LTc1IDc1aC0xMjFsLTMwLTMwaC0xNXYtNDgyaDE2NmM0MS4zOTg0MzggMCA3NSAzMy42MDE1NjIgNzUgNzV6bTAgMCIgZmlsbD0iIzQ2NjFkMSIvPjxwYXRoIGQ9Im0zMTYgMTgwdjYwaDkwbC0xNSA5MGgtNzV2MTgyaC05MHYtMTgyaC02MHYtOTBoNjB2LTYwYzAtMzMuMzAwNzgxIDE4LjMwMDc4MS02Mi40MDIzNDQgNDUtNzggMTMuMTk5MjE5LTcuNSAyOC44MDA3ODEtMTIgNDUtMTJoOTB2OTB6bTAgMCIgZmlsbD0iI2VjZWNmMSIvPjxwYXRoIGQ9Im0zMTYgMTgwdjYwaDkwbC0xNSA5MGgtNzV2MTgyaC00NXYtNDEwYzEzLjE5OTIxOS03LjUgMjguODAwNzgxLTEyIDQ1LTEyaDkwdjkwem0wIDAiIGZpbGw9IiNlMmUyZTciLz48L3N2Zz4=" alt="icono redes sociales"></a>
                      </li>
                      <li>
                          <a href="mailto:info@dropcoding.com"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIC0zMSA1MTIgNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0yMTEgMjcwLTQwLjkxNzk2OSA0My42NzU3ODEgMTAuOTE3OTY5IDc2LjMyNDIxOSAxMjAtOTB6bTAgMCIgZmlsbD0iIzAwYzBmMSIvPjxwYXRoIGQ9Im0wIDE4MCAxMjEgNjAgOTAgMzAgMjEwIDE4MCA5MS00NTB6bTAgMCIgZmlsbD0iIzc2ZTJmOCIvPjxwYXRoIGQ9Im0xMjEgMjQwIDYwIDE1MCAzMC0xMjAgMjEwLTE4MHptMCAwIiBmaWxsPSIjMjVkOWY4Ii8+PC9zdmc+" alt="icono redes sociales"></a>
                      </li>
                      <li>
                          <a href="https://wa.me/600112233"><img src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMjU2IDBjLTE0MC42OTkyMTkgMC0yNTYgMTE1LjMwMDc4MS0yNTYgMjU2IDAgNDYuNSAxMi41OTc2NTYgOTEuNSAzNi4zMDA3ODEgMTMxLjEwMTU2MmwtMzYuMzAwNzgxIDEyNC44OTg0MzggMTI0Ljg5ODQzOC0zNi4zMDA3ODFjMzkuNjAxNTYyIDIzLjY5OTIxOSA4NC42MDE1NjIgMzYuMzAwNzgxIDEzMS4xMDE1NjIgMzYuMzAwNzgxIDE0MC42OTkyMTkgMCAyNTYtMTE1LjMwMDc4MSAyNTYtMjU2cy0xMTUuMzAwNzgxLTI1Ni0yNTYtMjU2em0wIDAiIGZpbGw9IiMwMGRkN2IiLz48cGF0aCBkPSJtNTEyIDI1NmMwIDE0MC42OTkyMTktMTE1LjMwMDc4MSAyNTYtMjU2IDI1NnYtNTEyYzE0MC42OTkyMTkgMCAyNTYgMTE1LjMwMDc4MSAyNTYgMjU2em0wIDAiIGZpbGw9IiMwMGNjNzEiLz48cGF0aCBkPSJtNDE3LjE5OTIxOSAzNjQuMzAwNzgxLTEyIDExLjY5OTIxOWMtMTYuODAwNzgxIDE2LjgwMDc4MS01NS44MDA3ODEgMTUuNTk3NjU2LTgwLjY5OTIxOSAxMC44MDA3ODEtMjIuMTk5MjE5LTQuMTk5MjE5LTQ2LTE0LjEwMTU2Mi02OC41LTI3LjkwMjM0My02MS4xOTkyMTktMzcuMTk5MjE5LTExNi42OTkyMTktMTAzLjE5OTIxOS0xMzAuMTk5MjE5LTE2Mi41OTc2NTctOS4zMDA3ODEtNDAuMjAzMTI1LTQuMTk5MjE5LTc1IDktODguNWwxMi0xMmM2LjYwMTU2My02LjMwMDc4MSAxNy4wOTc2NTctNi4zMDA3ODEgMjMuNjk5MjE5IDBsNDcuNjk5MjE5IDQ3LjY5OTIxOWMzLjMwMDc4MSAzLjMwMDc4MSA1LjEwMTU2MiA3LjUgNS4xMDE1NjIgMTJzLTEuODAwNzgxIDguNjk5MjE5LTUuMTAxNTYyIDEybC0xMiAxMS42OTkyMTljLTEyLjg5ODQzOCAxMy4xOTkyMTktMTIuODk4NDM4IDM0LjUgMCA0Ny42OTkyMTlsNDkuODAwNzgxIDQ4LjkwMjM0MyAyOS4wOTc2NTYgMjguODAwNzgxYzEzLjIwMzEyNSAxMy4xOTkyMTkgMzUuNTAzOTA2IDEzLjE5OTIxOSA0OC43MDMxMjUgMGwxMS42OTkyMTktMTIuMDAzOTA2YzYuMzAwNzgxLTYgMTcuNjk5MjE5LTYgMjQgMGw0Ny42OTkyMTkgNDcuNzAzMTI1YzYuMzAwNzgxIDYuNTk3NjU3IDYuNjAxNTYyIDE3LjA5NzY1NyAwIDI0em0wIDAiIGZpbGw9IiNlY2VjZjEiLz48cGF0aCBkPSJtNDE3LjE5OTIxOSAzNjQuMzAwNzgxLTEyIDExLjY5OTIxOWMtMTYuODAwNzgxIDE2LjgwMDc4MS01NS44MDA3ODEgMTUuNTk3NjU2LTgwLjY5OTIxOSAxMC44MDA3ODEtMjIuMTk5MjE5LTQuMTk5MjE5LTQ2LTE0LjEwMTU2Mi02OC41LTI3LjkwMjM0M3YtODMuMDk3NjU3bDI5LjA5NzY1NiAyOC44MDA3ODFjMTMuMjAzMTI1IDEzLjE5OTIxOSAzNS41MDM5MDYgMTMuMTk5MjE5IDQ4LjcwMzEyNSAwbDExLjY5OTIxOS0xMi4wMDM5MDZjNi4zMDA3ODEtNiAxNy42OTkyMTktNiAyNCAwbDQ3LjY5OTIxOSA0Ny43MDMxMjVjNi4zMDA3ODEgNi41OTc2NTcgNi42MDE1NjIgMTcuMDk3NjU3IDAgMjR6bTAgMCIgZmlsbD0iI2UyZTJlNyIvPjwvc3ZnPg==" alt="icono redes sociales"></a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="footer-creds">
              <div class="copy-creds">
                  <p>©2023 · Todos los derechos reservados.</p>
              </div>
              <div class="legal-creds">
                  <ul>
                      <li><a href="#">Política de Privacidad</a></li>
                      <li><a href="#">Política de Cookies</a></li>
                      <li><a href="#">Aviso Legal</a></li>
                  </ul>
              </div>
          </div>
  </footer>

  <script>
    const userAdministrador = "<?php echo isset($_SESSION['user_administrador']) ? $_SESSION['user_administrador'] : '' ?>";
  </script>
 
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