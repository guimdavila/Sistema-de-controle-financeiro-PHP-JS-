<?php
session_start();
include('php/funcoes.php');
include('partes/css.php'); //importes de CSS
include('partes/navbar.php'); //importes de Navbar

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
                <div class="row">
                  <div class="col-6">
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>53<sup style="font-size: 20px"></sup></h3>

                        <p>Entradas</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>53<sup style="font-size: 20px"></sup></h3>

                        <p>Saídas</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
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


</body>

</html>