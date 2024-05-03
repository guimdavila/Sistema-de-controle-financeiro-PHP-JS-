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

    <?php
    include('partes/css.php'); //importes de CSS
    ?>


    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css');
        ?>
    </style>

    <style type="text/css" href="index.css">
        <?php include('php/funcoesCategorias.php');
        ?>
    </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php
        include('partes/navbar.php'); //importes de CSS
        ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="home.php" class="brand-link">
                <img src="dist/img/logo128x128.png" alt="Nordic System" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Nordic System</span>
            </a>
            <?php
            include('partes/sidebar.php'); //importes de CSS
            ?>

            <script src="dist/js/script.js"></script>

        </aside>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Categoria</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Subcategoria</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="tituloInput"><strong>Consulta:</strong></span>
                                                </div>

                                                <input type="text" name="nConsultaCategoria" class="form-control">
                                            </div>

                                            <div class="botoes-editar">
                                                <button class="btn btn-edit-perfil" onclick="mostrarTela('tela2')">Pesquisar</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <table id="tabela" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Categorias</th>
                                                        <th>Especie</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php echo listaCategoria($_SESSION['idUsuario']); ?>

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->




                <!-- Editar coabitante -->
                <div class="modal fade" id="editarCoabitante">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Coabitantes</h4>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="modal-body">

                                    <div class="row">

                                        <div class="card-body">
                                            <table id="tabela" class="table table-bordered table-hover">

                                                <button type='button' class='btn btn-edit-perfil' data-toggle='modal' onclick='adicionarLinha()'>Adicionar</button>


                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <?php echo listaUsuario($_SESSION['idUsuario']); ?>

                                                </tbody>

                                            </table>
                                        </div>




                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-edit-perfil" data-dismiss="modal">Voltar</button>
                                        <button type="submit" class="btn btn-edit-perfil">Salvar</button>
                                    </div>
                            </form>

                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>



                <!-- /.modal-dialog -->
            </section>
        </div>



        <?php
        include('partes/js.php'); //importes de CSS
        ?>

        <script>
            window.onload = function() {
                mostrarTela('tela1');
            };
        </script>

</body>

</html>