<?php
function listaCategoria($id)
{
    $lista = '';
    $tipoCategoria = '';

        
    include("conexao.php");
    $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
  

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {

            if ($coluna["idUsuario"] != "") {

                $tipoCategoria = "Personalizada";
            } else {
                $tipoCategoria = "Padrão";
            }

            $lista .=
                "<tr>"
                . "<td align='center'>" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center'>" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center'>" . $tipoCategoria . "</td>"
                . "</tr>";
        }
    }

    return $lista;
}
