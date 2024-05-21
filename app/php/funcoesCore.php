<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


$id                     = $_SESSION['idUsuario'];
$tipoMovimentacao          = $_POST['nTipoMovimentacao'];


if($tipoMovimentacao != ""){

    SolicitaCategoriasCore($id, $tipoMovimentacao);
}


$phpTipoMovimentacao = $_POST['selecaoTipo'];

if($phpTipoMovimentacao != ""){

    include("conexao.php");

    $sql = "SELECT NOMECATEGORIA FROM CATEGORIA WHERE (idusuario = $id OR idusuario IS NULL) and idTipoMovimentacao = $phpTipoMovimentacao;";

    $resultSql = mysqli_query($conexao, $sql);

}












function SolicitaCategoriasCore($id, $tipoMovimentacao){


    include("conexao.php");

    $sql = "SELECT NOMECATEGORIA, IDCATEGORIA FROM CATEGORIA WHERE (idusuario = $id OR idusuario IS NULL;";

    $resultSql = mysqli_query($conexao, $sql);

    foreach ($resultSql as $coluna) {
        
        $lista .= "<option value= '". $coluna["IDCATEGORIA"] . "'>".$coluna["NOMESUBCATEGORIA"]."</option>";
    }

    return $lista;
}



