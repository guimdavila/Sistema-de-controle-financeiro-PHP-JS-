<?php 

    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    $_SESSION['logado'] = 0;

    //Recebe os valores Email e Senha da tela login por meio de post
    $email = $_POST["nEmail"];
    $senha = $_POST["nSenha"];

    //Inclui a conexão com o banco php
    include("conexao.php"); 

    //Texto transcrito para o banco onde é feito o select com as informações obtidas
    $sql = "SELECT * FROM USUARIO WHERE EMAIL = '".$email."' AND SENHA = md5('".$senha."');";

    //Resultado do texto feito anteriormente transportado para o banco por meio da conexao.
    $resultSql = mysqli_query($conexao, $sql);
    //Após pesquisa e resultado encerra a conexão com o banco
    

    //Avalia se existe linhas no banco com os parâmetros inseridos
    if(mysqli_num_rows($resultSql) > 0){
        mysqli_close($conexao);
        //Recebe o valor da linha selecionada a partir da execução e adicionada ao valor SESSION
        foreach ($resultSql as $call){
            $_SESSION['idTipoUsuario'] = $call['idTipoUsuario'];
            $_SESSION['logado'] = 1;

            //Transfere o Usuário para a proxima tela
            header('location: ../home.php');
            exit;

        }

    //Caso não seja encontrado usuário com os parâmetros entregues ele retorna para a tela de login 
    }else{

        //Pesquisa para ver se o email utilizado possui um cadastro
        $sqlEmail = "SELECT EMAIL FROM USUARIO WHERE EMAIL = '".$email."';";
        $resultSqlEmail = mysqli_query($conexao, $sqlEmail);
        if(mysqli_num_rows($resultSqlEmail) > 0){
            mysqli_close($conexao);
            //Voltar para a primeira tela da pasta selecionada (INDEX)
            header('location:../');
            //Garante que a tela foi encerrada
            exit;

        }else{
            mysqli_close($conexao);
            //Voltar para a primeira tela da pasta selecionada (INDEX)
            header('location: ../');
            //Garante que a tela foi encerrada
            exit;

        }        

    }
    

?>