<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


include('funcoes.php');
require_once('conexaoPDO.php');


$id                     = $_SESSION['idUsuario'];
$mesEscol = isset($_GET['mesEscol']) ? $_GET['mesEscol'] : '';
$anoEscol = isset($_GET['anoEscol']) ? $_GET['anoEscol'] : '';

if (!empty($mesEscol) && !empty($anoEscol)){
    echo retornaCards($id, $mesEscol, $anoEscol);

}

function retornaCards($id, $mesEscol, $anoEscol)
{
    $pdo = Conectar();

    include('conexao.php');

    $sql = "SELECT B.NOMECATEGORIA, C.NOMESUBCATEGORIA, A.DATA, A.VALOR, A.DESCRICAO FROM MOVIMENTACAO AS A INNER JOIN CATEGORIA AS B ON A.IDCATEGORIA = B.IDCATEGORIA INNER JOIN SUBCATEGORIA AS C ON A.IDSUBCATEGORIA = C.IDSUBCATEGORIA "
        . " WHERE A.DATA BETWEEN '".$anoEscol."".$mesEscol."01' AND '".$anoEscol."".$mesEscol."31' AND A.IDUSUARIO = $id ";

    $stmt = mysqli_query($conexao, $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();

    if (mysqli_num_rows($stmt) > 0) {
        
    sleep(0.5);
        echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        $pdo = null;
        mysqli_close($conexao);
    } else {
        
    sleep(0.5);
        echo("Nenhuma transferência realizada");

    }


    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}