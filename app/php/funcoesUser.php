<?php

function nomeUsuario($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT nomeUsuario FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["nomeUsuario"];
        }
    }

    return $resp;
}

function fotoUsuario($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT fotoPerfil FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["fotoPerfil"];
        }
    }

    return $resp;
}
