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
                                    <div class="col-4">
                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3><?php echo qtdCategorias(); ?></h3>

                                                <p>Quantidade de Categorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3><?php echo qtdSubCategoria(); ?></h3>

                                                <p>Quantidade de SubCategorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3><?php echo qtdSubCategoria(); ?></h3>

                                                <p>Quantidade de SubCategorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3><?php echo qtdSubCategoria(); ?></h3>

                                                <p>Quantidade de SubCategorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3><?php echo qtdSubCategoria(); ?></h3>

                                                <p>Quantidade de SubCategorias</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars iconGrafico"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">



                                    </div>
                                    <div class="col-4">

                                        <div class="small-box cardGrafico">
                                            <div class="inner">
                                                <h3> R$ <?php echo totalInvestimento($id); ?></h3>

                                                <p>Total Investimentos</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion fa-solid fa-piggy-bank iconGrafico"></i>
                                            </div>
                                        </div>
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <h3 class="card-title">Pie Chart</h3>

                                            </div>
                                            <div class="card-body">
                                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

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