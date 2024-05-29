<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id = $_SESSION['idUsuario'];
$idTipoMov = isset($_GET['tipoMov']) ? $_GET['tipoMov'] : '';
$idcategoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$subcategoria = isset($_GET['subcategoria']) ? $_GET['subcategoria'] : '';
$desc = isset($_GET['desc']) ? $_GET['desc'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';

if (!empty($data) && (!empty($valor))){
    echo atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor);

}

if (!empty($idTipoMov)) {
    echo getCategoria($idTipoMov, $id);
   
}

function getCategoria($TipoMov, $id)
{
    $pdo = Conectar();

    $sql = "SELECT idCategoria, nomeCategoria "
        . "FROM categoria "
        . "WHERE idTipoMovimentacao = $TipoMov AND (idUsuario = $id OR idUsuario IS NULL) ORDER BY nomeCategoria";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(0.5);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

if (!empty($idcategoria)) {
    echo getSubCategoria($idcategoria, $id);
}

function getSubCategoria($idcategoria, $id)
{
    $pdo = Conectar();


    $sql = "SELECT idSubCategoria, nomeSubCategoria "
        . "FROM subcategoria "
        . "WHERE idCategoria = $idcategoria AND (idUsuario = $id OR idUsuario IS NULL) ORDER BY nomesubCategoria";

    $stm1 = $pdo->prepare($sql);
    $stm1->execute();

    echo json_encode($stm1->fetchAll(PDO::FETCH_ASSOC));
    sleep(0.5);

    $pdo = null;
}

/////////////////////27-05////////////////////

//$id $idTipoMov $idcategoria $subcategoria $data $desc $valor 
//echo atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor)

function atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $valor, $desc){
    
    
    $pdo = Conectar();
    
    
    $sql = "INSERT INTO MOVIMENTACAO (DESCRICAO, DATA, VALOR, IDUSUARIO, IDCATEGORIA, IDSUBCATEGORIA, IDTIPOMOVIMENTACAO) "
    ."VALUES ('$desc', $data, $valor, $id, $idcategoria, $subcategoria, $idTipoMov)";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));

    $pdo = null;
}

////////////////////////////////////////////
