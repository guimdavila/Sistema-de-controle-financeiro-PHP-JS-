<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Chame a função se o formulário foi enviado
    $personalizado = isset($_POST["nPersonalizado"]) ? 1 : 0;
    $consultaUser = $_POST["nConsultaCategoria"];
    echo listaCategoria($_SESSION['idUsuario'], $personalizado, $consultaUser);
}

function listaCategoria($id, $personalizado, $consultaUser)
{
    $lista = '';
    $tipoCategoria = '';

    include("conexao.php");

    if (!empty($consultaUser)) {
        if ($personalizado == 0) {
            $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.nomecategoria like '%$consultaUser%' and (b.idusuario = $id);";
        } else {
            $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.nomecategoria like '%$consultaUser%' and (b.idusuario = $id OR b.idusuario IS NULL);";
        }
    } else {
        $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";
    }

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
            } else {
                $tipoCategoria = "Padrão";
            }
            $lista .= "<tr>"
                . "<td align='center'>" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center'>" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center'>" . $tipoCategoria . "</td>"
                . "</tr>";
        }
    }

    mysqli_close($conexao);

    return $lista;
}
?>