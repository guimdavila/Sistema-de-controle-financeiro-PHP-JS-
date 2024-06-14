<?php
session_start();
include('php/funcoes.php');
include('partes/css.php'); //importes de CSS

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nordic Finance</title>



  <style type="text/css" href="index.css">
    <?php include('dist/css/styles.css'); ?>
  </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home.php" class="brand-link">
        <img src="dist/img/logo128x128.png" alt="Nordic System" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nordic System</span>
      </a>

      <?php
      include('partes/sidebar.php'); //importes de Sidebar
      ?>

      <?php
      include('partes/js.php'); //importes de JS
      ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <div class="row">
            <div class="col-12">
              <div class="card tamanhoHome">
                <div class="row FundoGraficoHome">
                  <div class="col-12">
                    <div class="containerAnoTitulo">
                      <h1 class="display-1 tituloResultadosHome"><b>Resumo Mês Atual</b></h1>
                    </div>
                  </div>

                  <div class="col-4">

                    <div class="containerAno">
                      <div class="small-box small-box-Home cardGraficoHome">
                        <div class="inner">
                          <h3 class="h3Home">R$ <?php echo positivosMes($id); ?></h3>
                          <p class="pHome">Entradas</p>
                        </div>
                        <div class="icon">
                          <i class="ion fa-solid fa-plus iconGraficoHome" style="font-size: 50px;"></i>
                        </div>
                      </div>

                      <div class="small-box small-box-Home cardGraficoHome">
                        <div class="inner">
                          <h3 class="h3Home">R$ <?php echo negativoMes($id); ?></h3>
                          <p class="pHome">Saídas</p>
                        </div>
                        <div class="icon">
                          <i class="ion fa-solid fa-minus iconGraficoHome" style="font-size: 50px;"></i>
                        </div>
                      </div>

                      <div class="small-box small-box-Home cardGraficoHome">
                        <div class="inner">
                          <h3 class="h3Home">R$ <?php echo saldoMes($id); ?></h3>
                          <p class="pHome">Saldo</p>
                        </div>
                        <div class="icon">
                          <i class="ion fa-solid fa-equals iconGraficoHome" style="font-size: 50px;"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 " style="margin-left: 120px;">
                    <div class="card card-success graficopizzaHome">
                      <div class="card-header">
                        <h3 class="card-title">Divisão </h3>
                      </div>
                      <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="containerAnoTitulo">
                      <h1 class="display-1 tituloResultadosHome"><b>Resumo Anual</b></h1>
                    </div>
                  </div>


                  <div class="col-11">
                    <div class="containerAno">
                      <div class="card card-success">
                        <div class="card-header cabeçalho">
                          <h3 class="card-title">Anual</h3>
                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>




        </div>
      </section>
      <!-- /.Left col -->
    </div>
  </div>
  <!-- ./wrapper -->

  <script>
    // Obter o ano atual
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

      



    $(function() {

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Saidas',
          'Entradas',
        ],
        datasets: [{
          data: [700, 500],
          backgroundColor: ['#DC3545', '#00a65a'],
        }]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })


      var areaChartData = {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'], //CRIAR UM ECHO EM PHP PARA RETORNAR AS LABELS
        datasets: [

          {
            label: 'Entradas',
            backgroundColor: 'rgb(79, 121, 66)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [<?php PositivoMes($id) ?>] //CRIAR UM ECHO EM PHP PARA RETORNAR OS RESULTAODS
          },

          {
            label: 'Saídas',
            backgroundColor: 'rgba(161, 26, 26, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [<?php NegativosMes($id) ?>]
          },

        ]
      }
      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp0
      barChartData.datasets[1] = temp1

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

    })
  </script>

</body>

</html>