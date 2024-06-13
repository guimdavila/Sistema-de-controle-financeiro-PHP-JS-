<script src="dist/js/script.js"></script>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?php echo fotoUsuario($_SESSION['idUsuario']); ?>" class="img-circle elevation-2" alt="User Image"> <!-- adicionar icone para foto de usuário -->
    </div>
    <div class="info">
      <a href="../app/perfilUsuario.php" class="d-block"><?php echo primeiroNomeUsuario($_SESSION['idUsuario']); ?> </a>
    </div>
  </div>


  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

      <li class="nav-item"> <!--classe para abrir o menu - menu-open -->
        <a href="home.php" class="nav-link">
          <i class="nav-icon fa-solid fa-house"></i>
          <p>
            Home
          </p>
        </a>


      </li>
      <li class="nav-item"> <!--classe para abrir o menu - menu-open -->
        <a href="#" class="nav-link ">
          <i class="nav-icon fa-solid fa-bars-progress"></i>
          <p>
            Gestão
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="core.php" class="nav-link"><!--pra flegar é aplicar o 'active' -->
              <i class="fa-solid fa-pen-clip iconeSideBar"></i>
              <p>Registrar Movimentação</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="categoriaSubcategoria.php" class="nav-link"><!--pra flegar é aplicar o 'active' -->
              <i class="fa-solid fa-tags iconeSideBar"></i>
              <p>Categoria - Subcategoria</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa-solid fa-magnifying-glass-chart"></i>
          <p>
            Analítico
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="resumo.php" class="nav-link">
              <i class="fa-regular fa-file-lines iconeSideBar"></i>
              <p>Resumo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
              <i class="fas fa-chart-pie iconeSideBar"></i>
              <p>Graficos</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->