<?php
    include_once("../database/connect.php");
    
    // Função para armazenar os dados no banco de dados
    function create($data){

        $name = $data["name"];
        $age = $data["age"];
        $gender = $data["gender"];
        $powers = $data["powers"];
        $profile = $data["profile"];
        $imgPath = $data["thumbnail"];
        
        global $conn; // Tornando a variável de conexão com o banco de dados global, para que eu consiga usá-lo sem passar pelos parâmtros da função

        // Tentando armazenar os dados
        try{

            $stmt = $conn->prepare("INSERT INTO characters (`name`, age, gender, powers, `profile`, imgPath) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissss", $name, $age, $gender, $powers, $profile, $imgPath);
            $stmt->execute();

        }catch(Exception $error){

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possível armazenar os dados - $error",
            ]);
        }

        // Conferindo se a tabela foi afetada pela inserção dos dados
        if($stmt->affected_rows){

            echo json_encode([
                "status" => "success",
                "msg" => "Personagem armazenado com sucesso",
            ]);

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possível armazenar os dados devido algum erro desconhecido...",
            ]);
        }
    }




    // Função para selecionar todos os dados do banco
    function findAll(){

        global $conn;

        // Preparando a variável de resposta que será retornada ao cliente
        $response = [
            "status" => "success",
            "data" =>[

            ]
        ];

        try{

            $query = "SELECT * FROM characters";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)){
                array_push($response["data"], [
                    "_id" => intval($row["id"]),
                    "name" => $row["name"],
                    "age" => intval($row["age"]),
                    "gender" => $row["gender"],
                    "powers" => $row["powers"],
                    "profile" => $row["profile"],
                    "thumbnail" => $row["imgPath"]
                ]);
            }

        }catch(Exception $error){

            $response = [
                "status" => "error",
                "msg" => "Não foi possível buscar os dados - $error"
            ];

        }

        echo json_encode($response);
    }





    // Função para buscar por um registro específico com base em um ID
    function findById($id){

        global $conn;

        try{

            $stmt = $conn->prepare("SELECT * FROM characters WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);

            echo json_encode([
                "status" => "success",
                "data" => [
                    "_id" => $row["id"],
                    "name" => $row["name"],
                    "age" => $row["age"],
                    "gender" => $row["gender"],
                    "powers" => $row["powers"],
                    "profile" => $row["profile"],
                    "thumbnail" => $row["imgPath"],
                ]
            ]);

        }catch(Exception $error){

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possível coletar os dados do banco - $error"
            ]);

        }
    }





    function updateById($id){
        global $conn;

            echo json_encode([
                "status" => "success",
                "msg" => "Parei aqui...",
            ]);

    }





    // Função para deletar dados
    function deleteById($id){
        
        global $conn;

        try{

            $stmt = $conn->prepare("DELETE FROM characters WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

        }catch(Exception $error){
            
            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possível excluir os dados - $error"
            ]);

            exit;
        }

        if($stmt->affected_rows){

            echo json_encode([
                "status" => "success",
                "msg" => "Dados excluídos com sucesso!"
            ]);

        }else{

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possível deletar os dados do banco devido a algum erro desconhecido..."
            ]);

        }

    }

?>