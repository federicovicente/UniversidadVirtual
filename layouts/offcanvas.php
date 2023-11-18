<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!-- Panel Offcanvas -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
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
            <button class="btn btn-primary mb-3" type="submit">Crear usuario</button>
            <div style="margin-left: 5px;"><span id="acceder">Ya tengo un usuario</span></div>
        </form>
        </div>
        <!-- Formulario iniciar sesión -->
        <div class="card-body" id="form-acceso">
          <h5 class="mt-3 mb-5 text-center">Iniciar sesión</h5>
          <!-- pregunto si la variable de sesión está disponible -->
          <?php if(isset($_SESSION['registro'])){?>
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
          <?php if(isset($_SESSION['login'])){
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
              <button class="btn btn-primary mb-3" type="submit">Iniciar sesión</button>
              <div style="margin-left: 5px;"><span id="registro">Aún no tengo un usuario creado</span></div>
          </form>
        </div>
        <!-- Formulario Mi cuenta -->
      <div class="card-body" id="form-micuenta">
        <h3 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h3>
        <p style="color:#6d6d6d !important;" class=""><?= $_SESSION['user_email']?></p>
        <hr>
        <div class="items-menu" ><span id="acceder">Configuración de mi cuenta</span></div>
        <div class="items-menu" ><span id="acceder">Mis cursos</span></div>
        <div class="cerrarSesion">
          <button onclick="location='./controllers/logout.php'" type="button" class="btn btn-outline-danger" >Cerrar sesión</button>
        </div>
      </div>  
      </div>
    </div>
  </div>
</body>
</html>