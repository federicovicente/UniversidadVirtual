<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar cursos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
</head>
<?php if (isset($_SESSION['user_id'])) { ?>

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
            <div class="wrap-b extended">
                <div class="encabezado-b">
                    <h1 class="display-6">Administrador de cursos</h1>
                </div>
                <div class="panel-b table-responsive just">
                    <div style="display:flex">
                        <button type="submit" class="btn btn-primary btnSubmit" onclick="location.href='c_curso.php'" id="btnCreatUser">Crear curso</button>
                        <!-- alertas -->
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show mb-0 mt-3 position-absolute top0 start-50 translate-middle" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= $_SESSION['success'] ?>
                                <?= isset($_SESSION['success2']) ? $_SESSION['success2'] : '' ?>
                            </div>
                        <?php }
                        unset($_SESSION['success']);
                        unset($_SESSION['success2']);
                        ?>
                        <?php if (isset($_SESSION['danger'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show mb-0 mt-3 position-absolute top0 start-50 translate-middle" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= $_SESSION['danger'] ?>
                            </div>
                        <?php }
                        unset($_SESSION['danger']);
                        ?>
                        <!-- alertas -->
                    </div>
                    <table class="table table-hover mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Curso</th>
                                <th scope="col" hidden>idDocente</th>
                                <th scope="col">Docente</th>
                                <th scope="col" hidden>Duración</th>
                                <th scope="col" hidden>Certificado</th>
                                <th scope="col">Idiomas</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Activo</th>
                                <th class="thAcciones" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="body-dark">
                            <?php

                            require './controllers/get_cursos.php';

                            $lista_cursos = unserialize(getCursos());

                            foreach ($lista_cursos as $curso) {
                                echo "<tr>";

                                $idCurso = $curso["idCurso"];
                                echo "<td>";
                                echo $idCurso;
                                echo "</td>";

                                $nombre = $curso["curso"];
                                echo "<td>";
                                echo $nombre;
                                echo "</td>";

                                $idDocente = $curso["idDocente"];
                                "<td>";
                                $idDocente;
                                "</td>";

                                $docente = $curso["docente"];
                                echo "<td>";
                                echo $docente;
                                echo "</td>";

                                $duracion = $curso["duracion"];
                                "<td>";
                                $duracion;
                                "</td>";

                                $certificado = $curso["certificado"];
                                "<td>";
                                $certificado;
                                "</td>";

                                $idioma = $curso["idioma"];
                                echo "<td>";
                                echo $idioma;
                                echo "</td>";

                                $precio = number_format($curso["precio"], 2, ',', '.');
                                echo "<td>";
                                echo $precio;
                                echo "</td>";

                                if ($curso["activo"] == 1) {
                                    $activo = 'Si';
                                } else {
                                    $activo = 'No';
                                }
                                echo "<td>";
                                echo $activo;
                                echo "</td>";

                                echo "<td class='botoneraG'>";
                                echo "<a href='#' data-bs-toggle='modal' data-bs-target='#deleteModal' idCurso='$idCurso' curso='$nombre'><i class='bi bi-trash3-fill'></i></a>";
                                echo "<a id='btnModificar' href='u_curso.php?id=$idCurso' idCurso='$idCurso' ><i class='bi bi-pencil-fill'></i></a>";
                                echo "<a id='btnVer' href='u_curso.php?id=$idCurso' idCurso='$idCurso'><i class='bi bi-eye-fill'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar curso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/delete_curso.php" method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Está a punto de eliminar el curso:</label>
                                <b><label for="recipient-name" class="col-form-label" id="elementDelete"></label></b>
                                <label for="recipient-name" class="col-form-label">Esta acción no podrá deshacerse.</label>
                                <input type="hidden" class="form-control" id="idCurso_Delete" name="idCurso">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Eliminar</button>
                            </div>
                        </form>
                    </div>
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

        <script>
            $(document).ready(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const mostrarLogin = urlParams.get('mostrarLogin');

                if (mostrarLogin === 'true') {
                    $('#offcanvasWithBothOptions').offcanvas('show');
                }
            });
        </script>

        <script src="js/script.js"></script>
        <script src="js/user_list.js"></script>
        <script>
            //Guardar tipo de botón: modificar o solo lectura
            $(document).ready(function() {
                $(document).on('click', '#btnModificar', function() {
                    sessionStorage.removeItem('accion');
                    sessionStorage.setItem('accion', CryptoJS.AES.encrypt('Modificar', 'admin123').toString());
                });

                $(document).on('click', '#btnVer', function() {
                    sessionStorage.removeItem('accion');
                    sessionStorage.setItem('accion', CryptoJS.AES.encrypt('Ver', 'admin123').toString());
                });
            });
        </script>
    </body>
<?php } else {
    require('./404.php');
} ?>

</html>