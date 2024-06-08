<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id                     = $_SESSION['idUsuario'];
$nAlteraIdSubCategoria          = $_POST['nAlteraIdSubCategoria'];
$nNovoNomeSubCategoria          = $_POST['nNovoNomeSubCategoria'];
$NovoIdCategoriaVinculada          = $_POST['nNovoNomeCategoriaVinculada'];

if (!empty($nNovoNomeSubCategoria)) {
    alteraNomeSubCategoria($id, $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria  );
}

function alteraNomeSubCategoria($id, $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria  ) {
    
    include("conexao.php");
    
    $sql = "UPDATE SUBCATEGORIA SET NOMESUBCATEGORIA = ?, IDCATEGORIA = ? WHERE IDSUBCATEGORIA = ? AND IDUSUARIO = ?";
    
    $stmt = mysqli_prepare($conexao, $sql);
      
    mysqli_stmt_bind_param($stmt, "siii", $nNovoNomeSubCategoria, $NovoIdCategoriaVinculada, $nAlteraIdSubCategoria, $id);
    
    $executar = mysqli_stmt_execute($stmt);
    
    if (!$executar) {
        echo "Erro ao executar a declaração: " . mysqli_error($conexao);
        exit;
    }
    
    mysqli_stmt_close($stmt);

    header('location: ../categoriaSubcategoria.php');
}
