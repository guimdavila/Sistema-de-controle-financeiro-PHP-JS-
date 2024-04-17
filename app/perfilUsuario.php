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
  include('partes/css.php') //importes de CSS
  ?>


  <style type="text/css" href="index.css">
    <?php include('dist/css/styles.css')  ?>
  </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php
    include('partes/navbar.php') //importes de CSS
    ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/logo128x128.png" alt="Nordic System" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nordic System</span>
      </a>


      <?php
      include('partes/sidebar.php') //importes de CSS
      ?>

    </aside>

    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">


              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo fotoUsuario($_SESSION['idUsuario']); ?>" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo nomeUsuario($_SESSION['idUsuario']); ?></h3>
                </div>

                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Dados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="card-body-margin-reduzida">
                  <strong><i class="far fa-calendar-alt mr-1"></i> Data de Nascimento</strong>

                  <p class="text-muted">
                    <?php echo DataNasc($_SESSION['idUsuario']); ?>

                  </p>
                  <hr>
                  <strong><i class="fas fa-mobile-alt mr-1"></i> Telefone</strong>

                  <p class="text-muted">
                    <?php echo Telefone($_SESSION['idUsuario']); ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-address-card mr-1"></i> CPF</strong>

                  <p class="text-muted">
                    <?php echo cpf($_SESSION['idUsuario']); ?>
                  </p>

                  <hr>

                  <strong><i class="fa-solid fa-at"></i> E-mail</strong>

                  <p class="text-muted">
                    <?php echo email($_SESSION['idUsuario']); ?>
                  </p>

                  <hr>

                  <strong><i class="fa-regular fa-user mr-1"></i> Sexo</strong>

                  <p class="text-muted">
                    <?php echo sexo($_SESSION['idUsuario']); ?>
                  </p>

                  <hr>

                  <strong><i class="fa-regular fa-user mr-1"></i> Coabitantes</strong>

                  <p class="text-muted">
                    <?php echo coabitante($_SESSION['idUsuario']); ?>
                  </p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    </div>

    <?php
    include('partes/js.php') //importes de CSS
    ?>

</body>

</html>