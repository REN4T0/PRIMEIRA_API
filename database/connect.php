<?php
    $hostname = "api-server2.mysql.database.azure.com";
    $username = "Bazinga346";
    $password = "}6sh>JZ[w/GN!5yfiLk9C_";
    $database = "newjourneys";
    $port = 3306;

    // Tentando conectar no banco de dados
    try{
        $conn = new mysqli($hostname, $username, $password, $database, $port, MYSQL_CLIENT_SSL);

    }catch(Exception $error){
        echo json_encode([
            "status" => "error",
            "msg" => "Não foi possível conectar no banco de dados - $error"
        ]);
    }
?>
