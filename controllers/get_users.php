<?php

    $userList = $conn->prepare("SELECT * FROM usuarios");

    $userList->execute();

    $results = $userList->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION['lista_usuarios'] = serialize($results);

?>