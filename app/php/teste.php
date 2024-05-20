<?php
    session_start();

?>
<?php

    $idUser = $_SESSION['idUsuario'];

    include('conexao.php');

    $id[] = $_POST["nTeste"];

    $qntd = count($id);

    if($qntd > 1){
        var_dump($explode("",$id));
        die();

    }

    //$salve[] = explode(" ", $id[]);

    $sql = "SELECT * FROM coabitanteusuario where idUsuarioPrincipal = ". $idUser;

    $result = mysqli_query($conexao, $sql);

    /////////////////DELETAR///////////////////////////////////////

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
                    
            $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
            $salvo = 0;
            $conta = 0;

            for ($t = 0;$t < ($qntd - 1);){    

                if($idCoabitanteUsuario == $id[$conta]){
                    $salvo = 1;

                }
                $conta++;
            }

            if ($salvo == 0){
                $sqlDel = "DELETE FROM COABITANTEUSUARIO WHERE idCoabitanteUsuario = ". $idCoabitanteUsuario. " AND idUsuarioPrincipal = ". $idUser;
                mysqli_query($conexao, $sqlDel);

            }

        }

    }


    ///////////////////////////////////////////////////////////

    for ($t = 0;$t <= ($qntd - 1);) {

        $sql = "SELECT * FROM coabitanteusuario where idCoabitanteUsuario = ". $idUser;

        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $coluna) {

                $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];    

                if($salve[$t] == $idCoabitanteUsuario){

                    $sqlAlter = "UPDATE COABITANTEUSUARIO SET NOMECOABITANTE = ".$valor."Where idCoabitante = ". $$idCoabitanteUsuario;
                    mysqli_query($conexao, $sqlAlter);

                }

            }
        }else{ 

            $sqlIns = "INSERT INTO COABITNATEUSUARIO(NOMECOABITANTE, IDUSUARIOPRINCIPAL) 
            VALUES(".$id[$t].", ".$idUser.";";


        };

        $t++;
    }

    mysqli_close($conexao);

    header('location: ../perfilUsuario.php');

    

?>