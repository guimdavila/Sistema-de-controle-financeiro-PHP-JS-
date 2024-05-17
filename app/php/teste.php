<?php
    session_start();

?>
<?php

    $idUser = $_SESSION['idUsuario'];

    include('conexao.php');

    $id[] = $_POST["nTeste"];

    $qntd = count($id);

    $sql = "SELECT * FROM coabitanteusuario where idUsuarioPrincipal = ". $idUser;

    $result = mysqli_query($conexao, $sql);

    ////////////////////////////////////////////////////////

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {

            $salve = explode(" ", $id[]);
            var_dump($salve[0]);
            die();

        
                    
            $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
            $salvo = 0;
            $conta = 0;

            for ($t = 0;$t <= $qntd;){
                

                if($idCoabitanteUsuario == $id[$conta]){
                    $salvo = 1;

                    var_dump($id[$conta]);
                    die();

                }
                $conta++;
            }

            if ($salvo == 0){
                $sqlDel = "DELETE FROM COABITANTEUSUARIO WHERE ID = ". $idCoabitanteUsuario;
                mysqli_query($conexao, $sqlDel);

            }

        }

    }


    ///////////////////////////////////////////////////////////

    for ($t = 0;$t <= $qntd;) {

        $valor = $id[$t];

        $sql = "SELECT * FROM coabitanteusuario where idCoabitante = ". $idUser;

        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $coluna) {

                $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
                

                if($valor == $idCoabitanteUsuario){

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