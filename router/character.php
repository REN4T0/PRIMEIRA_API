<?php
    include_once("../controller/charactersController.php");

    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Method: GET, POST, PUT, DELETE"); // Esse arquivo aceita apenas requisições para coletar (GET), cadastrar (POST), atualizar (PUT) ou excluir (DELETE) dados.
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    $method = $_SERVER["REQUEST_METHOD"]; // Estou coletando o método de solicitação que foi enviada para a API.
    $endpoint = $_GET["endpoint"]; // Estou identificando a rota, para onde os dados enviados para esta API devem ir.

    // Esse arquivo aceita apenas requisições dos métodos GET, POST e DELETE, então qualquer requisição com outro método deve dar erro
    if($method === "GET"){
        
        // Verificando os endpoints e conferindo se há a presença do ID na URL
        if($endpoint === "characters" && !$_GET["id"]){

            buscar();

        }else if($endpoint === "characters" && $_GET["id"]){

            buscarEspecifico($_GET["id"]);

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "endpoint não reconhecido",
            ]);

            exit;

        }

    }else if($method === "POST"){
        
        // Dado o método certo, iremos verificar o endpoint e então executar a ação de acordo com o método
        if($endpoint === "characters"){

            $data = json_decode(file_get_contents("php://input"), true); // Estou decodifcando os dados recebidos, pois foram enviados em JSON.
            cadastrar($data); // Enviando esses dados para a seção de tratamento dos dados - o Controller.

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "endpoint não reconhecido",
            ]);

            exit;

        }

    }else if($method === "PUT"){

        if($endpoint === "characters"){
            
            $id = $_GET["id"];
    
            if(!$id){
    
                echo json_encode([
                    "status" => "error",
                    "msg" => "Não foi possível atualizar os dados.",
                ]);
    
                exit;
    
            }

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "endpoint não reconhecido",
            ]);

            exit;

        }

        atualizar($id);

    }else if($method === "DELETE"){

        if($endpoint === "characters"){
            
            $id = $_GET["id"];
    
            if(!$id){
    
                echo json_encode([
                    "status" => "error",
                    "msg" => "Não foi possível excluir os dados.",
                ]);
    
                exit;
    
            }
    
            excluir($id);

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "endpoint não reconhecido",
            ]);

            exit;

        }

    }else{

        echo json_encode([
            "status" => "error",
            "msg" => "Método invalido"
        ]);

    }

?>