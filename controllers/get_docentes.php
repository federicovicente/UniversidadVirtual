<?php

require('./database/database.php');
function getDocentes(){

    $conn = dataBase();

    $docentesList = $conn->prepare("SELECT * FROM docentes");

    $docentesList->execute();

    $results = $docentesList->fetchAll(PDO::FETCH_ASSOC);

    $data = serialize($results);

    return $data;
}  

?>