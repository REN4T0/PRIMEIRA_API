<?php
    include_once("../controller/charactersController.php");

    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Method: GET, POST"); // Esse arquivo aceita apenas requisições para coletar (GET) ou cadastrar (POST) dados.
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    $method = $_SERVER["REQUEST_METHOD"]; // Estou coletando o método de solicitação que foi enviada para a API.
    $endpoint = $_GET["endpoint"]; // Estou identificando a rota, para onde os dados enviados para esta API devem ir.

    // Esse arquivo aceita apenas requisições dos métodos GET e POST, então qualquer requisição com outro método deve dar erro
    if($method === "GET"){
        
        if($endpoint === "characters"){
            buscar();
        }

    }else if($method === "POST"){
        
        // Dado o método certo, iremos verificar o endpoint e então executar a ação de acordo com o método
        if($endpoint === "characters"){

            $data = json_decode(file_get_contents("php://input"), true); // Estou decodifcando os dados recebidos, pois foram enviados em JSON.
            cadastrar($data); // Enviando esses dados para a seção de tratamento dos dados - o Controller.
        }

    }else{
        echo json_encode([
            "status" => "error",
            "msg" => "Método invalido"
        ]);
    }

?>