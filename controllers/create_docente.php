<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $userData = $conn->prepare("SELECT * FROM docentes WHERE email =:email");

    $userData->bindParam(':email', $_POST['email']);

    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if($results) {
        $message = 'El correo electrónico ingresado ya existe.';
        $_SESSION['danger'] = $message;
        header('Location: ../docentes_admin.php');
    }else{

        $sql = 'INSERT INTO docentes (nombre, apellido, email, activo) VALUES (:nombre, :apellido, :email, :activo)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['name']);
        $stmt->bindParam(':apellido', $_POST['surname']);
        $stmt->bindParam(':email', $_POST['email']);
        $usuarioActivo = 1;
        $stmt->bindParam(':activo', $usuarioActivo);

        if($stmt->execute()){
            $message = "Docente registrado";
            $_SESSION['success'] = $message;
            header('Location: ../docentes_admin.php');
        }else{
            $message = "No ha sido posible registar al docente";
            $_SESSION['danger'] = $message;
            header('Location: ../admin_docentes.php');
    }
}
?>