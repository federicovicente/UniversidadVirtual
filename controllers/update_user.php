<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $updateData = $conn->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, administrador = :administrador, activo = :activo WHERE idUsuario = :idUsuario");
    
    $updateData->bindParam(':idUsuario', $_POST['idUsuario']);
    $updateData->bindParam(':nombre', $_POST['nombre']);
    $updateData->bindParam(':apellido', $_POST['apellido']);
    $updateData->bindParam(':email', $_POST['email']);
    $updateData->bindParam(':administrador', $_POST['administrador']);
    $updateData->bindParam(':activo', $_POST['activo']);

    $updateData->execute();

    if($updateData->execute()){
        $message = "Los cambos han sido registrados con éxito!";
        $_SESSION['success'] = $message;
    }else{
        $message = "No se han podido registrar los cambios";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../users_admin.php');

?>