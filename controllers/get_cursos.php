<?php

require('./database/database.php');
function getCursos(){

    $conn = dataBase();

    $cursosList = $conn->prepare("SELECT c.idCurso, c.curso, c.idDocente, CONCAT (d.nombre,' ',d.apellido) as docente, c.duracion, c.certificado, c.idioma, c.precio, c.activo FROM cursos c INNER JOIN docentes d ON c.idDocente = d.idDocente");
                                        
                                        

    $cursosList->execute();

    $results = $cursosList->fetchAll(PDO::FETCH_ASSOC);

    $data = serialize($results);

    return $data;
}  

?>