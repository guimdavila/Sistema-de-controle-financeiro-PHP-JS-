<?php 
    $email = $_POST["nEmail"];
    $senha = $_POST["nSenha"];

    include(conexao.php);
    
    $sql = "SELECT * FROM USUARIO WHERE EMAIL = '".$email."' AND SENHA = md5('".$senha."');";
    $resultSql = mysql_query($conexao, $sql);
    mysql_close(conexao);

    if(mysql_num_rows(resultSql) > 0){

        foreach ($resultSql as $call){
            $_SESSION['idTipoUsuario'] = $call['idTipoUsuario'];
            $_SESSION['logado'] = 1;

            //Assim que for criada tela seguinte adicionar no lugar de "ProximaTela"
            //header('location: ../ProximaTela');


        }

    }else{
        //Voltar para INDEX
        header('location:../');

    }


?>