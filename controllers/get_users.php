<?php

require('./database/database.php');
function getUsers(){

    $conn = dataBase();

    $userList = $conn->prepare("SELECT * FROM usuarios");

    $userList->execute();

    $results = $userList->fetchAll(PDO::FETCH_ASSOC);

    $data = serialize($results);

    return $data;
}  

?>