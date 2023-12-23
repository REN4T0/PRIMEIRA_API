<?php
    include_once("../models/charactersModel.php");
    function cadastrar($data){

        create($data);
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

    function atualizar($id){

        updateById($id);
    }
?>