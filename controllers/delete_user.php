<?php 
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $deleteUser = $conn->prepare("DELETE FROM usuarios WHERE idUsuario=:idUsuario");
    $deleteUser->bindParam(':idUsuario', $_POST['idUsuario']);

    $deleteUser->execute();


    if ($deleteUser) {
        $message = "Usuario eliminado con éxito";
        $_SESSION['success'] = $message;
    } else {
        $message = "El usuario no puede ser eliminado ya que tiene información asociada. Deberá marcarlo como inactivo";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../admin_users.php');
?>