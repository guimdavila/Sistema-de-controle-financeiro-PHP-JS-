<?php
session_start();
include('php/funcoes.php');
include('partes/css.php'); 

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
                                <div class="row FundoGrafico">
                                    <div class="col-6">
                                        
                                    <h1 class="display-1 tituloResultados">Dados do mês</h1>
                                        <div class="small-box cardGrafico cardGraficoResumo">
                                            <div class="inner">
                                                <h3><?php echo SubCategoriaMaiorSaída($id); ?></h3>

                                                <p>Sub-Categoria com maior saída</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion fa-solid fa-money-bill-trend-up iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico cardGraficoResumo">
                                            <div class="inner">
                                                <h3></h3>

                                                <p>Em desenvolvimento</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion fa-solid fa-person-digging iconGrafico"></i>
                                            </div>
                                        </div>
                                        
                                        <h1 class="display-1 tituloResultados">Categoria e Sub-Categoria</h1>

                                        <div class="small-box cardGrafico cardGraficoResumo">
                                            <div class="inner">
                                                <h3><?php echo qtdCategorias(); ?></h3>

                                                <p>Quantidade de Categorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion fa-solid fa-list iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico cardGraficoResumo">
                                            <div class="inner">
                                                <h3><?php echo qtdSubCategoria(); ?></h3>

                                                <p>Quantidade de SubCategorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion fa-solid fa-tags iconGrafico"></i>
                                            </div>
                                        </div>
                                     
                                    </div>

                                    <div class="col-2">



                                    </div>
                                    <div class="col-4">

                                        <h1 class="display-1 tituloResultados">Investimentos</h1>

                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3> R$ <?php echo totalInvestimento($id); ?></h3>

                                                <p>Total Investido</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion fa-solid fa-piggy-bank iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Investimentos</h3>

                                            </div>
                                            <div class="card-body">
                                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <div class="small-box cardGrafico cardGraficoPorcent">
                                            <div class="icon">
                                                <i class="ion fa-solid fa-percent iconGraficoPercent"></i>
                                            </div>
                                            <div class="inner">
                                                <h3>Divisão</h3>
                                                <h4>  <?php echo DivisaoPorcInvestimentos(); ?></h4>

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
        $(function() {

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [<?php echo labelsInvestimentos();?>],
                datasets: [{
                    data: [<?php echo ValoresInvestimentos();?>],
                    backgroundColor: ['#DC3545', '#00A65A', '#FF5733', '#FFC300', '#DAF7A6', '#581845', '#900C3F', '#C70039', '#FF5733', '#900C3F', '#1D8348', '#117A65', '#154360', '#2874A6', '#48C9B0'],
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