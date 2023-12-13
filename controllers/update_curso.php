<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $updateCurso = $conn->prepare("UPDATE cursos SET idDocente = :idDocente, curso = :curso, subTitulo = :subTitulo, descripcion = :descripcion, duracion = :duracion, certificado = :certificado, idioma = :idioma, precio = :precio, activo = :activo WHERE idCurso = :idCurso");
    
    $updateCurso->bindParam(':idCurso', $_POST['idCurso']);
    $updateCurso->bindParam(':idDocente', $_POST['docente']);
    $updateCurso->bindParam(':curso', $_POST['curso']);
    $updateCurso->bindParam(':subTitulo', $_POST['subTitulo']);
    $updateCurso->bindParam(':descripcion', $_POST['descripcion']);
    $updateCurso->bindParam(':duracion', $_POST['duracion']);
    $updateCurso->bindParam(':certificado', $_POST['certificado']);

    if (isset($_POST['espanol'])) {
        $_idioma .= $_POST['espanol'] . ' ';
    }
    if (isset($_POST['ingles'])) {
        $_idioma .= $_POST['ingles'] . ' ';
    }
    if (isset($_POST['portugues'])) {
        $_idioma .= $_POST['portugues'] . ' ';
    }
    $idioma = trim($_idioma);
    $updateCurso->bindParam(':idioma', $idioma);

    $updateCurso->bindParam(':precio', $_POST['precio']);
    $updateCurso->bindParam(':activo', $_POST['cursoActivo']);


    $updateCurso->execute();

    
    

    if(isset($_FILES['archivo']) && !empty($_FILES['archivo']['name'])){
       
        $updateImg = $conn->prepare("UPDATE cursos SET img = :img WHERE idCurso = :idCurso");

        $updateImg->bindParam(':idCurso', $_POST['idCurso']);

        $dir = "../files/";
        $maxSize = 500; 
        $extensions = ["jpg", "pdf"];
        $ruta = "./files/";
    
        $newName = str_replace(' ', '_', $_POST['curso']);
        $newName = preg_replace("/[^a-zA-Z0-9_]/", "", $newName);
    
        $nameFile = explode(".", $_FILES['archivo']['name']);
    
        $extensionFile = strtolower(end($nameFile));
        
        $ruta_carga = $dir . $newName . "." . $extensionFile;
        $img = $ruta . $newName . "." . $extensionFile;
    
        
        if (in_array($extensionFile, $extensions) && $_FILES['archivo']['size'] < ($maxSize * 1024)) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_carga);
        } else {
            $message = "La imagen no pudo ser guardad";
            $_SESSION['success2'] = $message;
        }

        $updateImg->bindParam(':img', $img);

        $updateImg->execute();

    }

    


    if($updateCurso->execute()){
        $message = "Los cambos han sido registrados con éxito!";
        $_SESSION['success'] = $message;
    }else{
        $message = "No se han podido registrar los cambios";
        $_SESSION['danger'] = $message;
    }

    header('Location: ../admin_cursos.php');

?>