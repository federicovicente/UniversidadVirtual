<?php 
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $deleteDocente = $conn->prepare("DELETE FROM docentes WHERE idDocente=:idDocente");
    $deleteDocente->bindParam(':idDocente', $_POST['idDocente']);

    $deleteDocente->execute();


    if ($deleteDocente) {
        $message = "Docente eliminado con éxito";
        $_SESSION['success'] = $message;
    } else {
        $message = "El docente no puede ser eliminado ya que tiene información asociada. Deberá marcarlo como inactivo";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../docentes_admin.php');
?>