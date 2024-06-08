<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('funcoes.php');
require_once('conexaoPDO.php');

$id = $_SESSION['idUsuario'];
$idCategoriaEditar = isset($_GET['idEditarCategoria']) ? $_GET['idEditarCategoria'] : '';

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


