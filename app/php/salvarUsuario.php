<?php
session_start();
include('funcoes.php');

$dataNasc = $_POST["nDate"];
$telefone = $_POST["nTelefone"];
$cpf = $_POST["nCpf"];
$email = $_POST["nEmail"];
$sexo = $_POST["nSexo"];
$idUsuario = $_SESSION['idUsuario'];


include("conexao.php"); 

if($dataNasc != ""){

    $sql = "UPDATE USUARIO SET DATANASC = '$dataNasc' where idUsuario = $idUsuario";
   
    $resultSql = mysqli_query($conexao, $sql);
};

if($telefone != ""){

    $sql = "UPDATE USUARIO SET TELEFONE = '$telefone' where idUsuario = $idUsuario";
   
    $resultSql = mysqli_query($conexao, $sql);
};

if($cpf != ""){

    $sql = "UPDATE USUARIO SET CPF = '$cpf' where idUsuario = $idUsuario";
   
    $resultSql = mysqli_query($conexao, $sql);
};

if($email != ""){

    $sql = "UPDATE USUARIO SET EMAIL = '$email' where idUsuario = $idUsuario";
   
    $resultSql = mysqli_query($conexao, $sql);
};

if($sexo != ""){

    $sql = "UPDATE USUARIO SET SEXO = '$sexo' where idUsuario = $idUsuario";
   
    $resultSql = mysqli_query($conexao, $sql);
};




mysqli_close($conexao);

header('location: ../perfilUsuario.php');
exit;



