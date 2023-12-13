<?php
function dataBase(){
    $server = 'localhost'; 
    $username = 'root'; //id21455833_root
    $password = ''; //Federicov123.
    $database = 'universidadVirtual'; //id21455833_universidadvirtual

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    }catch(PDOException $e){
        die('Ha fallado la conexión' . $e->getMessage());
    }

    return $conn;
}
?>