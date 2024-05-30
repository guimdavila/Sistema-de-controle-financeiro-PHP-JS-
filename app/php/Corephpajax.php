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


$mesEscol = isset($_GET['mesEscol']) ? $_GET['mesEscol'] : '';
$anoEscol = isset($_GET['anoEscol']) ? $_GET['anoEscol'] : '';
$realizaCalculo = isset($_GET['realizaCalculo']) ? $_GET['realizaCalculo'] : '';

if (!empty($mesEscol) && !empty($anoEscol)) {
    echo getCardsMesAno($anoEscol, $mesEscol, $id);
   
}

function getCardsMesAno($anoEscol, $mesEscol, $id){
    
    $pdo = Conectar();

    $sql = "SELECT B.NOMECATEGORIA, C.NOMESUBCATEGORIA, A.DATA, A.VALOR, A.DESCRICAO FROM MOVIMENTACAO AS A INNER JOIN CATEGORIA AS B ON A.IDCATEGORIA = B.IDCATEGORIA INNER JOIN SUBCATEGORIA AS C ON A.IDSUBCATEGORIA = C.IDSUBCATEGORIA "
        . " WHERE A.DATA BETWEEN '".$anoEscol."".$mesEscol."01' AND '".$anoEscol."".$mesEscol."31' AND A.IDUSUARIO = $id order by A.IDMOVIMENTACAO desc;" ;

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(0.5);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
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

if (!empty($data) && !empty($valor)) {
    atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor);
    var_dump($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor);
    die();
}

function atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor) {
    // Conectando ao banco de dados
    $pdo = Conectar();
    
    // Preparando a instrução SQL com parâmetros
    $sql = "INSERT INTO MOVIMENTACAO (DESCRICAO, DATA, VALOR, IDUSUARIO, IDCATEGORIA, IDSUBCATEGORIA, IDTIPOMOVIMENTACAO) VALUES ('$desc', '$data', $valor, $id, $idcategoria, $subcategoria, $idTipoMov)";
    
   return $sql;
}

////////////////////////////////////////////

if (!empty($realizaCalculo)) {
    echo resultados($anoEscol, $mesEscol, $id);
   
}

function resultados($anoEscol, $mesEscol, $id){
    
    $pdo = Conectar();

    $sql = "SELECT SUM(CASE WHEN IDTIPOMOVIMENTACAO = '1' THEN VALOR ELSE 0 END) AS POSITIVO /*, SUM(CASE WHEN IDTIPOMOVIMENTACAO = '2' THEN VALOR ELSE 0 END) AS NEGATIVO, SUM(CASE WHEN IDTIPOMOVIMENTACAO = '1' THEN VALOR ELSE -VALOR END) AS SALDO*/ "
        . " FROM MOVIMENTACAO WHERE IDUSUARIO = $id AND DATA BETWEEN '".$anoEscol."".$mesEscol."01' AND '".$anoEscol."".$mesEscol."31' " ;

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(0.5);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}