<?php
function listaCategoria($id){

include("conexao.php");
$sql = "SELECT b.nomecategoria, a.especieMovimentacao FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";
        
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

$lista = '';

if (mysqli_num_rows($result) > 0) {

    foreach ($result as $coluna) {

        $lista .=
            "<tr>"
                ."<td align='center'>".$coluna["nomecategoria"]."</td>"
                ."<td align='center'>".$coluna["especieMovimentacao"]."</td>"
            ."</tr>";  
    }
}

return $lista;
}