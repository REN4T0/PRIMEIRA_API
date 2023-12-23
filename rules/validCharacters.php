<?php

    // Neste arquivo, estarão presente as validações do dados enviados, antes de enviar ao banco de dados.
    // Função para verificar se o nome é grande demais
    function nameLimitLength($name){
        if(strlen($name) > 250){
            return true;
        }

        return false;
    }




    // Função para verificar se a idade está correta
    function ageLimit($age){
        if($age > 9999999999 || $age < 0){
            return true;
        }

        return false;
    }





    // Função para verificar se o gênero do personagem está certo
    function genderLimit($gender){
        if($gender === "M" || $gender === "F"){
            return false;
        }
        
        return true;
    }

?>
