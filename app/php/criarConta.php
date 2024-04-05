<?php 
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $nome = $_POST['nNomeUser'];
    $email = $_POST['nEmail'];
    $senha = $_POST['nSenha'];
    $confSenha = $_POST['nConfirmaSenha'];

    if($senha != $confSenha){
        header('location: ../criarUsuario.php');
        

    }

    include("conexao.php");

    $sql = "SELECT EMAIL FROM USUARIO WHERE EMAIL = '". $email ."'";

    $resultSql = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultSql) > 0){
        header('location: ../criarUsuario.php');
        var_dump("Email ja utilizado");
        

    }else{
        $sql = "INSERT INTO USUARIO(NOMEUSUARIO, EMAIL, SENHA, IDTIPOUSUARIO) "
        ."VALUES('.$nome.', '.$email.', MD5('.$senha.'), 1)";       

        $criaConta = mysqli_query($conexao, $sql);

        header('location: ../');
        var_dump("Usuário registrado com sucesso!!");

    }

?>