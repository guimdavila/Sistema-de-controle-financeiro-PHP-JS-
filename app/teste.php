<?php
session_start();
include('php/funcoes.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nordic Finance</title>

    <?php
    include('partes/css.php'); //importes de CSS
    ?>


    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css');
        ?>
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


<div class="container-resumo-card">
  <div class="info">
    <div class="caixaSpanCard">
      <span class="label label-priCol">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>
      <span class="label label-secCol">Sub Categoria:</span> <span class="value  value-secCol ">   + obj.NOMESUBCATEGORIA + </span>
    </div>
    <div class="caixaSpanCard">
      <span class="label label-priCol">Data:</span> <span class="value">' + dataFormatada + '</span>
      <span class="label label-secCol">Descrição:</span> <span class="value value-secCol">' + descricao + '</span> 
    </div>
    <div class="caixaSpanCard">
      <span class="label label-priCol">Valor:</span> <span class="value">  R$' + obj.VALOR + '</span>
    </div>
    <button class='botaoInvisivel' id='btn'><i class='fa-solid fa-pen classeLapis iconTabela'></i></button>
  </div>
</div>  
 

</body>

</html>