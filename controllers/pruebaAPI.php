<?php
    session_start();

    require('../database/database.php');

    $conn = dataBase();

    $userList = $conn->prepare("SELECT * FROM usuarios");

    $userList->execute();

    $results = $userList->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION['lista_usuarios'] = serialize($results);
    
    header('Location: ../users_admin.php');
?>