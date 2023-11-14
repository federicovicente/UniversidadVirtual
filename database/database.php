<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'universidadVirtual';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    }catch(PDOException $e){
        die('Ha fallado la conexión' . $e->getMessage());
    }

?>