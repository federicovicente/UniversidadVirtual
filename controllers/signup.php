<?php
    session_start();


    require('../database/database.php');

    //Verificar si el email existe
    $userData = $conn->prepare("SELECT * FROM usuarios WHERE email =:email");

    $userData->bindParam(':email', $_POST['email']);

    $userData->execute();

    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if($results) {
        $message = 'El correo electrónico ingresado ya existe.';
        $_SESSION['login'] =$message;
        header('Location: ../index.php');
    }else{

        $sql = 'INSERT INTO usuarios (nombre, apellido, email, contrasenia, administrador, activo) VALUES (:nombre, :apellido, :email, :contrasenia, :administrador, :activo)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['name']);
        $stmt->bindParam(':apellido', $_POST['surname']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':contrasenia', $password);
        $noAdmin = 0;
        $stmt->bindParam(':administrador', $noAdmin);
        $usuarioActivo = 1;
        $stmt->bindParam(':activo', $usuarioActivo);

        if($stmt->execute()){
            $message = "Usuario registrado";
            // Creo una variable de sesión
            $_SESSION['registro'] = $message;
            header("Location: ../index.php");  
        }else{
            $message = "No ha sido posible egistar al usuario";
            // Creo una variable de sesión
            $_SESSION['registro'] = $message;
            header("Location: ../index.php");
    }
}
?>