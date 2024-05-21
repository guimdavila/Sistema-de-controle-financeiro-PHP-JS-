
<?php

    session_start();

?>

<?php
/* TESTE FEITO PARA O CADASTRO, EXCLUSÃO E ALTERAÇÃO DE COABITANTES.

    $idUser = $_SESSION['idUsuario'];

    include('conexao.php');

    $id[] = $_POST["nTeste"];

    if($id[0] == 0){

        $sqlDel = "DELETE FROM COABITANTEUSUARIO WHERE idUsuarioPrincipal = ". $idUser;
        mysqli_query($conexao, $sqlDel);
        
        header('location: ../perfilUsuario.php');

    }


    $qntd = count($id);

    $sql = "SELECT * FROM coabitanteusuario where idUsuarioPrincipal = ". $idUser;

    $result = mysqli_query($conexao, $sql);

                    /////////////////DELETAR//////////////////////
 
    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
            
            
            $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
            $salvo = 0;

            for ($t = 0;$t <= ($qntd - 1);){
                

                $testando = implode($id[$t]);

                if($idCoabitanteUsuario == $testando){     

                    
                       
                    $salvo = 1;
                    
                    
                }

                $t++;
                 
            
            }

            if ($salvo == 0){
                $sqlDel = "DELETE FROM COABITANTEUSUARIO WHERE idCoabitanteUsuario = ". $idCoabitanteUsuario. " AND idUsuarioPrincipal = ". $idUser;
                mysqli_query($conexao, $sqlDel);

            }

        }

    }
    

    ///////////////////////////////////////////////////////////

    $sql = "SELECT * FROM coabitanteusuario where idCoabitanteUsuario = ". $idUser;

    $result = mysqli_query($conexao, $sql);
    $t = 0;

        $testando = implode($id[$t]);
        
        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $coluna) {

                if($testando == $idCoabitanteUsuario){
                    
                    $sqlAlter = "UPDATE COABITANTEUSUARIO SET NOMECOABITANTE = ".$testando."Where idCoabitante = ". $idCoabitanteUsuario;
                    mysqli_query($conexao, $sqlAlter);

                }else{
                    
                    $sqlIns = "INSERT INTO COABITNATEUSUARIO(NOMECOABITANTE, IDUSUARIOPRINCIPAL) 
                    VALUES(".$testando.", ".$idUser.";";


                }

                $t++;

            }
        }else{ 
            
            $sqlIns = "INSERT INTO COABITNATEUSUARIO(NOMECOABITANTE, IDUSUARIOPRINCIPAL) 
            VALUES(".$testando[$t].", ".$idUser.";";            

        }

    

    mysqli_close($conexao);

    header('location: ../perfilUsuario.php');
    */

?>