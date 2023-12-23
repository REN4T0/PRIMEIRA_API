<?php
    include_once("../models/charactersModel.php");

    // Importando as validações
    include_once("../rules/validCharacters.php");

    function cadastrar($data){
        $name = $data["name"];
        $age  = $data["age"];
        $gender = $data["gender"];
        $powers = $data["powers"];
        $profile = $data["profile"];
        $thumbnail = $data["thumbnail"];

        // Conferindo se o nome é muito grande
        if(nameLimitLength($name)){

            echo json_encode([
                "status" => "error",
                "msg" => "O nome é muito grande!"
            ]);

            exit;

        }



        if(ageLimit($age)){

            echo json_encode([
                "status" => "error",
                "msg" => "A idade deve estar entre 0 e 9.999.999.999 anos"
            ]);

            exit;

        }

        

        if(genderLimit($gender)){

            echo json_encode([
                "status" => "error",
                "msg" => "O gênero deve ser Masculino ou Feminino"
            ]);

            exit;

        }

        echo json_encode([
            "status" => "success",
            "msg" => "Ok!"
        ]);

        // create($data);
    }

    function buscar(){

        findAll();
    }

    function buscarEspecifico($id){

        findById($id);
    }

    function excluir($id){

        deleteById($id);
    }

    function atualizar($id, $data){

        updateById($id, $data);
    }
?>