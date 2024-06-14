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

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 divCore">
            <div class="card">
              <h3> <?php PositivoMes($id) ?></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    var anoAtual = new Date().getFullYear();
    var mesAtual = new Date().getMonth() + 1;
    var mesAtualFormatado = mesAtual < 10 ? '0' + mesAtual : mesAtual.toString();

    console.log(anoAtual, mesAtualFormatado)

    fetch('php/funcaoAnalitico.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          ano: anoAtual,
          mes: mesAtualFormatado
        })
      })
      .then(response => response.text())
      .then(data => {
        console.log("Resposta do servidor:", data);
      })
      .catch(error => {
        console.error("Erro:", error);
      });

  </script>
</body>

</html>