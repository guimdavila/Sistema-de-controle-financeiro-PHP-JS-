<script src="dist/js/script.js"></script>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?php  echo fotoUsuario($_SESSION['idUsuario']); ?>" class="img-circle elevation-2" alt="User Image"> <!-- adicionar icone para foto de usuário -->
    </div>
    <div class="info">
      <a href="../app/perfilUsuario.php" class="d-block"><?php  echo primeiroNomeUsuario($_SESSION['idUsuario']);?> </a>
    </div>
  </div>


  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

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
              <i class="fa-solid fa-tags iconeSideBar"></i>
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
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Analítico
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analítico 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analítico 2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/inline.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analítico 3</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/uplot.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analítico 4</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-header">Sub-menu</li>
      <li class="nav-item">
        <a href="pages/calendar.html" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Calendario
            <span class="badge badge-info right">2</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/gallery.html" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Galeria
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->