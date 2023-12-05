<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $userData = $conn->prepare("SELECT * FROM usuarios WHERE email =:email");

    $userData->bindParam(':email', $_POST['email']);

    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if($results) {
        $message = 'El correo electrónico ingresado ya existe.';
        $_SESSION['danger'] = $message;
        header('Location: ../users_admin.php');
    }else{

        $sql = 'INSERT INTO usuarios (nombre, apellido, email, contrasenia, administrador, activo) VALUES (:nombre, :apellido, :email, :contrasenia, :administrador, :activo)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['name']);
        $stmt->bindParam(':apellido', $_POST['surname']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasenia', $password);
        $administrador = isset($_POST['administrador']) ? 1 : 0;
        $stmt->bindParam(':administrador', $administrador);
        $usuarioActivo = 1;
        $stmt->bindParam(':activo', $usuarioActivo);

        if($stmt->execute()){
            $message = "Usuario registrado";
            $_SESSION['success'] = $message;
            header('Location: ../users_admin.php');
        }else{
            $message = "No ha sido posible registar al usuario";
            $_SESSION['danger'] = $message;
            header('Location: ../users_admin.php');
    }
}
?>