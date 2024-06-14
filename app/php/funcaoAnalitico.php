<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id = $_SESSION['idUsuario'];

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$mesAtual = '';

// No arquivo php/funcaoAnalitico.php
$ano = '';

function PositivoMes($id)
{
    $Positivo = '';
    $Negativo = '';
    $cont = 0;
    $ano = date('y');

    include("conexao.php");

    $sql = "SELECT
            meses.mes,
            COALESCE(SUM(CASE WHEN m.idTipoMovimentacao = '1' THEN m.valor ELSE 0 END), 0) AS positivo,
            COALESCE(SUM(CASE WHEN m.idTipoMovimentacao = '2' THEN m.valor ELSE 0 END), 0) AS negativo
        FROM (
            SELECT 1 AS mes UNION ALL
            SELECT 2 AS mes UNION ALL
            SELECT 3 AS mes UNION ALL
            SELECT 4 AS mes UNION ALL
            SELECT 5 AS mes UNION ALL
            SELECT 6 AS mes UNION ALL
            SELECT 7 AS mes UNION ALL
            SELECT 8 AS mes UNION ALL
            SELECT 9 AS mes UNION ALL
            SELECT 10 AS mes UNION ALL
            SELECT 11 AS mes UNION ALL
            SELECT 12 AS mes
        ) meses
        LEFT JOIN MOVIMENTACAO m ON MONTH(m.data) = meses.mes AND YEAR(m.data) = '20$ano'  AND m.idusuario = '$id'
        GROUP BY meses.mes
        ORDER BY meses.mes;";


    $result = mysqli_query($conexao, $sql);

    // Validar se tem retorno do BD
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($cont == 0) {
                $Positivo .=  $row['positivo'];
            } else {
                $Positivo .= ", " . $row['positivo'];
            }

            if ($row['negativo'] != "") {
                $Negativo .= "'" . $row['negativo'] . "'";
            } else {
                $Negativo .= ",'" . $row['negativo'] . "'";
            }

            $cont++;
        }
        echo $Positivo;
    } else {
        echo "Nenhum registro encontrado.";
    }

    mysqli_close($conexao);
}

function NegativosMes($id)
{
    $Negativo = '';
    $cont = 0;
    $ano = date('y');

    include("conexao.php");

    $sql = "SELECT
            meses.mes,
            COALESCE(SUM(CASE WHEN m.idTipoMovimentacao = '1' THEN m.valor ELSE 0 END), 0) AS positivo,
            COALESCE(SUM(CASE WHEN m.idTipoMovimentacao = '2' THEN m.valor ELSE 0 END), 0) AS negativo
        FROM (
            SELECT 1 AS mes UNION ALL
            SELECT 2 AS mes UNION ALL
            SELECT 3 AS mes UNION ALL
            SELECT 4 AS mes UNION ALL
            SELECT 5 AS mes UNION ALL
            SELECT 6 AS mes UNION ALL
            SELECT 7 AS mes UNION ALL
            SELECT 8 AS mes UNION ALL
            SELECT 9 AS mes UNION ALL
            SELECT 10 AS mes UNION ALL
            SELECT 11 AS mes UNION ALL
            SELECT 12 AS mes
        ) meses
        LEFT JOIN MOVIMENTACAO m ON MONTH(m.data) = meses.mes AND YEAR(m.data) = '20$ano'  AND m.idusuario = '$id'
        GROUP BY meses.mes
        ORDER BY meses.mes;";


    $result = mysqli_query($conexao, $sql);

    // Validar se tem retorno do BD
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($cont == 0) {
                $Negativo .=  $row['negativo'];
            } else {
                $Negativo .= ", " . $row['negativo'];
            }

            $cont++;
        }
        echo $Negativo;
    } else {
        echo "Nenhum registro encontrado.";
    }

    mysqli_close($conexao);
}

function misto($id)
{
    $misto = 0;

    $mesAtual = date('m');

    include("conexao.php");

    $sql = "SELECT
    (SELECT COALESCE(SUM(valor), 0) 
     FROM MOVIMENTACAO 
     WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 23:59:59' 
     AND idTipoMovimentacao = '1' 
     AND idusuario = $id) AS positivo,
    
    (SELECT COALESCE(SUM(valor), 0) 
     FROM MOVIMENTACAO 
     WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 23:59:59' 
     AND idTipoMovimentacao = '2' 
     AND idusuario = $id) AS negativo;
";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            $misto = $coluna['positivo'] . ", " .  $coluna['negativo'];
        }
    }

    return $misto;
}


function positivosMes($id)
{
    $positivoMes = 0;

    $mesAtual = date('m');

    include("conexao.php");

    $sql = "SELECT sum(valor) as positivo 
            FROM MOVIMENTACAO 
            WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 23:59:59' 
            AND idTipoMovimentacao = '1' 
            AND idusuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            $positivoMes = $coluna['positivo'];
        }
    }

    return $positivoMes;
}

function negativoMes($id)
{
    $negativo = 0;

    $mesAtual = date('m');

    include("conexao.php");

    $sql = "SELECT sum(valor) as negativo 
            FROM MOVIMENTACAO 
            WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 23:59:59' 
            AND idTipoMovimentacao = '2' 
            AND idusuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            $negativo = $coluna['negativo'];
        }
    }

    return $negativo;
}


function saldoMes($id)
{
    $saldo = 0;

    $mesAtual = date('m');

    include("conexao.php");

    $sql = "SELECT
    (SELECT SUM(valor) 
     FROM MOVIMENTACAO 
     WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 00:00:00' 
     AND idTipoMovimentacao = '1' 
     AND idusuario = $id) 
    -
    (SELECT SUM(valor) 
     FROM MOVIMENTACAO 
     WHERE data BETWEEN '2024-$mesAtual-01 00:00:00' AND '2024-$mesAtual-31 00:00:00' 
     AND idTipoMovimentacao = '2'
     AND idusuario = $id) 
    AS saldo;";

    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $coluna) {
            $saldo = $coluna['saldo'];
        }
    }

    return $saldo;
}

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
                    $ReturnPorcentagem = $resultado['nomeSubcategoria'] . " - " . $porcentagem . "%<br>";
                } else {
                    $ReturnPorcentagem .= $resultado['nomeSubcategoria'] . " - " . $porcentagem . "%<br>";
                }
                $cont++;
            }
        }

        echo $ReturnPorcentagem;
    } else {
        echo "Nenhum registro encontrado.";
    }
}
