<?php
    session_start();

    require('../database/database.php');

    $userData = $conn->prepare("SELECT * FROM usuarios");

    $userData->execute();

    $results = $userData->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION['lista_usuarios'] = serialize($results);

    header('Location: ../users_admin.php');
    
?>