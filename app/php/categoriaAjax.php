<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id = $_SESSION['idUsuario'];
$idCategoriaEditar = isset($_GET['idEditarCategoria']) ? $_GET['idEditarCategoria'] : '';

$idEditarSubCategoria = isset($_GET['idEditarSubCategoria']) ? $_GET['idEditarSubCategoria'] : '';

if (!empty($idEditarSubCategoria)) {
    echo chamaSubCategoria($idEditarSubCategoria, $id);
   
}
function chamaSubCategoria($idEditarSubCategoria, $id) {
    
    $pdo = Conectar();

    $sql1 = "SELECT A.NOMESUBCATEGORIA, A.IDSUBCATEGORIA, B.IDTIPOMOVIMENTACAO, A.IDUSUARIO, B.IDCATEGORIA, B.NOMECATEGORIA
             FROM SUBCATEGORIA AS A 
             INNER JOIN CATEGORIA AS B ON A.IDCATEGORIA = B.IDCATEGORIA 
             WHERE A.IDSUBCATEGORIA = :idEditarSubCategoria AND (A.idusuario = :id OR A.idusuario IS NULL)";

    $stm1 = $pdo->prepare($sql1);
    $stm1->bindParam(':idEditarSubCategoria', $idEditarSubCategoria, PDO::PARAM_INT);
    $stm1->bindParam(':id', $id, PDO::PARAM_INT);
    $stm1->execute();
    $result1 = $stm1->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT NOMECATEGORIA, IDCATEGORIA 
             FROM CATEGORIA 
             WHERE (idusuario = :id OR idusuario IS NULL)";

    $stm2 = $pdo->prepare($sql2);
    $stm2->bindParam(':id', $id, PDO::PARAM_INT);
    $stm2->execute();
    $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);

    $result = [
        'subcategorias' => $result1,
        'categorias' => $result2,
    ];

    sleep(0.5);

    echo json_encode($result);
    $pdo = null;
}


/*function chamaTodasCategoria($id){
    
    $pdo = Conectar();

    $sql = "SELECT NOMECATEGORIA, IDCATEGORIA FROM CATEGORIA WHERE (idusuario = $id OR idusuario IS NULL)";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}*/


if (!empty($idCategoriaEditar)) {
    echo chamaCategoria($idCategoriaEditar, $id);
   
}

function chamaCategoria($idCategoriaEditar, $id){
    
    $pdo = Conectar();

    $sql = "SELECT NOMECATEGORIA, IDCATEGORIA, IDTIPOMOVIMENTACAO, IDUSUARIO FROM CATEGORIA WHERE IDCATEGORIA = $idCategoriaEditar and (idusuario = $id OR idusuario IS NULL)";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    sleep(0.5);

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}


