<?php
// Iniciar o reanudar la sesión
session_start();

// Verificar las credenciales
$user=$_POST["usuario"];
$pass=$_POST["pass"];

$conn=new mysqli("localhost","root","","universidadvirtual");
$result=$conn->query("SELECT * FROM usuarios WHERE mail='$user' AND contrasenia='$pass'");


if ($result->fetch_assoc()) {
        // Credenciales válidas, establecer un mensaje de éxito
        $_SESSION['mensaje'] = 'Inicio de sesión exitoso';
        
    } else {
        // Credenciales incorrectas, establecer un mensaje de error
        $_SESSION['mensaje'] = 'Usuario o contraseña incorrectos';
    }

    // Redirigir de nuevo a la página principal
    header("Location: index.php");
    exit();
?>
