<?php
    include_once("../models/charactersModel.php");
    function cadastrar($data){

        create($data);
    }

    function buscar(){

        findAll();
    }
?>