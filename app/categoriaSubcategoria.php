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

            <?php
            include('dist/js/script.js'); //importes de js
            ?>
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
                                            <button id="categoriaBtn" type="button" class="botaoCategorias btn active" onclick="mostrarTela('tela1')">Categoria</button>
                                        </li>
                                        <li class="nav-item">
                                            <button id="subcategoriaBtn" type="button" class="botaoCategorias btn" onclick="mostrarTela('tela2')">SubCategoria</button>
                                        </li>
                                    </ul>
                                </div>

                                <script>
                                    var botaoCate = document.getElementById('categoriaBtn');
                                    var botaoSub = document.getElementById('subcategoriaBtn');

                                    botaoCate.addEventListener('click', function() {
                                        this.classList.add('active');
                                        botaoSub.classList.remove('active');
                                    });

                                    botaoSub.addEventListener('click', function() {
                                        this.classList.add('active');
                                        botaoCate.classList.remove('active');
                                    });
                                </script>





                                <div id="tela1">
                                    <div class="card-body">

                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">

                                                            <div class="input-group-prepend">
                                                                <span class="tituloInput"><strong>Consulta:</strong></span>
                                                                <input type="text" id="inputValor1" oninput="filterTable('inputValor1', 'tabela1')" class="form-control inputCategorias">

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-8">

                                                    <table id="tabela1" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr class="colunasCategorias">
                                                                <th>Categorias</th>
                                                                <th>Especie</th>
                                                                <th>Tipo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php echo listaCategoria($_SESSION['idUsuario'], 0, ''); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>


                                <div id="tela2">
                                    <div class="card-body">

                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">

                                                            <div class="input-group-prepend">
                                                                <span class="tituloInput"><strong>Consulta:</strong></span>
                                                                <input type="text" id="inputValor2" oninput="filterTable('inputValor2', 'tabela2')" class="form-control inputCategorias">

                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
                                                <div class="col-8">

                                                    <table id="tabela2" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr class="colunasCategorias">
                                                                <th>Sub-Categoria</th>
                                                                <th>Categorias</th>
                                                                <th>Especie</th>
                                                                <th>Tipo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php echo listaSubCategoria($_SESSION['idUsuario'], 0, ''); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </form>






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