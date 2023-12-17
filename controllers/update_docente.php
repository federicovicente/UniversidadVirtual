<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $updateData = $conn->prepare("UPDATE docentes SET nombre = :nombre, apellido = :apellido, email = :email, activo = :activo WHERE idDocente = :idDocente");
    
    $updateData->bindParam(':idDocente', $_POST['idDocente']);
    $updateData->bindParam(':nombre', $_POST['nombre']);
    $updateData->bindParam(':apellido', $_POST['apellido']);
    $updateData->bindParam(':email', $_POST['email']);
    $activo = isset($_POST['activo']) ? $_POST['activo'] : 0;
    $updateData->bindParam(':activo', $activo);

    $updateData->execute();

    if($updateData->execute()){
        $message = "Los cambos han sido registrados con éxito!";
        $_SESSION['success'] = $message;
    }else{
        $message = "No se han podido registrar los cambios";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../admin_docentes.php');

?>