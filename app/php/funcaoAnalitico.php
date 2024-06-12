<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id = $_SESSION['idUsuario'];

function qtdCategorias(){
    
    $qtdCategorias = 0;

    include("conexao.php");

    $sql = "SELECT COUNT(idCategoria) AS qtdCategorias FROM categoria;";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $qtdCategorias = $coluna['qtdCategorias'];
        }        
    }
    
    return $qtdCategorias;
}

function qtdSubCategoria(){
    
    $qtdSubCategoria = 0;

    include("conexao.php");

    $sql = "SELECT COUNT(idSubCategoria) AS subcategoria FROM subcategoria;";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $qtdSubCategoria = $coluna['subcategoria'];
        }        
    }
    
    return $qtdSubCategoria;
}

//Investimentos

function totalInvestimento($id){
    
    $totalInvestido = 0;

    include("conexao.php");

    $sql = "WITH SomaCategorias AS (SELECT IDCATEGORIA, SUM(VALOR) AS SomaValor FROM MOVIMENTACAO WHERE IDCATEGORIA IN (21, 23) AND idUsuario = $id GROUP BY IDCATEGORIA) SELECT (SELECT SomaValor FROM SomaCategorias WHERE IDCATEGORIA = 21) - (SELECT SomaValor FROM SomaCategorias WHERE IDCATEGORIA = 23) AS Saldo;";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $totalInvestido = $coluna['Saldo'];
        }        
    }
    
    return $totalInvestido;
}

function labelsInvestimentos(){
    
    $labelsInvestimento = '';
    $aspasDuplas = '"';

    include("conexao.php");

    $sql = "select mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria, sum(mov.valor) as Valor from movimentacao mov inner join subcategoria sub on sub.idSubCategoria = mov.idSubCategoria where mov.idCategoria in (21,23) group by mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $labelsInvestimento = $coluna['NOMESUBCATEGORIAS'];
        }        
    }   
    return $labelsInvestimento;
}




function ValoresInvestimentos(){
    
    $totaisInvestidos = '';
    $aspasDuplas = '"';

    include("conexao.php");

    $sql = "select mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria, sum(mov.valor) as Valor from movimentacao mov inner join subcategoria sub on sub.idSubCategoria = mov.idSubCategoria where mov.idCategoria in (21,23) group by mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $totaisInvestidos = $coluna['valor'];
        }        
    }   
    return $totaisInvestidos;
}


