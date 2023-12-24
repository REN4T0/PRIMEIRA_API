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



        // Antes de cadastrar, serão feitas as vailidações
        // Conferindo se o nome é muito grande
        if(nameLimitLength($name)){

            echo json_encode([
                "status" => "error",
                "msg" => "O nome é muito grande"
            ]);

            exit;

        }


        
        // Conferindo se a idade está correta
        if(ageLimit($age)){

            echo json_encode([
                "status" => "error",
                "msg" => "A idade deve estar entre 0 e 9.999.999.999 anos"
            ]);

            exit;

        }

        

        // Conferindo se o gênero está correta
        if(genderLimit($gender)){

            echo json_encode([
                "status" => "error",
                "msg" => "O gênero deve ser Masculino ou Feminino"
            ]);

            exit;

        }



        // Conferindo o tamanho do texto sobre os poderes
        if(powersLimitLength($powers)){
            
            echo json_encode([
                "status" => "error",
                "msg" => "A descrição dos poderes está muito grande"
            ]);

            exit;
        }



        // Conferindo o tamanho do texto de perfil
        if(profileLimitLength($profile)){

            echo json_encode([
                "status" => "error",
                "msg" => "A descrição do perfil está muito grande"
            ]);

            exit;

        }



        // Conferindo o tamanho do link da imagem
        if(thumbLimitLength($thumbnail)){

            echo json_encode([
                "status" => "error",
                "msg" => "O link da imagem ficou muito grande"
            ]);

            exit;


        }

        create($data);
    }





    function buscar(){

        findAll();
    }





    function buscarEspecifico($id){
        
        // Nessa função, existe um parâmetro que outras funçôes vão usar para verificar se o ID existe. Como, nesse caso, não existe essa solicitação, esse parâmetro vai ser nulo
        findById($id, null);
    }





    function atualizar($id, $data){

        // Validando os dados antes de atualizar o registro no banco de dados
        // Pedindo para a função de coletar dados pelo ID verificar para mim se o ID que foi enviado existe
        if(!findById($id, "verifica")){

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possivel atualizar, porque esse personagem não existe",
            ]);

            exit;

        }



        // Validado o ID, agora os dados serão conferidos também
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
                "msg" => "O nome é muito grande"
            ]);

            exit;

        }


        
        // Conferindo se a idade está correta
        if(ageLimit($age)){

            echo json_encode([
                "status" => "error",
                "msg" => "A idade deve estar entre 0 e 9.999.999.999 anos"
            ]);

            exit;

        }

        

        // Conferindo se o gênero está correta
        if(genderLimit($gender)){

            echo json_encode([
                "status" => "error",
                "msg" => "O gênero deve ser Masculino ou Feminino"
            ]);

            exit;

        }



        // Conferindo o tamanho do texto sobre os poderes
        if(powersLimitLength($powers)){
            
            echo json_encode([
                "status" => "error",
                "msg" => "A descrição dos poderes está muito grande"
            ]);

            exit;
        }



        // Conferindo o tamanho do texto de perfil
        if(profileLimitLength($profile)){

            echo json_encode([
                "status" => "error",
                "msg" => "A descrição do perfil está muito grande"
            ]);

            exit;

        }



        // Conferindo o tamanho do link da imagem
        if(thumbLimitLength($thumbnail)){

            echo json_encode([
                "status" => "error",
                "msg" => "O link da imagem ficou muito grande"
            ]);

            exit;

        }

        updateById($id, $data);
    }





    function excluir($id){

        // Pedindo para a função de coletar dados pelo ID verificar para mim se o ID que foi enviado existe
        if(!findById($id, "verifica")){

            echo json_encode([
                "status" => "error",
                "msg" => "Não foi possivel excluir, porque esse personagem não existe",
            ]);

            exit;

        }

        deleteById($id);
    }





?>