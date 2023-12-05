<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $userData = $conn->prepare("SELECT * FROM usuarios WHERE email =:email");


    $userData->bindParam(':email', $_POST['email']);

    $userData->execute();
    
    $results = $userData->fetch(PDO::FETCH_ASSOC);

    if($results) {
        if(password_verify($_POST['password'], $results['contrasenia'])) {
                $_SESSION['user_id'] = $results['idUsuario'];
                $_SESSION['user_nombre'] = $results['nombre'];
                $inicial_nombre = isset($_SESSION['user_nombre']) ? $_SESSION['user_nombre'][0] : '';
                $_SESSION['user_apellido'] = $results['apellido'];
                $inicial_apellido = isset($_SESSION['user_apellido']) ? $_SESSION['user_apellido'][0] : '';
                $_SESSION['user_email'] = $results['email'];
                $_SESSION['user_administrador'] = $results['administrador'];
                $_SESSION['user_activo'] = $results['activo'];
                $_SESSION['user_iniciales'] = $inicial_nombre . $inicial_apellido;
                header('Location: ../index.php');
        }else{
                $message = 'Email y/o contraseña incorrectos. Por favor vuelva a intentarlo.';
                $_SESSION['login'] =$message;
                header('Location: ../index.php');
        }
    }else{
        $message = 'El email ingresado no se encuentra registrado.';
        $_SESSION['login'] =$message;
        header('Location: ../index.php');
    }




?>

