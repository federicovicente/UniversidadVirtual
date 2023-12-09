<?php 
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $deleteCurso = $conn->prepare("DELETE FROM cursos WHERE idcurso=:idCurso");
    $deleteCurso->bindParam(':idCurso', $_POST['idCurso']);

    $deleteCurso->execute();


    if ($deleteCurso) {
        $message = "Curso eliminado con éxito";
        $_SESSION['success'] = $message;
    } else {
        $message = "El curso no puede ser eliminado ya que tiene información asociada. Deberá marcarlo como inactivo";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../admin_cursos.php');
?>