<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar docentes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                    <div class="items-menu"><a id="acceder" href="docentes_admin.php">Administrar docentes</a></div>
                    <div class="items-menu"><a id="acceder" href="users_admin.php">Administrar usuarios</a></div>
                    <div class="items-menu"><a id="acceder" href="./controllers/renew_sesion.php">Configuración de mi cuenta</a></div>
                    <hr>
                    <div class="items-menu"><a style="font-weight: 500;" id="acceder" href="./controllers/logout.php">Salir</a></div>
                </div>
            </div>
        </div>

        <div class="container-b">
            <div class="wrap-b extended">
                <div class="encabezado-b angosto">
                    <h1 class="display-6">Administrador de docentes</h1>
                </div>
                <div class="panel-b table-responsive just">
                    <div style="display:flex">
                        <button type="submit" class="btn btn-primary btnSubmit" data-bs-toggle='modal' data-bs-target='#createModal' id="btnCreatUser">Crear docente</button>
                        <!-- alertas -->
                        <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show mb-0 mt-3 position-absolute top0 start-50 translate-middle" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= $_SESSION['success'] ?>
                            </div>
                        <?php }
                        unset($_SESSION['success']);
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">email</th>
                                <th scope="col">Administrador</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="body-dark">
                            <?php

                            require './controllers/get_users.php';

                            $lista_usuarios = unserialize(getUsers());

                            foreach ($lista_usuarios as $usuario) {
                                echo "<tr>";

                                $idUsuario = $usuario["idUsuario"];
                                echo "<td>";
                                echo $idUsuario;
                                echo "</td>";

                                $nombre = $usuario["nombre"];
                                echo "<td>";
                                echo $nombre;
                                echo "</td>";

                                $apellido = $usuario["apellido"];
                                echo "<td>";
                                echo $apellido;
                                echo "</td>";

                                $email = $usuario["email"];
                                echo "<td>";
                                echo $email;
                                echo "</td>";

                                if ($usuario["administrador"] == 1) {
                                    $administrador = 'Si';
                                } else {
                                    $administrador = 'No';
                                }
                                echo "<td>";
                                echo $administrador;
                                echo "</td>";

                                if ($usuario["activo"] == 1) {
                                    $activo = 'Si';
                                } else {
                                    $activo = 'No';
                                }
                                echo "<td>";
                                echo $activo;
                                echo "</td>";

                                echo "<td>";
                                echo "<a href='#' data-bs-toggle='modal' data-bs-target='#deleteModal' idUsuario='$idUsuario' nombre='$nombre' apellido='$apellido'><i class='bi bi-trash3-fill mx-1'></i></a>";
                                echo "<a href='#' data-bs-toggle='modal' data-bs-target='#updateModal' idUsuario='$idUsuario' nombre='$nombre' apellido='$apellido' email='$email' administrador='$administrador' activo='$activo'><i class='bi bi-pencil-fill mx-1'></i></a>";
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/delete_user.php" method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">¿Seguro desea eliminar el usuario</label>
                                <b><label for="recipient-name" class="col-form-label" id="nombreUsuario"></label></b>
                                <label for="recipient-name" class="col-form-label">?</label>
                                <label for="recipient-name" class="col-form-label">Esta acción no podrá deshacerse.</label>
                                <input type="hidden" class="form-control" id="idUsuarios" name="idUsuario">
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

        <!-- create modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/create_user.php" method="post">
                            <div class="mb-3">
                                <input class="form-control mb-3" type="text" name="name" placeholder="Nombre" required>
                                <input class="form-control mb-3" type="text" name="surname" placeholder="Apellido" required>
                                <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
                                <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="administrador" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Tilde la casilla si el usuario va a ser administrador</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- update modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/update_user.php" method="post">
                            <div class="mb-3">
                                <input class="form-control mb-3" type="hidden" id="inputIdUsuario" name="idUsuario" required>
                                <input class="form-control mb-3" type="text" id="inputNombre" name="nombre" placeholder="Nombre" required>
                                <input class="form-control mb-3" type="text" id="inputApellido" name="apellido" placeholder="Apellido" required>
                                <input class="form-control mb-3" type="email" id="inputEmail" name="email" placeholder="Email" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inputAdministrador" name="administrador" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Administrador</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inputActivo" name="activo" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Aceptar</button>
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

        <script src="js/script.js"></script>
        <script src="js/user_list.js"></script>

    </body>
<?php } else {
    require('./404.php');
} ?>

</html>