<?php
  session_start();
  include('php/funcoes.php');
  include('partes/css.php') //importes de CSS
 
?>

<!DOCTYPE html>
<html lang="pt-br">

 

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nordic Finance</title>

  
  
  <style type="text/css" href="index.css">
    <?php include('dist/css/styles.css')  ?>
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">



  <div class="wrapper">

    <?php
    include('partes/navbar.php') //importes de Navbar
    ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home.php" class="brand-link">
        <img src="dist/img/logo128x128.png" alt="Nordic System" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nordic System</span>
      </a>


      <?php
      include('partes/sidebar.php') //importes de Sidebar
      ?>

    </aside>


  </div>
  <!-- ./wrapper -->

  <?php
  include('partes/js.php') //importes de JS
  ?>

</body>

</html>