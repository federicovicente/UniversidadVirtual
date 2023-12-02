<?php
    session_start();

    require('../database/database.php');

    $userData = $conn->prepare("SELECT * FROM usuarios WHERE idUsuario = :idUsuario");

    $userData->bindParam(':idUsuario', $_SESSION['user_id']);

    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user_id'] = $results['idUsuario'];
    $_SESSION['user_nombre'] = $results['nombre'];
    $inicial_nombre = isset($_SESSION['user_nombre']) ? $_SESSION['user_nombre'][0] : '';
    $_SESSION['user_apellido'] = $results['apellido'];
    $inicial_apellido = isset($_SESSION['user_apellido']) ? $_SESSION['user_apellido'][0] : '';
    $_SESSION['user_email'] = $results['email'];
    $_SESSION['user_administrador'] = $results['administrador'];
    $_SESSION['user_activo'] = $results['activo'];
    $_SESSION['user_iniciales'] = $inicial_nombre . $inicial_apellido;
    header('Location: ../perfil.php');

?>