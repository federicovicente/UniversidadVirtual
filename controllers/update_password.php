<?php
    session_start();

    require('../database/database.php');

    $userData = $conn->prepare("SELECT u.contrasenia FROM usuarios u WHERE idUsuario = :idUsuario");
    $userData->bindParam(':idUsuario', $_SESSION['user_id']);
    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $results['contrasenia'])) {
        $updatePassword = $conn->prepare("UPDATE usuarios SET contrasenia = :newpassword WHERE idUsuario = :idUsuario");
        $updatePassword->bindParam(':idUsuario', $_SESSION['user_id']);
        $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $updatePassword->bindParam(':newpassword', $password);
        $updatePassword->execute();
        $message = 'Contraseña modificada';
        $_SESSION['passchanged'] =$message;
        header('Location: ../perfil.php');
    }else{
        $message = 'La contraseña ingresada es incorrecta.';
        $_SESSION['wrongpassword'] =$message;
        header('Location: ../perfil.php');
    }
?>