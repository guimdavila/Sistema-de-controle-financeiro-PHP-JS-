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


<script>
  // Suponha que sua data esteja em formato de string
const dataStr = "2024-06-01 00:00:00";

// Converta a string para um objeto Date
const dataObj = new Date(dataStr);

// Obtenha os componentes da data
const dia = String(dataObj.getDate()).padStart(2, '0');
const mes = String(dataObj.getMonth() + 1).padStart(2, '0'); // Os meses são indexados de 0 a 11
const ano = dataObj.getFullYear();

// Formate a data no formato desejado
const dataFormatada = `${dia}/${mes}/${ano}`;

console.log(dataFormatada);

</script>

</body>

</html>