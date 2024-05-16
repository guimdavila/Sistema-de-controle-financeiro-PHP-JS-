<?php
testinho($id){
    include('conexao.php');

    $id[] = $_POST["nTeste"];

    $qntd = count($id);    
    $t = 0;

    include("conexao.php");

    $sql = "SELECT * FROM coabitanteusuario where idUsuarioPrincipal = ". $id;

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
            if($id[$t] == $coluna["idCoabitanteUsuario"]){

                echo($coluna["idCoabitanteUsuario"]);
                die();

                $t = $t + 1;



            }
            
        
        }
    
    }
}
?>