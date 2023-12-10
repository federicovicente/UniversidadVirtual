<?php

require('./database/database.php');
function dataCurso($idCurso){

    $conn = dataBase();
    
    $cursoData = $conn->prepare("SELECT * FROM cursos WHERE idCurso = :idCurso");
    $cursoData->bindParam(':idCurso', $idCurso);                                                                   
    $cursoData->execute();

    $results = $cursoData->fetch(PDO::FETCH_ASSOC);

    $dataCurso = serialize($results);

    return $dataCurso;
}  

function getDocentes(){

    $conn = dataBase();

    $docentesList = $conn->prepare("SELECT * FROM docentes");

    $docentesList->execute();

    $results = $docentesList->fetchAll(PDO::FETCH_ASSOC);

    $docentes = serialize($results);

    return $docentes;
} 

?>