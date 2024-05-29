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

if (!empty($data) && !empty($valor)) {
    atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor);
}

function atualizabanco($id, $idTipoMov, $idcategoria, $subcategoria, $data, $desc, $valor) {
    try {
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
    } catch (PDOException $e) {
        // Log do erro ou tratamento apropriado
        echo 'Erro: ' . $e->getMessage();
    }
}
?>
