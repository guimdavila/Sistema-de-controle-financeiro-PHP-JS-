<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id = $_SESSION['idUsuario'];

function qtdCategorias()
{

    $qtdCategorias = 0;

    include("conexao.php");

    $sql = "SELECT COUNT(idCategoria) AS qtdCategorias FROM categoria;";
    $result = mysqli_query($conexao, $sql);
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

function qtdSubCategoria()
{

    $qtdSubCategoria = 0;

    include("conexao.php");

    $sql = "SELECT COUNT(idSubCategoria) AS subcategoria FROM subcategoria;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
            //***Verificar os dados da consulta SQL
            $qtdSubCategoria = $coluna['subcategoria'];
        }
    }

    return $qtdSubCategoria;
}

//Investimentos

function totalInvestimento($id)
{

    $totalInvestido = 0;

    include("conexao.php");

    $sql = "WITH SomaCategorias AS (SELECT IDCATEGORIA, SUM(VALOR) AS SomaValor FROM MOVIMENTACAO WHERE IDCATEGORIA IN (21, 23) AND idUsuario = $id GROUP BY IDCATEGORIA) SELECT (SELECT SomaValor FROM SomaCategorias WHERE IDCATEGORIA = 21) - (SELECT SomaValor FROM SomaCategorias WHERE IDCATEGORIA = 23) AS Saldo;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
            //***Verificar os dados da consulta SQL
            $totalInvestido = $coluna['Saldo'];
        }
    }

    return $totalInvestido;
}

function labelsInvestimentos()
{
    $labelsInvestimento = '';
    $cont = 0;

    include("conexao.php");

    $sql = "SELECT mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria, SUM(mov.valor) AS valor
            FROM movimentacao mov
            INNER JOIN subcategoria sub ON sub.idSubCategoria = mov.idSubCategoria
            WHERE mov.idCategoria IN (21, 23)
            GROUP BY mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $arrayPositivo = [];
        $arrayNegativo = [];
        $resultados = [];

        while ($coluna = mysqli_fetch_assoc($result)) {
            if ($coluna['idCategoria'] == 21) {
                $arrayPositivo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            } else {
                $arrayNegativo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            }
        }

        $subcategorias = array_unique(array_merge(array_keys($arrayPositivo), array_keys($arrayNegativo)));

        foreach ($subcategorias as $subcategoria) {
            $valorPositivo = isset($arrayPositivo[$subcategoria]) ? $arrayPositivo[$subcategoria] : 0;
            $valorNegativo = isset($arrayNegativo[$subcategoria]) ? $arrayNegativo[$subcategoria] : 0;
            $resultado = [
                "nomeSubcategoria" => $subcategoria,
                "valorSubtraido" => $valorPositivo - $valorNegativo
            ];
            $resultados[] = $resultado;
        }

        foreach ($resultados as $resultado) {
            if ($cont == 0) {
                $labelsInvestimento .= "'" . $resultado['nomeSubcategoria'] . "'";
            } else {
                $labelsInvestimento .= ",'" . $resultado['nomeSubcategoria'] . "'";
            }
            $cont++;
        }

        echo $labelsInvestimento;
    } else {
        echo "Nenhum registro encontrado.";
    }
}

function ValoresInvestimentos()
{

    $totaisInvestidos = '';
    $cont = 0;

    include("conexao.php");

    $sql = "select mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria, sum(mov.valor) as valor from movimentacao mov inner join subcategoria sub on sub.idSubCategoria = mov.idSubCategoria where mov.idCategoria in (21,23) group by mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $arrayPositivo = [];
        $arrayNegativo = [];
        $resultados = [];

        while ($coluna = mysqli_fetch_assoc($result)) {
            if ($coluna['idCategoria'] == 21) {
                $arrayPositivo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            } else {
                $arrayNegativo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            }
        }

        $subcategorias = array_unique(array_merge(array_keys($arrayPositivo), array_keys($arrayNegativo)));

        foreach ($subcategorias as $subcategoria) {
            $valorPositivo = isset($arrayPositivo[$subcategoria]) ? $arrayPositivo[$subcategoria] : 0;
            $valorNegativo = isset($arrayNegativo[$subcategoria]) ? $arrayNegativo[$subcategoria] : 0;
            $resultado = [
                "nomeSubcategoria" => $subcategoria,
                "valorSubtraido" => $valorPositivo - $valorNegativo
            ];
            $resultados[] = $resultado;
        }


        foreach ($resultados as $resultado) {

            if ($cont == 0) {
                $totaisInvestidos .= "'" . $resultado['valorSubtraido'] . "'";
            } else {
                $totaisInvestidos .= ",'" . $resultado['valorSubtraido'] . "'";
            }

            $cont++;
        }
        echo $totaisInvestidos;
    } else {
        echo "Nenhum registro encontrado.";
    }
}

function DivisaoPorcInvestimentos()
{
    $id = $_SESSION['idUsuario'];
    $totaisInvestidos = '';
    $cont = 0;

    include("conexao.php");

    $sql = "select mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria, sum(mov.valor) as valor from movimentacao mov inner join subcategoria sub on sub.idSubCategoria = mov.idSubCategoria where mov.idCategoria in (21,23) group by mov.idCategoria, sub.idSubCategoria, sub.nomeSubCategoria";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $arrayPositivo = [];
        $arrayNegativo = [];
        $resultados = [];
        $porcentagem = 0;

        $ReturnPorcentagem = 0;

        while ($coluna = mysqli_fetch_assoc($result)) {
            if ($coluna['idCategoria'] == 21) {
                $arrayPositivo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            } else {
                $arrayNegativo[$coluna['nomeSubCategoria']] = $coluna['valor'];
            }
        }

        $subcategorias = array_unique(array_merge(array_keys($arrayPositivo), array_keys($arrayNegativo)));

        foreach ($subcategorias as $subcategoria) {
            $valorPositivo = isset($arrayPositivo[$subcategoria]) ? $arrayPositivo[$subcategoria] : 0;
            $valorNegativo = isset($arrayNegativo[$subcategoria]) ? $arrayNegativo[$subcategoria] : 0;
            $resultado = [
                "nomeSubcategoria" => $subcategoria,
                "valorSubtraido" => $valorPositivo - $valorNegativo
            ];


            $resultados[] = $resultado;
        }


        foreach ($resultados as $resultado) {

            if ($resultado['valorSubtraido'] != 0) {
                $porcentagem = ($resultado['valorSubtraido'] * 100) / totalInvestimento($id);
            } else {
                $porcentagem = 0;
            }

            $porcentagem = number_format($porcentagem, 2, ',', '.');
            
            if (!empty($porcentagem)) {
                if ($cont == 0) {
                    $ReturnPorcentagem = $resultado['nomeSubcategoria'] . " - ". $porcentagem . "%<br>";
                } else {
                    $ReturnPorcentagem .= $resultado['nomeSubcategoria'] . " - ". $porcentagem . "%<br>";
                }
                $cont++;
            }
            
            
        }

        echo $ReturnPorcentagem;
    } else {
        echo "Nenhum registro encontrado.";
    }
}
