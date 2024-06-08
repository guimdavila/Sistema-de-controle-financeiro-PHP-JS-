<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id                     = $_SESSION['idUsuario'];
$NovoNomeCategoria          = $_POST['nNovoNomeCategoria'];
$AlteraIdCategoria          = $_POST['nAlteraIdCategoria'];


$nAlteraIdSubCategoria          = $_POST['nAlteraIdSubCategoria'];
$nNovoNomeSubCategoria          = $_POST['nNovoNomeSubCategoria'];
$NovoIdCategoriaVinculada          = $_POST['nNovoNomeCategoriaVinculada'];

if (!empty($nNovoNomeSubCategoria)) {
    alteraNomeSubCategoria($id, $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria  );
}

function alteraNomeSubCategoria($id, $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria  ) {
    
    include("conexao.php");
    
    $sql = "UPDATE SUBCATEGORIA SET NOMESUBCATEGORIA = ?, NOMESUBCATEGORIA = ? WHERE IDCATEGORIA = ? AND IDUSUARIO = ?";
    
    $stmt = mysqli_prepare($conexao, $sql);
      
    mysqli_stmt_bind_param($stmt, "sii", $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria, $id);
    
    $executar = mysqli_stmt_execute($stmt);
    
    if (!$executar) {
        echo "Erro ao executar a declaração: " . mysqli_error($conexao);
        exit;
    }
    
    mysqli_stmt_close($stmt);

    header('location: ../categoriaSubcategoria.php');
}



if (!empty($NovoNomeCategoria)) {
    alteraNomeCategoria($id, $NovoNomeCategoria, $AlteraIdCategoria);
}

function alteraNomeCategoria($id, $NovoNomeCategoria, $AlteraIdCategoria) {
    
    include("conexao.php");
    
    $sql = "UPDATE CATEGORIA SET NOMECATEGORIA = ? WHERE IDCATEGORIA = ? AND IDUSUARIO = ?";
    
    $stmt = mysqli_prepare($conexao, $sql);
   
    mysqli_stmt_bind_param($stmt, "sii", $NovoNomeCategoria, $AlteraIdCategoria, $id);
    
    $executar = mysqli_stmt_execute($stmt);
    
    if (!$executar) {
        echo "Erro ao executar a declaração: " . mysqli_error($conexao);
        exit;
    }
    
    mysqli_stmt_close($stmt);

    header('location: ../categoriaSubcategoria.php');
}
