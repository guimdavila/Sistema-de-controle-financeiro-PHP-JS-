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

function coletaPrimeiraPalavra($phrase) {
    // Use strtok para dividir a string usando um espaço como delimitador
    $primeiraPalavra = strtok($phrase, " ");
    
    // Retorne a primeira palavra
    return $primeiraPalavra;
}

function primeiroNomeUsuario($id){

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

             
            $resp = coletaPrimeiraPalavra($coluna["nomeUsuario"]);
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

function converterDataGregoriano($dateString) {

    $date = new DateTime($dateString);
    
    $formattedDate = $date->format('d/m/Y');

    return $formattedDate;
}

function DataNasc($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT dataNasc FROM usuario WHERE idUsuario = $id;";
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
            $resp = $coluna["dataNasc"];

            $resp = converterDataGregoriano($resp);

        }
    }

    return $resp;
}

function FormatarTelefone($telefone) {

    if (preg_match('/^(\d{2})(\d{5})(\d{4})$/', $telefone, $matches)) {

        $telefoneFormatado = sprintf('(%s) %s-%s', $matches[1], $matches[2], $matches[3]);
        return $telefoneFormatado;
    } else {

        return $telefone;
    }
}

function Telefone($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT telefone FROM usuario WHERE idUsuario = $id;";
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
            $resp = $coluna["telefone"];

            $resp = FormatarTelefone($resp);

        }
    }

    return $resp;
}

function formatarCPF ($cpf){
    if(preg_match('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', $cpf, $matches)){
        $cpfFormatado = sprintf('%s.%s.%s-%s', $matches[1],$matches[2],$matches[3],$matches[4]);
        return $cpfFormatado;
    }else{
        return $cpf;
    }
}

function cpf($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT cpf FROM usuario WHERE idUsuario = $id;";
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
            $resp = $coluna["cpf"];

            $resp = formatarCPF($resp);

        }
    }

    return $resp;
}

function email($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT email FROM usuario WHERE idUsuario = $id;";
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
            $resp = $coluna["email"];


        }
    }

    return $resp;
}

function sexo($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT sexo FROM usuario WHERE idUsuario = $id;";
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
            $resp = $coluna["sexo"];


        }
    }

    return $resp;
}

function coabitante($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT a.nomeCoabitante from coabitanteusuario as a inner join usuario as b on a.idUsuarioPrincipal = b.idUsuario where b.idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array[] = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        /*foreach ($array[$linha] as $coluna) {
            //***Verificar os dados da consulta SQL
            array_push($resp, $coluna["nomeCoabitante"]);


        }*/
    }

    return $array;
}

function editarUsuario($id){

    $emEdicao = 1;

    

    
}


?>