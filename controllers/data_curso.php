<?php

require('./database/database.php');
function dataCurso($idCurso){

    $conn = dataBase();
    

    $cursoData = $conn->prepare("SELECT c.idCurso, 
                                        c.idDocente, 
                                        CONCAT (d.nombre,' ',d.apellido) as docente,
                                        c.curso, 
                                        c.subTitulo, 
                                        c.descripcion,
                                        c.duracion, 
                                        c.certificado, 
                                        c.idioma, 
                                        c.precio, 
                                        c.img, 
                                        c.activo 
                                        FROM cursos c 
                                        INNER JOIN docentes d ON c.idDocente = d.idDocente 
                                        WHERE c.idCurso = :idCurso");
    
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