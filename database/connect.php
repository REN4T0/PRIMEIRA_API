<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "newjourneys";

    // Tentando conectar no banco de dados
    try{
        $conn = new mysqli($hostname, $username, $password, $database);

    }catch(Exception $error){
        echo json_encode([
            "status" => "error",
            "msg" => "Não foi possível conectar no banco de dados - $error"
        ]);
    }
?>