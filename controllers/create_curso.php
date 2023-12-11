<?php
session_start();

require('../database/database.php');

$conn = dataBase();

$cursoData = $conn->prepare("SELECT * FROM cursos WHERE curso =:curso");

$cursoData->bindParam(':curso', $_POST['curso']);

$cursoData->execute();

$results = $cursoData->fetch(PDO::FETCH_ASSOC);

if ($results) {
    $message = 'El nombre del curso ya existe';
    $_SESSION['danger'] = $message;
    header('Location: ../c_curso.php');
} else {

    $sql = 'INSERT INTO cursos (idDocente, curso, subTitulo, descripcion, duracion, certificado, idioma, precio, img, activo) VALUES (:idDocente, :curso, :subTitulo, :descripcion, :duracion, :certificado, :idioma, :precio, :img, :activo)';

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idDocente', $_POST['docente']);
    $stmt->bindParam(':curso', $_POST['curso']);
    $stmt->bindParam(':subTitulo', $_POST['subTitulo']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    $stmt->bindParam(':duracion', $_POST['duracion']);
    $stmt->bindParam(':certificado', $_POST['certificado']);

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
    $stmt->bindParam(':idioma', $idioma);

    $stmt->bindParam(':precio', $_POST['precio']);

    if(isset($_FILES['archivo']) && !empty($_FILES['archivo']['name'])){

        $dir = "../files/";
        $maxSize = 500; 
        $extensions = ["jpg", "pdf"];
        $ruta = "./files/";
    
        $newName = str_replace(" ", "_", $_POST['curso']);
    
        $nameFile = explode(".", $_FILES['archivo']['name']);
    
        $extensionFile = strtolower(end($nameFile));
        
        $ruta_carga = $dir . $newName . "." . $extensionFile;
        $img = $ruta . $newName . "." . $extensionFile;
    
        $stmt->bindParam(':img', $img);

        if (in_array($extensionFile, $extensions) && $_FILES['archivo']['size'] < ($maxSize * 1024)) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_carga);
        } else {
            $message = "La imagen no pudo ser guardad";
            $_SESSION['success2'] = $message;
        }
    }else{
        $imgNull = "";
        $stmt->bindParam(':img', $imgNull);
    }

   

    $cursoActivo = 1;
    $stmt->bindParam(':activo', $cursoActivo);

    if ($stmt->execute()) {
        $message = "Curso registrado";
        $_SESSION['success'] = $message;
        header('Location: ../admin_cursos.php');
    } else {
        $message = "No ha sido posible registar el curso";
        $_SESSION['danger'] = $message;
        header('Location: ../admin_cursos.php');
    }
}
?>
