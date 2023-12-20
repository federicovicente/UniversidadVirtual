<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                        <a class="nav-link " href="#" id="iniciar" role="button" data-bs-toggle="modal" data-bs-target="#modalLoguin"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 mt-2 mb-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success mt-2 mb-2" type="submit">Buscar</button>
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
                    <div class="divForm">
                        <input id="nameNew" type="text" name="name" placeholder=" " required>
                        <label for="nameNew">Nombre</label>
                    </div>
                    <div class="divForm">
                        <input id="surnameNew" type="text" name="surname" placeholder=" " required>
                        <label for="surnameNew">Apellido</label>
                    </div>
                    <div class="divForm">
                        <input id="emailNew" type="email" name="email" placeholder=" " required>
                        <label for="emailNew">Correo electrónico</label>
                    </div>
                    <div class="divForm">
                        <input id="passwordNew" type="password" name="password" placeholder=" " required>
                        <label for="passwordNew">Contraseña</label>
                    </div>
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
                    <div class="divForm">
                        <input id="email" type="email" name="email" placeholder=" " required>
                        <label for="email">Correo electrónico</label>
                    </div>
                    <div class="divForm">
                        <input id="password" type="password" name="password" placeholder=" " required>
                        <label for="password">Contraseña</label>
                    </div>
                    <button class="btn btn-primary  mb-3 btnSubmit" type="submit">Iniciar sesión</button>
                    <div style="margin-left: 5px;"><span id="registro">Aún no tengo un usuario creado</span></div>
                </form>
            </div>
            <!-- Formulario Mi cuenta -->
            <div class="card-body form-user" id="form-micuenta">
                <h3 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h3>
                <p style="color:#6d6d6d !important;" class=""><?= $_SESSION['user_email'] ?></p>
                <hr>
                <div class="items-menu"><a id="acceder">Mis cursos</a></div>
                <div class="items-menu"><a id="acceder">Favoritos</a></div>
                <div class="items-menu"><a id="acceder">Notificaciones</a></div>
                <div class="items-menu"><a id="acceder">Mensajes</a></div>
                <div class="items-menu"><a id="acceder">Métodos de pago</a></div>
                <div class="items-menu"><a id="acceder">Cupones UV</a></div>
                <div class="items-menu"><a id="acceder" href="./controllers/renew_sesion.php">Configuración de mi cuenta</a></div>
                <hr>
                <div class="items-menu"><a style="font-weight: 500;" id="acceder" href="./controllers/logout.php">Salir</a></div>
            </div>
            <!-- Formulario Administrador -->
            <div class="card-body form-user" id="form-admin">
                <h3 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h3>
                <p style="color:#6d6d6d !important;" class=""><?= $_SESSION['user_email'] ?></p>
                <hr>
                <div class="items-menu"><a id="acceder" href="admin_docentes.php">Administrador de docentes</a></div>
                <div class="items-menu"><a id="acceder" href="admin_users.php">Administrador de usuarios</a></div>
                <div class="items-menu"><a id="acceder" href="admin_cursos.php">Administrador de cursos</a></div>
                <div class="items-menu"><a id="acceder" href="./controllers/renew_sesion.php">Configuración de mi cuenta</a></div>
                <hr>
                <div class="items-menu"><a style="font-weight: 500;" id="acceder" href="./controllers/logout.php">Salir</a></div>
            </div>
        </div>
    </div>

    <div class="container-b">
        <div class="wrap-b">
            <div class="encabezado-b">
                <h1 class="display-6">Nosotros</h1>
            </div>
            <div class="panel-b">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus obcaecati unde sed iure beatae magni maiores optio impedit ea corporis ratione explicabo molestiae modi qui, excepturi suscipit iste? In debitis corporis maiores optio rerum non fugiat aspernatur eaque laboriosam quod commodi, corrupti doloremque consequuntur eveniet blanditiis aliquid ex facere magni voluptatem cum ipsum.</br>&nbsp;&nbsp;&nbsp;&nbsp;Unde, modi dicta tenetur deleniti sequi omnis accusamus accusantium possimus aspernatur. Facere molestiae, at veniam sapiente quae odit quibusdam nesciunt itaque deserunt, eaque tenetur deleniti, quam pariatur laboriosam quisquam id facilis cumque eveniet laborum recusandae non. Esse, impedit suscipit sunt itaque corrupti culpa asperiores est reprehenderit reiciendis. Officia, ratione nam adipisci accusantium porro voluptatum rem deserunt excepturi ex perspiciatis aperiam obcaecati veniam earum temporibus aliquid doloremque aspernatur maxime ut quod aut asperiores repellat. Tempora reprehenderit delectus molestiae ipsam sunt nam voluptates. Facilis laboriosam est ducimus voluptates blanditiis dignissimos laborum, minima deserunt sint, officiis ea ipsam unde commodi, nobis beatae rem velit iusto. Nemo illo deleniti at molestiae dolor minus modi sed dignissimos Lorem ipsum dolor sit amet consectetur adipisicing elit.</br>&nbsp;&nbsp;&nbsp;&nbsp;Ducimus obcaecati unde sed iure beatae magni maiores optio, Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus obcaecati unde sed iure beatae magni maiores optio, Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus obcaecati unde sed iure beatae magni maiores optio, Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus obcaecati unde sed iure beatae magni maiores optio.</p>
            </div>
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
                        <a href="https://www.instagram.com/" target="_blank" rel="nofollow noopener noreferer"><img src="images\instagram.png" alt="icono redes sociales"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/"><img src="images\twitterX.png" alt="icono redes sociales"></a>
                    </li>
                    <li>
                        <a href="https://wa.me/+5491166803000"><img src="images\whatsapp.png" alt="icono redes sociales"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-creds">
            <div class="copy-creds">
                <p>Universidad Virtual ©2022 · <?php echo date('Y'); ?></p>
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
    <script src="js/script.js"></script>
</body>

</html>