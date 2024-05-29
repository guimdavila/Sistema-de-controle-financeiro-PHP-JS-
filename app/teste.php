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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


                        <div class="col-md-6 divCore">
                            <div class="card">
                                <div class="card-body tamanho-body2">
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
                                    <div class="text-muted-Core-button">
                                        <button type="button" id="btnAddCard" class="btn btn-novo-core" data-toggle="modal">Salvar</button>
                                    </div>
                                    <div id="cardsGravados">

                                    </div>



                                    <script>
                                        $(document).ready(function() {
                                            $('#btnAddCard').on('click', function() {

                                                var mesEscol = $('#mesEscolhido').val();
                                                var anoEscol = $('#anoEscolhido').val();

                                                console.log(mesEscol);
                                                console.log(anoEscol);

                                                if (mesEscol != "" && anoEscol != 0) {
                                                    $.getJSON('php/testeCore.php?mesEscol=' + mesEscol + '&anoEscol=' + anoEscol,
                                                        function(cards) {
                                                            if (cards.length > 0) {

                                                                var Retornocards = '';

                                                                $.each(cards, function(i, obj) {

                                                                    Retornocards += '<div class="container-resumo">' +
                                                                        '<div class="info">' +
                                                                        '<div class="col">' +
                                                                        '<div class="caixaSpan">' +
                                                                        '<span class="label label-span">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>' +
                                                                        '<span class="label label-span">Data:</span> <span class="value">' + obj.DATA + '</span>' +
                                                                        '<span class="label label-span">Descrição:</span> <span class="value">' + obj.DESCRICAO + '</span>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="col">' +
                                                                        '<div class="caixaSpan">' +
                                                                        '<span class="label label-span">Sub Categoria:</span> <span class="value">' + obj.NOMESUBCATEGORIA + '</span>' +
                                                                        '<span class="label label-span">Valor:</span> <span class="value">' + obj.VALOR + '</span>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>';


                                                                })
                                                                $('#cardsGravados').html(Retornocards).show();
                                                            } else {
                                                                console.log("Sem retorno de resultado")
                                                            }
                                                        })
                                                } else {

                                                    console.log("Não recebeu condicionais")
                                                }
                                            })
                                        })
                                    </script>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>


        <?php
        include('partes/js.php');
        ?>
</body>

</html>