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



  <select class="input-group-text caixaSelecaoCate" name="nNovoNomeCategoriaVinculada" id="SelectAlteraCategorias">
    <option value="obj.IDCATEGORIA"> obj.NOMECATEGORIA </option>
  </select>


</body>

</html>