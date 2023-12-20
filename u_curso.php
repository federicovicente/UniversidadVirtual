<?php session_start();
$idCurso = $_GET["id"];
require './controllers/data_curso.php';
$data_cursos = unserialize(dataCurso($idCurso));
$lista_docentes = unserialize(getDocentes());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_cursos["curso"]; ?></title>
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
            <div class="wrap-b extendedM">
                <div class="encabezado-b">
                    <h1 class="display-6">Modificar curso</h1>
                </div>
                <div class="panel-b">
                    <div style="display:flex">
                    </div>
                    <form action="./controllers/update_curso.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="divForm2">
                                <label>Título</label>
                                <input id="curso" value="<?php echo $data_cursos["curso"]; ?>" type="text" name="curso" required>
                                <input id="idCurso" value="<?php echo $data_cursos["idCurso"]; ?>" type="text" name="idCurso" hidden>
                            </div>
                            <div class="divForm2">
                                <label>Subtítulo</label>
                                <input id="subTitulo" value="<?php echo $data_cursos["subTitulo"]; ?>" type="text" name="subTitulo" required></input>
                            </div>
                            <div class="divForm2">
                                <label>Docente creador</label>
                                <select style="width: 300px;" name="docente" id="docente" required>
                                    <?php
                                    $idDocenteCurso = $data_cursos["idDocente"];
                                    echo "<option selected=>Seleccione un ítem de la lista</option>";
                                    foreach ($lista_docentes as $docente) {
                                        $selected = ($docente["idDocente"] == $idDocenteCurso) ? 'selected' : '';
                                        echo "<option value=" . $docente["idDocente"] . " $selected>" . $docente["nombre"] . " " . $docente["apellido"] . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="divForm2">
                                <label>Detalle</label>
                                <textarea id="descripcion" style="min-height:100px" id="text" name="descripcion" required><?php echo $data_cursos["descripcion"]; ?></textarea>
                            </div>
                            <div class="divMitad">
                                <div class="divForm2">
                                    <label>Duración</label>
                                    <input id="duracion" class="" type="text" name="duracion" required value="<?php echo $data_cursos["duracion"]; ?>">
                                </div>
                                <div class="divForm2">
                                    <label>Certificado</label>
                                    <input id="certificado" class="" type="text" name="certificado" required value="<?php echo $data_cursos["certificado"]; ?>">
                                </div>
                            </div>
                            <div class="divForm2">
                                <label>Idiomas disponibles</label>
                            </div>

                            <div class="divMitad">
                                <div class="divForm3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="espanol" value="Español" id="espanol" disabled>
                                        <label class="form-check-label" for="espanol">Español</label>
                                    </div>
                                </div>
                                <div class="divForm3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ingles" value="Inglés" id="ingles">
                                        <label class="form-check-label" for="ingles">Inglés</label>
                                    </div>
                                </div>
                                <div class="divForm3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="portugues" value="Portugués" id="portugues">
                                        <label class="form-check-label" for="portugues">Portugués</label>
                                    </div>
                                </div>
                            </div>
                            <div class="divForm2">
                                <label>Precio</label>
                                <div class="inputGrup">
                                    <span class="input-group-text">$</span>
                                    <input id="precio" class="" type="text" name="precio" placeholder=" " required value="<?php echo $data_cursos["precio"] ?>">
                                </div>
                            </div>

                            <div class="divForm2">
                                <label>Imagen de portada</label>
                                <input class="form-control mb-3 mt-2" type="file" name="archivo" id="imagenCurso">
                                <button id="btnImagenCurso" type="button" class="btn btn-primary btnSubmit" data-bs-toggle='modal' data-bs-target='#verImagen'>Ver imagen</button>
                                <button style="margin-left: 20px;" id="btnTarjetaCurso" type="button" class="btn btn-primary btnSubmit" data-bs-toggle='modal' data-bs-target='#verTarjeta'>Ver Tarjeta</button>
                            </div>


                            <!-- Alerta tamaño superado -->
                            <div class="alert alert-danger  fade show mb-0 mt-3 position-absolute top0 start-50 translate-middle" id="divMensaje" style="display: none;" role="alert">
                                <label id="textMensaje"></label>
                            </div>
                            <div class="divMitad" style="margin-top:40px">
                                <div class="divForm3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="cursoActivo" value="1" id="cursoActivo">
                                        <label class="form-check-label" for="cursoActivo">Activo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="divBotones">
                                <button id="btnCancelar" type="button" class="btn btn-secondary btnCancel" data-bs-toggle='modal' data-bs-target='#cancelCurso'>Cancelar</button>
                                <button id="btnAceptar" type="submit" class="btn btn-primary btnSubmit">Aceptar</button>
                                <button id="btnCerrar" onclick="location.href='admin_cursos.php'" type="button" class="btn btn-primary btnSubmit">Cerrar</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <!-- Cancel modal -->
        <div class="modal fade" id="cancelCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="CreateCurso">Está seguro que desea cancelar la creación del curso?</label>
                            <label for="CreateCurso">La información no podrá ser recuperada</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary btnSubmit" onclick="location.href='admin_cursos.php'">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Imagen modal -->
        <div class="modal fade" id="verImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <img src="<?php echo $data_cursos["img"]; ?>" alt="img">
                    <div class="modal-body">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnSubmit" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tajeta modal -->
        <div class="modal fade" id="verTarjeta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modalTarjetaCurso">
                <div class="modal-content color-modal-content">
                    <ul class="carouselfv">
                        <div class="tarjetaCusro">
                            <li class='cardfv'>
                                <div class='img'><img src="<?php echo $data_cursos["img"]; ?>" alt='img' draggable='false'></div>
                                <div class='bodyCard'>
                                    <h5><?php echo $data_cursos["curso"]; ?></h5>
                                    <h6><?php echo $data_cursos["subTitulo"]; ?></h6>
                                </div>
                                <a class='card-link'>Más información...</a>
                            </li>
                        </div>
                    </ul>
                    <div class="modal-body">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnSubmit" data-bs-dismiss="modal">Cerrar</button>
                        </div>
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

            //Control tamaño y tipo archivo
            $(document).ready(function() {
                $('#imagenCurso').on('change', function() {

                    var fileSize = this.files[0].size; // Tamaño del archivo en bytes
                    var maxSize = 500 * 1024; // 4MB en bytes
                    var fileName = this.files[0].name; // Obtiene el nombre del archivo
                    var fileExtension = fileName.split('.').pop().toLowerCase(); // Obtiene la extensión del archivo
                    var extensions = ['jpg', 'pdf'];

                    if (!extensions.includes(fileExtension)) {
                        $('#divMensaje').show();
                        $('#textMensaje').text('El archivo no es de tipo .jpg');
                        this.value = "";
                    } else if (fileSize > maxSize) {
                        $('#divMensaje').show();
                        $('#textMensaje').text('El archivo seleccionado excede el límite de tamaño (10MB)');
                        this.value = ""; // Limpia el campo del archivo seleccionado
                    } else {
                        $('#divMensaje').css('display', 'none');
                        $('#textMensaje').text('');
                    }

                    //oculta alerta al hacer clic
                    $('#divMensaje').on('click', function() {
                        $('#divMensaje').css('display', 'none'); // Oculta la alerta
                        $('#textMensaje').text(''); // Limpia el texto del mensaje
                    });

                });
            });

            //Mostrar ocultar boton ver imagen
            var dirImg = "<?php echo $data_cursos["img"]; ?>";
            if (!dirImg == "") {
                $('#btnImagenCurso').show;
                $('#btnTarjetaCurso').show;
            } else {
                $('#btnImagenCurso').css('display', 'none');
                $('#btnTarjetaCurso').css('display', 'none');
            }

            //Checkear idiomas
            var idiomas = "<?php echo $data_cursos["idioma"]; ?>";
            if (idiomas.includes("Español")) {
                $('#espanol').prop("checked", true);
            } else {
                $('#espanol').prop("checked", false);
            }
            if (idiomas.includes('Inglés')) {
                $('#ingles').prop("checked", true);
            } else {
                $('#ingles').prop("checked", false);
            }
            if (idiomas.includes('Portugués')) {
                $('#portugues').prop("checked", true);
            } else {
                $('#portugues').prop("checked", false);
            }

            //Checkear Activo
            var cursoActivo = "<?php echo $data_cursos["activo"]; ?>";
            if (cursoActivo == 1) {
                $('#cursoActivo').prop("checked", true);
            } else {
                $('#cursoActivo').prop("checked", false);
            }

            //Modo visualización
            $(document).ready(() => {
                if (CryptoJS.AES.decrypt(sessionStorage.getItem('accion'), 'admin123').toString(CryptoJS.enc.Utf8) == 'Modificar') {
                    $('#curso').removeAttr('readonly');
                    $('#subTitulo').removeAttr('readonly')
                    $('#docente').prop('disabled', false)
                    $('#descripcion').removeAttr('readonly')
                    $('#duracion').removeAttr('readonly')
                    $('#certificado').removeAttr('readonly')
                    $('#espanol').prop('disabled', false)
                    $('#ingles').prop('disabled', false)
                    $('#portugues').prop('disabled', false)
                    $('#precio').removeAttr('readonly')
                    $('#cursoActivo').prop('disabled', false)
                    $('#imagenCurso').show
                    $('#btnCancelar').show
                    $('#btnAceptar').show
                    $('#btnCerrar').css('display', 'none')
                } else if (CryptoJS.AES.decrypt(sessionStorage.getItem('accion'), 'admin123').toString(CryptoJS.enc.Utf8) == 'Ver') {
                    $('#curso').attr('readonly', 'readonly')
                    $('#subTitulo').attr('readonly', 'readonly')
                    $('#docente').prop('disabled', true)
                    $('#descripcion').attr('readonly', 'readonly')
                    $('#duracion').attr('readonly', 'readonly')
                    $('#certificado').attr('readonly', 'readonly')
                    $('#espanol').prop('disabled', true)
                    $('#ingles').prop('disabled', true)
                    $('#portugues').prop('disabled', true)
                    $('#formIdioma').attr('readonly', 'readonly')
                    $('#precio').attr('readonly', 'readonly')
                    $('#cursoActivo').prop('disabled', true)
                    $('#imagenCurso').css('display', 'none')
                    $('#btnCancelar').css('display', 'none')
                    $('#btnAceptar').css('display', 'none')
                    $('#btnCerrar').show
                }
            });
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

    </body>
<?php } else {
    require('./404.php');
} ?>

</html>