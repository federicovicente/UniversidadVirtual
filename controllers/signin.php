<?php
    // Verificar si usuario y contraseña son correctos
    session_start();

    // aceder a la base de datos
    require('../database/database.php');

    $userData = $conn->prepare("SELECT * FROM usuarios WHERE email =:email");

    // recoger la informacion (el email)
    $userData->bindParam(':email', $_POST['email']);

    $userData->execute();
    
    //cargo las variables del usuario si es que existe
    $results = $userData->fetch(PDO::FETCH_ASSOC);

    //Si $result viene vacío es que el mail no está registrado. Si me devuelve algo es que el mail existe y si existe verifico la contraseña
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
        $message = 'El email ingresado no está registrado.';
        $_SESSION['login'] =$message;
        header('Location: ../index.php');
    }




?>

