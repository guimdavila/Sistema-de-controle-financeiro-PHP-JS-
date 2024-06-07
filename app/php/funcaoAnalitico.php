<?php



function qtdCategorias(){
    
    $qtdCategorias = 0;

    include("conexao.php");

    $sql = "SELECT COUNT(idCategoria) AS qtdCategorias FROM categoria;";
    $result = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

     //Validar se tem retorno do BD
     if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $qtdCategorias = $coluna['qtdCategorias'];
        }        
    }
    
    return $qtdCategorias;
}
