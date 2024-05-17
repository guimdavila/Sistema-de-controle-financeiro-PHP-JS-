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
    include('partes/css.php'); //importes de CSS
    ?>


    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css');
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



        </aside>


        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="card">

                                <div class="card-header">
                                    <div class="mesAnoCore" style="text-align: center; display: flex; justify-content: center;">
                                        <select class="input-group-text caixaSelecaoCate MesCore" name="nMesExibicao" id="mesEscolhido">
                                            <option value="01">Janeiro</option>
                                            <option value="02">Fevereiro</option>
                                            <option value="03">Março</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Maio</option>
                                            <option value="06">Junho</option>
                                            <option value="07">Julho</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>

                                        <select class="input-group-text caixaSelecaoCate AnoCore" name="nAnoExibicao" id="anoEscolhido">
                                            <!-- JavaScript irá preencher os anos -->
                                        </select>

                                    </div>
                                </div>
                                <div class="card-body tamanho-body1">

                                    <div class="col-md-6">

                                            <p class="text-muted">
                                                <span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>
                                                <select name="nTipoMovimentacao" class="input-group-text caixaSelecaoCate caixaSelecaoCore" id="selecao" onchange="enviarFormulario(this.value);">
                                                    <option value="1">Entrada de valores</option>
                                                    <option value="2">Saída de valores</option>
                                                    <option value="3">Transferência</option>
                                                </select>
                                            </p>
                                        
                                            <p class="text-muted">
                                                <span class="tituloInputCore"><strong>Categoria:</strong></span>
                                                <select name="nCategoriaCore" class="input-group-text caixaSelecaoCate caixaSelecaoCore" >
                                                    <option value="1">Puxar do banco</option>
                                                </select>
                                            </p>
                                            
                                            <p class="text-muted">
                                                <span class="tituloInputCore"><strong>SubCategoria:</strong></span>
                                                <select name="nSubCategoriaCore" class="input-group-text caixaSelecaoCate caixaSelecaoCore" >
                                                    <option value="1">Puxar do banco</option>
                                                </select>
                                            </p>

                                            <p class="text-muted">
                                                <span class="tituloInputCore"><strong>Valor:</strong></span>

                                                <input name="nValorCore" type="text" class="form-control caixaSelecaoCore">
                                            </p>
                                    </div>


                                    <div class="col-md-6">

                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body tamanho-body2">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>






        <script>


        </script>




        <?php
        include('partes/js.php');
        ?>

</body>

</html>