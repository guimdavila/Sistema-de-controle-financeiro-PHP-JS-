<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id                     = $_SESSION['idUsuario'];

$nomeCategoria          = $_POST['nNomeCategoria'];
$especieCategoria       = $_POST['nEspecie'];

$nomeSubCategoria          = $_POST['nNomeSubCategoria'];
$categoriasNaSubcategoria       = $_POST['nCategoriasNaSubcategoria'];



// Criar categoria
if ($nomeCategoria != "") {

    include("conexao.php");

    $sql = "SELECT NOMECATEGORIA FROM CATEGORIA WHERE NOMECATEGORIA = '" . $nomeCategoria . "'";

    $resultSql = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultSql) > 0) {
        echo "Categoria já existe";
    } else {
        
        $sql = "INSERT INTO CATEGORIA(NOMECATEGORIA, IDTIPOMOVIMENTACAO, IDUSUARIO) "
            . "VALUES('" . $nomeCategoria . "', " . $especieCategoria . ", " . $id . ")";

        $criarCategoria = mysqli_query($conexao, $sql);
    }
    $nomeCategoria == "";
    mysqli_close($conexao); 
}


// Criar Subcategoria
if ($nomeSubCategoria != "") {

    include("conexao.php");

    $sql = "SELECT NOMESUBCATEGORIA FROM SUBCATEGORIA WHERE NOMESUBCATEGORIA = '" . $nomeSubCategoria . "'";

    $resultSql = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultSql) > 0) {
        echo "Categoria já existe";
    } else {
        
        $sql = "INSERT INTO SUBCATEGORIA(NOMESUBCATEGORIA, IDCATEGORIA, IDUSUARIO) "
            . "VALUES('" . $nomeSubCategoria . "', " . $categoriasNaSubcategoria . ", " . $id . ")";

        $criarCategoria = mysqli_query($conexao, $sql);
    }
    $nomeSubCategoria == "";
    mysqli_close($conexao); 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo listaCategoria($_SESSION['idUsuario']);
}

// Lista como Option as categorias
function SolicitaCategorias($id){


    include("conexao.php");

    $sql = "SELECT NOMECATEGORIA, IDCATEGORIA FROM CATEGORIA WHERE idusuario = $id OR idusuario IS NULL;";

    $resultSql = mysqli_query($conexao, $sql);

    foreach ($resultSql as $coluna) {
        
        $lista .= "<option value= '". $coluna["IDCATEGORIA"] . "'>".$coluna["NOMECATEGORIA"]."</option>";
    }

    return $lista;
}

// Alterar categoria
function acaoCategoria($id)
{
    $retornaValor = '';

    include("conexao.php");
    $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {

            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
            } else {
                $tipoCategoria = "Padrão";
            }

            if ($coluna["idUsuario"] != "") {

                $retornaValor .= "<span class='tituloInput'><strong>Nome Categoria: </strong></span>" . $coluna["nomecategoria"]
                    . "<span class='tituloInput'><strong>Especie Movimentação: </strong></span>" . $coluna["especieMovimentacao"]
                    . "<span class='tituloInput'><strong>Tipo</strong></span>" . $tipoCategoria;
            } else {
            }
        }
    }

    mysqli_close($conexao);

    return $retornaValor;
}


// Tabela de categorias
function listaCategoria($id)
{
    $lista = '';
    $tipoCategoria = '';

    include("conexao.php");

    $sql = "SELECT b.nomecategoria, a.especieMovimentacao, b.idUsuario, b.idcategoria FROM tipomovimentacao AS a INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
                $tipoPermissao = "<button class='botaoInvisivel' id='btn_".$coluna["idcategoria"]."'><i class='fa-solid fa-pen classeLapis iconTabela' data-toggle='modal' data-target='#crudCategoria'></i></button> <i class='fa-solid fa-eye iconTabela'></i>";
            } else {
                $tipoCategoria = "Padrão";
                $tipoPermissao = "<i class='fa-solid fa-eye iconTabela'></i>";
            }
            $lista .= "<tr class='colunasCategorias' >"
                . "<td align='center' >" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center' >" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center' >" . $tipoCategoria . "</td>"
                . "<td align='center' >" . $tipoPermissao . "</td>"
                . "</tr>";
        }
    }

    mysqli_close($conexao);

    return $lista;
}











// Tabela de Subcategorias
function listaSubCategoria($id)
{
    $lista = '';
    $tipoCategoria = '';

    include("conexao.php");

    $sql = "SELECT c.nomesubcategoria ,b.nomecategoria, a.especieMovimentacao, c.idUsuario FROM tipomovimentacao AS a  INNER JOIN categoria AS b ON a.idTipoMovimentacao = b.idTipoMovimentacao INNER JOIN subcategoria as c ON B.idcategoria = c.idcategoria  WHERE b.idusuario = $id OR b.idusuario IS NULL;";

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            if ($coluna["idUsuario"] != "") {
                $tipoCategoria = "Personalizada";
                $tipoPermissao = "<i class='fa-solid fa-pen classeLapis iconTabela'></i> <i class='fa-solid fa-eye iconTabela'></i>";
            } else {
                $tipoCategoria = "Padrão";
                $tipoPermissao = "<i class='fa-solid fa-eye iconTabela'></i>";
            }
            $lista .= "<tr class='colunasCategorias'>"
                . "<td align='center'>" . $coluna["nomesubcategoria"] . "</td>"
                . "<td align='center'>" . $coluna["nomecategoria"] . "</td>"
                . "<td align='center'>" . $coluna["especieMovimentacao"] . "</td>"
                . "<td align='center'>" . $tipoCategoria . "</td>"
                . "<td align='center' data-target='#crudCategoria'>" . $tipoPermissao . "</td>"
                . "</tr>";
        }
    }

    mysqli_close($conexao);

    return $lista;
}
