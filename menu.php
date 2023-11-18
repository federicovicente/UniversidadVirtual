<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include 'layouts/navbar.php'; ?>
    <?php include 'layouts/offcanvas.php'; ?>
    <div>
        <div class="container justify-content-center mt-5" style="height: 400px";>
            <h5 class=""><?= $_SESSION['user_nombre'] . ' ' . $_SESSION['user_apellido'] ?></h5>
            <h5 class=""><?= $_SESSION['user_email']?></h5>
            <h5 class=""><?= $_SESSION['user_iniciales']?></h5>
            <a href="./controllers/logout.php">Salir</a>

        </div>
    </div>
    <?php include 'layouts/footer.php'; ?>
</body>
</html>