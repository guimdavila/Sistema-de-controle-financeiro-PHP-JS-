<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');


$id = $_SESSION['idUsuario'];
$mesEscol = isset($_GET['mesEscol']) ? $_GET['mesEscol'] : '';
$anoEscol = isset($_GET['anoEscol']) ? $_GET['anoEscol'] : '';
$idMovimentacaoExclusao = isset($_GET['idMovimentacaoExclusao']) ? $_GET['idMovimentacaoExclusao'] : '';

if (!empty($idMovimentacaoExclusao)) {
    excluiMovimentacao($anoEscol, $mesEscol, $idMovimentacaoExclusao, $id);
}

function excluiMovimentacao($anoEscol, $mesEscol, $idMovimentacaoExclusao, $id) {
        $pdo = Conectar();
        
        $sql = "DELETE FROM movimentacao WHERE IDMOVIMENTACAO = $idMovimentacaoExclusao AND IDUSUARIO = $id";
        $stm = $pdo->prepare($sql);
        $stm->execute();

        $pdo = Conectar();

        $sql = "SELECT B.NOMECATEGORIA, C.NOMESUBCATEGORIA, A.DATA, A.VALOR, A.DESCRICAO, A.IDTIPOMOVIMENTACAO FROM MOVIMENTACAO AS A INNER JOIN CATEGORIA AS B ON A.IDCATEGORIA = B.IDCATEGORIA INNER JOIN SUBCATEGORIA AS C ON A.IDSUBCATEGORIA = C.IDSUBCATEGORIA "
        . " WHERE A.DATA BETWEEN '".$anoEscol."".$mesEscol."01' AND '".$anoEscol."".$mesEscol."31' AND A.IDUSUARIO = $id order by A.IDMOVIMENTACAO desc;" ;
        $stm = $pdo->prepare($sql);
        $stm->execute();

        sleep(0.5);

        echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        $pdo = null;

    }

?>