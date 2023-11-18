<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnicas de negociación</title>
    <link rel="stylesheet" href="css/styles.css">
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
    <?php include 'layouts/offcanvas.php'; ?>

    <div class="contenedor-curso">
        <div class="wrap-curso">
            <div class="descripcion-curso">
                <img src="images/I_tecnicas_negociacion.jpg" />
                <div class="banner-curso">
                    <h4>Tecnicas de negociación</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis repudiandae ut sed dolores,
                        aperiam odit?</p>
                </div>
            </div>
            <div class="comprar-curso">
                <div class="div">
                    <h6>Creado por:</h6>
                    <p>Federico vicente</p>
                    <h6>Certificado:</h6>
                    <p>Oficial</p>
                    <h6>Duración:</h6>
                    <p>240 hs</p>
                    <h6>Idioma:</h6>
                    <p>Españo, Inglés</p>
                </div>
                <div class="div">
                    <form class="contenedorcupon">
                        <button type="button" class="btn btn-link" onclick="panelCupon()">Tengo un cupón</button>
                        <div class="panel_cupon" style="visibility: hidden;">
                            <input class="inputcupon" type="text" name="cupon" id="cupon" placeholder="Introducir el cupon">
                            <button type="button" class="btn btn-outline-dark" onclick="verificarCupon()">Validar</button>
                        </div>
                        <div class="alert alert-danger" role="alert" id="avisocupon" style="display: none;">
                            aviso
                        </div>
                    </form>
                    <div>
                        <div class="precio" id="precioOriginal">
                            <h3>69,99 US$</h3>
                        </div>
                        <div class="preciodescuento" id="precioDescuento">
                            <h3>62,99 US$</h3>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-dark">Comprar ahora!</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>
</body>

</html>