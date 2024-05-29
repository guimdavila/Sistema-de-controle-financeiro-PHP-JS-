<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id = $_SESSION['idUsuario'];
$idTipoMov = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$idcategoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$subcategoria = isset($_GET['subcategoria']) ? $_GET['subcategoria'] : '';
$data = isset($_GET['data']) ? $_GET['data'] : '';
$desc = isset($_GET['desc']) ? $_GET['desc'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
$mesEscol = isset($_GET['mesEscol']) ? $_GET['mesEscol'] : '';
$anoEscol = isset($_GET['anoEscol']) ? $_GET['anoEscol'] : '';

if (!empty($data) && !empty($valor)) {
    atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor, $mesEscol, $anoEscol);
}

function atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor, $mesEscol, $anoEscol) {

    $pdo = Conectar();
    $sql = "INSERT INTO MOVIMENTACAO (DESCRICAO, DATA, VALOR, IDUSUARIO, IDCATEGORIA, IDSUBCATEGORIA, IDTIPOMOVIMENTACAO) 
            VALUES (:desc, :data, :valor, :id, :idcategoria, :subcategoria, :idTipoMov)";
    $stm = $pdo->prepare($sql);
    $stm->execute([
        ':desc' => $desc,
        ':data' => $data,
        ':valor' => $valor,
        ':id' => $id,
        ':idcategoria' => $idcategoria,
        ':subcategoria' => $subcategoria,
        ':idTipoMov' => $idTipoMov
    ]);

    $pdo = Conectar();

    $sql = "SELECT B.NOMECATEGORIA, C.NOMESUBCATEGORIA, A.DATA, A.VALOR, A.DESCRICAO FROM MOVIMENTACAO AS A INNER JOIN CATEGORIA AS B ON A.IDCATEGORIA = B.IDCATEGORIA INNER JOIN SUBCATEGORIA AS C ON A.IDSUBCATEGORIA = C.IDSUBCATEGORIA "
        . " WHERE A.DATA BETWEEN '".$anoEscol."".$mesEscol."01' AND '".$anoEscol."".$mesEscol."31' AND A.IDUSUARIO = $id order by A.DATA;" ;

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(0.5);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}
?>
