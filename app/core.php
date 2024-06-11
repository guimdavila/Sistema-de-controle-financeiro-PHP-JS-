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
                                <form action="" id="form1">
                                    <div class="card-header">
                                        <div class="mesAnoCore" style="text-align: center; display: flex; justify-content: center;">
                                            <select class="input-group-text caixaSelecaoCate MesCore" name="nMesExibicao" id="mesEscolhido">
                                                <option value="" disabled selected>Mês</option>
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
                                                <option value="" disabled selected>Ano</option>
                                                <!-- JavaScript irá preencher os anos -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body tamanho-body1">
                                        <div class="col-md-12">
                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>
                                                <select id="selecaoTipo" name="nTipoMovimentacao" class="input-group-text caixaSelecaoCate caixaSelecaoCore">
                                                    <option value="" disabled selected>Selecione</option>
                                                    <option value="1">Entrada de valores</option>
                                                    <option value="2">Saída de valores</option>
                                                    <option value="3">Transferência</option>
                                                </select>
                                            </p>
                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>Categoria:</strong></span>
                                                <select name="nCategoriaCore" id="iCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>

                                                </select>
                                            </p>
                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>SubCategoria:</strong></span>
                                                <select name="nSubCategoriaCore" id="iSubCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>

                                                </select>
                                            </p>

                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>Data:</strong></span>
                                                <input name="nDataCore" id="iDataCore" type="date" class="form-control caixaSelecaoCore">
                                            </p>


                                            <p class="text-muted-Core text-muted-Core-area">
                                                <span class="tituloInputCore label-text-area"><strong>Descrição:</strong></span>
                                                <textarea name="nDescr" id="iDescr" class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>
                                            </p>

                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>Valor:</strong></span>
                                                <input name="nValorCore" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">
                                            </p>

                                            <div class="text-muted-Core-button">
                                                <button type="button" id="ibt" class="btn btn-novo-core" data-toggle="modal">Salvar</button>

                                                <button type="button" id="ibtAnual" class="btn btn-novo-core" data-toggle="modal" data-target="#visaoAnual">Anual</button>
                                            </div>

                                            <div class="modal fade" id="visaoAnual">
                                                <div class="modal-dialog modal-custom">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Anual</h4>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="card-body" id="tabelaAnual">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="col-md-6 divCore">
                            <div class="card">
                                <div class="card-body tamanho-body2">
                                    <div id="cardsGravados" class="cardsGravados">
                                        <!--CARDS-->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="footerCore">
            <div class="containerResultados row">

                <div class="col-4">
                    <i class="fa-solid fa-plus labelResultados iconsResultados"></i>
                    <div class="col-10 fa-solid text-success iconefooter" id="iPositivo"></div>
                </div>

                <div class="col-4">
                    <i class="fa-solid fa-minus labelResultados iconsResultados"></i>
                    <div class="col-10 fa-solid text-danger iconefooter" id="iNegativo"></div>
                </div>

                <div class="col-4">
                    <i class="fa-solid fa-equals labelResultados iconsResultados"></i>
                    <div class="col-10 fa-solid iconefooter" id="iSaldo"></div>
                </div>
            </div>
        </footer>
    </div>



    <script>
        //GERA ANUAL
        $(document).ready(function() {
            $('#ibtAnual').on('click', function() {
                var anoEscol = $('#ibtAnual').val();
                var RetornoAnual = '';

                if (anoEscol != "") {

                    RetornoAnual = '<span class="labelResultados"><strong> Preencher campo anual </strong></span>'

                } else {
                    var anoEscolAnual = $('#anoEscolhido').val();

                    $.getJSON('php/Corephpajax.php?anoEscolhido=' + anoEscolAnual,
                        function(saldoanual) {

                            var positivoJaneiro = 0;
                            var negativoJaneiro = 0;
                            var saldoJaneiro = 0;

                            var positivoFeveiro = 0;
                            var negativoFeveiro = 0;
                            var saldoFeveiro = 0;

                            var positivoMarco = 0;
                            var negativoMarco = 0;
                            var saldoMarco = 0;

                            var positivoAbril = 0;
                            var negativoAbril = 0;
                            var saldoAbril = 0;

                            var positivoMaio = 0;
                            var negativoMaio = 0;
                            var saldoMaio = 0;

                            var positivoJunho = 0;
                            var negativoJunho = 0;
                            var saldoJunho = 0;

                            var positivoJulho = 0;
                            var negativoJulho = 0;
                            var saldoJulho = 0;

                            var positivoAgosto = 0;
                            var negativoAgosto = 0;
                            var saldoAgosto = 0;

                            var positivoSetembro = 0;
                            var negativoSetembro = 0;
                            var saldoSetembro = 0;

                            var positivoOutubro = 0;
                            var negativoOutubro = 0;
                            var saldoOutubro = 0;

                            var positivoNovembro = 0;
                            var negativoNovembro = 0;
                            var saldoNovembro = 0;

                            var positivoDezembro = 0;
                            var negativoDezembro = 0;
                            var saldoDezembro = 0;

                            if (saldoanual.length > 0) {

                                $.each(saldoanual, function(i, obj) {

                                    if (obj.DATA >= anoEscolAnual + "-01-01 00:00:00" && obj.DATA <= anoEscolAnual + "-01-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoJaneiro += parseFloat(obj.VALOR);
                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoJaneiro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoJaneiro = 0;
                                            negativoJaneiro = 0;
                                        }

                                        saldoJaneiro = positivoJaneiro - negativoJaneiro;

                                        positivoJaneiro = parseFloat(positivoJaneiro.toFixed(2));
                                        negativoJaneiro = parseFloat(negativoJaneiro.toFixed(2));
                                        saldoJaneiro = parseFloat(saldoJaneiro.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-02-01 00:00:00" && obj.DATA <= anoEscolAnual + "-02-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoFeveiro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoFeveiro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoFeveiro = 0;
                                            negativoFeveiro = 0;
                                        }
                                        saldoFeveiro = positivoFeveiro - negativoFeveiro;

                                        positivoFeveiro = parseFloat(positivoFeveiro.toFixed(2));
                                        negativoFeveiro = parseFloat(negativoFeveiro.toFixed(2));
                                        saldoFeveiro = parseFloat(saldoFeveiro.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-03-01 00:00:00" && obj.DATA <= anoEscolAnual + "-03-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoMarco += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoMarco += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoMarco = 0;
                                            negativoMarco = 0;
                                        }
                                        saldoMarco = positivoMarco - negativoMarco;

                                        positivoMarco = parseFloat(positivoMarco.toFixed(2));
                                        negativoMarco = parseFloat(negativoMarco.toFixed(2));
                                        saldoMarco = parseFloat(saldoMarco.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-04-01 00:00:00" && obj.DATA <= anoEscolAnual + "-04-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoAbril += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoAbril += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoAbril = 0;
                                            negativoAbril = 0;
                                        }
                                        saldoAbril = positivoAbril - negativoAbril;

                                        positivoAbril = parseFloat(positivoAbril.toFixed(2));
                                        negativoAbril = parseFloat(negativoAbril.toFixed(2));
                                        saldoAbril = parseFloat(saldoAbril.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-05-01 00:00:00" && obj.DATA <= anoEscolAnual + "-05-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoMaio += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoMaio += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoMaio = 0;
                                            negativoMaio = 0;
                                        }
                                        saldoMaio = positivoMaio - negativoMaio;

                                        positivoMaio = parseFloat(positivoMaio.toFixed(2));
                                        negativoMaio = parseFloat(negativoMaio.toFixed(2));
                                        saldoMaio = parseFloat(saldoMaio.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-06-01 00:00:00" && obj.DATA <= anoEscolAnual + "-06-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoJunho += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoJunho += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoJunho = 0;
                                            negativoJunho = 0;
                                        }
                                        saldoJunho = positivoJunho - negativoJunho;

                                        positivoJunho = parseFloat(positivoJunho.toFixed(2));
                                        negativoJunho = parseFloat(negativoJunho.toFixed(2));
                                        saldoJunho = parseFloat(saldoJunho.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-07-01 00:00:00" && obj.DATA <= anoEscolAnual + "-07-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoJulho += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoJulho += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoJulho = 0;
                                            negativoJulho = 0;
                                        }
                                        saldoJulho = positivoJulho - negativoJulho;

                                        positivoJulho = parseFloat(positivoJulho.toFixed(2));
                                        negativoJulho = parseFloat(negativoJulho.toFixed(2));
                                        saldoJulho = parseFloat(saldoJulho.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-08-01 00:00:00" && obj.DATA <= anoEscolAnual + "-08-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoAgosto += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoAgosto += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoAgosto = 0;
                                            negativoAgosto = 0;
                                        }
                                        saldoAgosto = positivoAgosto - negativoAgosto;

                                        positivoAgosto = parseFloat(positivoAgosto.toFixed(2));
                                        negativoAgosto = parseFloat(negativoAgosto.toFixed(2));
                                        saldoAgosto = parseFloat(saldoAgosto.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-09-01 00:00:00" && obj.DATA <= anoEscolAnual + "-09-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoSetembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoSetembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoSetembro = 0;
                                            negativoSetembro = 0;
                                        }
                                        saldoSetembro = positivoSetembro - negativoSetembro;

                                        positivoSetembro = parseFloat(positivoSetembro.toFixed(2));
                                        negativoSetembro = parseFloat(negativoSetembro.toFixed(2));
                                        saldoSetembro = parseFloat(saldoSetembro.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-10-01 00:00:00" && obj.DATA <= anoEscolAnual + "-10-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoOutubro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoOutubro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoOutubro = 0;
                                            negativoOutubro = 0;
                                        }
                                        saldoOutubro = positivoOutubro - negativoOutubro;

                                        positivoOutubro = parseFloat(positivoOutubro.toFixed(2));
                                        negativoOutubro = parseFloat(negativoOutubro.toFixed(2));
                                        saldoOutubro = parseFloat(saldoOutubro.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-11-01 00:00:00" && obj.DATA <= anoEscolAnual + "-11-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoNovembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoNovembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoNovembro = 0;
                                            negativoNovembro = 0;
                                        }
                                        saldoNovembro = positivoNovembro - negativoNovembro;

                                        positivoNovembro = parseFloat(positivoNovembro.toFixed(2));
                                        negativoNovembro = parseFloat(negativoNovembro.toFixed(2));
                                        saldoNovembro = parseFloat(saldoNovembro.toFixed(2));

                                    } else if (obj.DATA >= anoEscolAnual + "-12-01 00:00:00" && obj.DATA <= anoEscolAnual + "-12-31 00:00:00") {

                                        if (obj.IDTIPOMOVIMENTACAO == 1) {
                                            positivoDezembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                            negativoDezembro += parseFloat(obj.VALOR);

                                        } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                            positivoDezembro = 0;
                                            negativoDezembro = 0;
                                        }
                                        saldoDezembro = positivoDezembro - negativoDezembro;

                                        positivoDezembro = parseFloat(positivoDezembro.toFixed(2));
                                        negativoDezembro = parseFloat(negativoDezembro.toFixed(2));
                                        saldoDezembro = parseFloat(saldoDezembro.toFixed(2));

                                    }


                                    RetornoAnual = '<table class="table table-bordered table-hover Anualtable">' +
                                        '<thead>' +
                                        '<tr class="mes colunasCategorias">' +
                                        '<th></th>' +
                                        '<th>Janeiro</th>' +
                                        '<th>Fevereiro</th>' +
                                        '<th>Março</th>' +
                                        '<th>Abril</th>' +
                                        '<th>Maio</th>' +
                                        '<th>Junho</th>' +
                                        '<th>Julho</th>' +
                                        '<th>Agosto</th>' +
                                        '<th>Setembro</th>' +
                                        '<th>Outubro</th>' +
                                        '<th>Novembro</th>' +
                                        '<th>Dezembro</th>' +
                                        '</tr>' +
                                        '</thead>' +
                                        '<tbody id="iTbodyAnual">' +
                                        '<tr>' +
                                        '<td class="colunasCategoriasCore">Positivo</td>' +
                                        '<td> R$ ' + positivoJaneiro + '</td>' +
                                        '<td> R$ ' + positivoFeveiro + '</td>' +
                                        '<td> R$ ' + positivoMarco + '</td>' +
                                        '<td> R$ ' + positivoAbril + '</td>' +
                                        '<td> R$ ' + positivoMaio + '</td>' +
                                        '<td> R$ ' + positivoJunho + '</td>' +
                                        '<td> R$ ' + positivoJulho + '</td>' +
                                        '<td> R$ ' + positivoAgosto + '</td>' +
                                        '<td> R$ ' + positivoSetembro + '</td>' +
                                        '<td> R$ ' + positivoOutubro + '</td>' +
                                        '<td> R$ ' + positivoNovembro + '</td>' +
                                        '<td> R$ ' + positivoDezembro + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td class="colunasCategoriasCore">Negativo</td>' +
                                        '<td> R$ ' + negativoJaneiro + '</td>' +
                                        '<td> R$ ' + negativoFeveiro + '</td>' +
                                        '<td> R$ ' + negativoMarco + '</td>' +
                                        '<td> R$ ' + negativoAbril + '</td>' +
                                        '<td> R$ ' + negativoMaio + '</td>' +
                                        '<td> R$ ' + negativoJunho + '</td>' +
                                        '<td> R$ ' + negativoJulho + '</td>' +
                                        '<td> R$ ' + negativoAgosto + '</td>' +
                                        '<td> R$ ' + negativoSetembro + '</td>' +
                                        '<td> R$ ' + negativoOutubro + '</td>' +
                                        '<td> R$ ' + negativoNovembro + '</td>' +
                                        '<td> R$ ' + negativoDezembro + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td class="colunasCategoriasCore">Saldo</td>' +
                                        '<td> R$ ' + saldoJaneiro + '</td>' +
                                        '<td> R$ ' + saldoFeveiro + '</td>' +
                                        '<td> R$ ' + saldoMarco + '</td>' +
                                        '<td> R$ ' + saldoAbril + '</td>' +
                                        '<td> R$ ' + saldoMaio + '</td>' +
                                        '<td> R$ ' + saldoJunho + '</td>' +
                                        '<td> R$ ' + saldoJulho + '</td>' +
                                        '<td> R$ ' + saldoAgosto + '</td>' +
                                        '<td> R$ ' + saldoSetembro + '</td>' +
                                        '<td> R$ ' + saldoOutubro + '</td>' +
                                        '<td> R$ ' + saldoNovembro + '</td>' +
                                        '<td> R$ ' + saldoDezembro + '</td>' +
                                        '</tr>'
                                    '</tbody>' +
                                    '</table>';
                                })

                            } else {
                                console.log("Sem retorno de resultado");
                            }

                            $('#tabelaAnual').html(RetornoAnual).show();

                        })
                }
            })
        });

        //CHAMA CATEGORIA
        $(document).ready(function() {
            $('#selecaoTipo').on('change', function() {
                var tipoMov = $('#selecaoTipo').val();
                var opcaoSub = '';
                opcaoSub = '<option value="" disabled selected></option>'
                $('#iSubCategoria').html(opcaoSub).show();
                var opcaoCategoria = '';
                if (tipoMov != "" && tipoMov != 0) {
                    console.log('php/Corephpajax.php?tipoMov=' + tipoMov)

                    $.getJSON('php/Corephpajax.php?tipoMov=' + tipoMov,
                        function(dados) {
                            opcaoCategoria = '<option value="" disabled selected>Selecione</option>'


                            if (dados.length > 0) {
                                $.each(dados, function(i, obj) {
                                    opcaoCategoria += '<option value="' + obj.idCategoria + '">' + obj.nomeCategoria + '</option>';
                                })
                                $('#iCategoria').attr("required", "req");
                                $('#iCategoria').html(opcaoCategoria).show();
                            } else {
                                opcaoCategoria += '<option value="">Puxar do banco</option>'
                                $('iCategoria').html(opcaoCategoria).show()
                            }
                        })
                } else {
                    opcaoCategoria += '<option value="">Selecione</option>'
                    $('iCategoria').html(opcaoCategoria).show()
                }
            })
        })

        //CHAMA SUBCATEGORIA
        $(document).ready(function() {

            $('#iCategoria').on('change', function() {
                var categoria = $('#iCategoria').val();
                if (categoria != "" && categoria != 0) {
                    console.log('php/Corephpajax.php?categoria=' + categoria)

                    $.getJSON('php/Corephpajax.php?categoria=' + categoria,
                        function(dados1) {

                            opcaoSub = '<option value="" disabled selected>Selecione</option>'

                            if (dados1.length > 0) {
                                $.each(dados1, function(i, obj) {
                                    opcaoSub += '<option value="' + obj.idSubCategoria + '">' + obj.nomeSubCategoria + '</option>';
                                })
                                $('#iSubCategoria').attr("required", "req");
                                $('#iSubCategoria').html(opcaoSub).show();
                            } else {
                                opcaoSub += '<option value="">Puxar do banco</option>'
                                $('iSubCategoria').html(opcaoSub).show();
                            }
                        })
                } else {
                    opcaoSub += '<option value="">Selecione</option>'
                    $('iSubCategoria').html(opcaoSub).show();

                }


            })
        })

        //////////////////////////////// EDITAR CARD  ///////////////////////////////////////////////////

        $(document).ready(function() {
            // Função para atualizar os cartões e valores
            $('#mesEscolhido, #anoEscolhido').on('change', function() {
                var mesEscol = $('#mesEscolhido').val();
                var anoEscol = $('#anoEscolhido').val();

                if (mesEscol != "" && mesEscol != 0 && anoEscol != "" && anoEscol != 0) {
                    console.log(mesEscol, anoEscol);

                    $.getJSON('php/Corephpajax.php?mesEscol=' + mesEscol + '&anoEscol=' + anoEscol, function(retornoCardsCore) {
                        if (retornoCardsCore.length > 0) {
                            var Retornocards = '';
                            var Retornapositivo = 0;
                            var RetornaNegativo = 0;
                            var RetornaSaldo = 0;

                            $.each(retornoCardsCore, function(i, obj) {
                                var dataFormatada = "";
                                if (obj.DATA != "") {
                                    const dataStr = obj.DATA;
                                    const dataObj = new Date(dataStr);
                                    const dia = String(dataObj.getDate()).padStart(2, '0');
                                    const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
                                    const ano = dataObj.getFullYear();
                                    dataFormatada = `${dia}/${mes}/${ano}`;
                                }
                                var descricao = obj.DESCRICAO == "" ? "-" : obj.DESCRICAO;

                                Retornocards += '<div class="container-resumo-card">' +
                                    '<div class="info">' +
                                    '<div class="caixaSpanCard">' +
                                    '<span class="label label-priCol">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>' +
                                    '<span class="label label-secCol">Sub Categoria:</span> <span class="value value-secCol ">' + obj.NOMESUBCATEGORIA + '</span>' +
                                    '</div>' +
                                    '<div class="caixaSpanCard">' +
                                    '<span class="label label-priCol">Data:</span> <span class="value">' + dataFormatada + '</span>' +
                                    '<span class="label label-secCol">Descrição:</span> <span class="value value-secCol">' + descricao + '</span> ' +
                                    '<!--<button class="botaoInvisivelCard" data-toggle="modal" data-target="#editar' + obj.IDMOVIMENTACAO + '" id="btnEditCar_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-pen classeLapis iconTabela"></i></button>-->' +
                                    '<button class="botaoInvisivelCard" id="btnExc_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-trash iconTabela"></i></button>' +
                                    '</div>' +
                                    '<div class="caixaSpanCard">' +
                                    '<span class="label label-priCol">Valor:</span> <span class="value">  R$' + obj.VALOR + '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="modal fade" id="editar' + obj.IDMOVIMENTACAO + '">' +
                                    '<div class="modal-dialog modal-custom">' +
                                    '<div class="modal-content">' +
                                    '<div class="modal-header">' +
                                    '<h4 class="modal-title">Editar</h4>' +
                                    '<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '</div>' +
                                    '<div class="modal-body">' +
                                    '<div class="row">' +
                                    '<div class="col-md-12">' +
                                    '<form action="">' +
                                    '<div class="col-md-12">' +
                                    '<p class="text-muted-Core">' +
                                    '<span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>' +
                                    '<select id="selecaoTipoAlterar" name="nTipoMovimentacaoAltera" class="input-group-text caixaSelecaoCate caixaSelecaoCore">' +
                                    '<option value="" disabled selected>Selecione</option>' +
                                    '<option value="1">Entrada de valores</option>' +
                                    '<option value="2">Saída de valores</option>' +
                                    '<option value="3">Transferência</option>' +
                                    '</select>' +
                                    '</p>' +
                                    '<p class="text-muted-Core">' +
                                    '<span class="tituloInputCore"><strong>Categoria:</strong></span>' +
                                    '<select name="nCategoriaCoreAltera" id="iCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                    '</select>' +
                                    '</p>' +
                                    '<p class="text-muted-Core">' +
                                    '<span class="tituloInputCore"><strong>SubCategoria:</strong></span>' +
                                    '<select name="nSubCategoriaCoreAltera" id="iSubCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                    '</select>' +
                                    '</p>' +
                                    '<p class="text-muted-Core">' +
                                    '<span class="tituloInputCore"><strong>Data:</strong></span>' +
                                    '<input name="nDataCoreAltera" id="iDataCore" type="date" class="form-control caixaSelecaoCore">' +
                                    '</p>' +
                                    '<p class="text-muted-Core text-muted-Core-area">' +
                                    '<span class="tituloInputCore label-text-area"><strong>Descrição:</strong></span>' +
                                    '<textarea name="nDescrAltera" id="iDescr" class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>' +
                                    '</p>' +
                                    '<p class="text-muted-Core">' +
                                    '<span class="tituloInputCore"><strong>Valor:</strong></span>' +
                                    '<input name="nValorCoreAltera" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">' +
                                    '</p>' +
                                    '<div class="text-muted-Core-button">' +
                                    '<button type="button" id="ibtAlterarCard" class="btn btn-novo-core" data-toggle="modal">Alterar</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</form>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                                if (obj.IDTIPOMOVIMENTACAO == 1) {
                                    Retornapositivo += parseFloat(obj.VALOR);
                                } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                    RetornaNegativo += parseFloat(obj.VALOR);
                                } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                    Retornapositivo = 0;
                                    RetornaNegativo = 0;
                                }
                            });

                            $('#iPositivo').html(Retornapositivo).show();
                            $('#iNegativo').html(RetornaNegativo).show();
                            var RetornaSaldo = Retornapositivo - RetornaNegativo;
                            $('#iSaldo').html(RetornaSaldo).show();
                            $('#cardsGravados').html(Retornocards).show();
                        } else {
                            console.log("Sem retorno de resultado");
                        }
                    });
                } else {
                    console.log("Sem retorno de resultado");
                }
            })
        });


        $(document).ready(function() {
            $('#ibt').on('click', function() {
                var mesEscol = $('#mesEscolhido').val();
                var anoEscol = $('#anoEscolhido').val();
                console.log(mesEscol);
                if (mesEscol == "" || anoEscol == "") {

                } else {
                    var tipo = $('#selecaoTipo').val();
                    var categoria = $('#iCategoria').val();
                    var subcategoria = $('#iSubCategoria').val();
                    const dataa = $('#iDataCore').val().replace(/[^0-9]/g, '');
                    var data = dataa;
                    var desc = $('#iDescr').val();
                    var valo = $('#valoCore').val();
                    valo = valo.replace(/[^0-9,]/g, '');
                    valo = valo.replace(/,/g, '.');
                    var valor = valo;

                    $.getJSON('php/coreInsert.php?tipo=' + tipo + '&categoria=' + categoria + '&subcategoria=' + subcategoria + '&data=' + data +
                        '&desc=' + desc + '&valor=' + valor + '&mesEscol=' + mesEscol + '&anoEscol=' + anoEscol,
                        function(cards) {
                            var Retornocards = '';
                            var Retornapositivo = 0;
                            var RetornaNegativo = 0;
                            var RetornaSaldo = 0;

                            if (cards.length > 0) {

                                $.each(cards, function(i, obj) {
                                    var dataFormatada = "";
                                    if (obj.DATA != "") {
                                        const dataStr = obj.DATA;

                                        const dataObj = new Date(dataStr);

                                        const dia = String(dataObj.getDate()).padStart(2, '0');
                                        const mes = String(dataObj.getMonth() + 1).padStart(2, '0'); // Os meses são indexados de 0 a 11
                                        const ano = dataObj.getFullYear();

                                        // Formate a data no formato desejado
                                        dataFormatada = `${dia}/${mes}/${ano}`;

                                    }

                                    var descricao = "";
                                    if (obj.DESCRICAO == "") {
                                        descricao = "-"
                                    } else {
                                        descricao = obj.DESCRICAO;
                                    }

                                    Retornocards += '<div class="container-resumo-card">' +
                                        '<div class="info">' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>' +
                                        '<span class="label label-secCol">Sub Categoria:</span> <span class="value value-secCol ">' + obj.NOMESUBCATEGORIA + '</span>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Data:</span> <span class="value">' + dataFormatada + '</span>' +
                                        '<span class="label label-secCol">Descrição:</span> <span class="value value-secCol">' + descricao + '</span> ' +
                                        '<!--<button class="botaoInvisivelCard" data-toggle="modal" data-target="#editar' + obj.IDMOVIMENTACAO + '" id="btnEditCar_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-pen classeLapis iconTabela"></i></button>-->' +
                                        '<button class="botaoInvisivelCard" id="btnExc_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-trash iconTabela"></i></button>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Valor:</span> <span class="value">  R$' + obj.VALOR + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="modal fade" id="editar' + obj.IDMOVIMENTACAO + '">' +
                                        '<div class="modal-dialog modal-custom">' +
                                        '<div class="modal-content">' +
                                        '<div class="modal-header">' +
                                        '<h4 class="modal-title">Editar</h4>' +
                                        '<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '<div class="modal-body">' +
                                        '<div class="row">' +
                                        '<div class="col-md-12">' +
                                        '<form action="">' +
                                        '<div class="col-md-12">' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>' +
                                        '<select id="selecaoTipoAlterar" name="nTipoMovimentacaoAltera" class="input-group-text caixaSelecaoCate caixaSelecaoCore">' +
                                        '<option value="" disabled selected>Selecione</option>' +
                                        '<option value="1">Entrada de valores</option>' +
                                        '<option value="2">Saída de valores</option>' +
                                        '<option value="3">Transferência</option>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Categoria:</strong></span>' +
                                        '<select name="nCategoriaCoreAltera" id="iCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>SubCategoria:</strong></span>' +
                                        '<select name="nSubCategoriaCoreAltera" id="iSubCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Data:</strong></span>' +
                                        '<input name="nDataCoreAltera" id="iDataCore" type="date" class="form-control caixaSelecaoCore">' +
                                        '</p>' +
                                        '<p class="text-muted-Core text-muted-Core-area">' +
                                        '<span class="tituloInputCore label-text-area"><strong>Descrição:</strong></span>' +
                                        '<textarea name="nDescrAltera" id="iDescr" class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Valor:</strong></span>' +
                                        '<input name="nValorCoreAltera" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">' +
                                        '</p>' +
                                        '<div class="text-muted-Core-button">' +
                                        '<button type="button" id="ibtAlterarCard" class="btn btn-novo-core" data-toggle="modal">Alterar</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '</form>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    if (obj.IDTIPOMOVIMENTACAO == 1) {
                                        Retornapositivo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                        RetornaNegativo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                        Retornapositivo = 0;
                                        RetornaNegativo = 0;
                                    }

                                })

                                $('#iPositivo').html(Retornapositivo).show()
                                $('#iNegativo').html(Retornapositivo).show()
                                var RetornaSaldo = Retornapositivo - RetornaNegativo;
                                $('#iSaldo').html(RetornaSaldo).show();
                                $('#cardsGravados').html(Retornocards).show();

                            } else {
                                console.log("Sem retorno de resultado");
                            }

                            $('#cardsGravados').html(Retornocards).show();

                        });
                }
            });
        });
        //////////////////////////////////////////////////////
        $(document).ready(function() {

            $('#mesEscolhido, #anoEscolhido').on('change', function() {

                var mesEscol = $('#mesEscolhido').val();
                var anoEscol = $('#anoEscolhido').val();

                if (mesEscol != "" && mesEscol != null && anoEscol != "" && anoEscol != null) {

                    console.log(mesEscol, anoEscol)

                    $.getJSON('php/Corephpajax.php?mesEscol=' + mesEscol + '&anoEscol=' + anoEscol,
                        function(retornoCardsCore) {

                            if (retornoCardsCore.length > 0) {

                                var Retornocards = '';
                                var Retornapositivo = 0;
                                var RetornaNegativo = 0;
                                var RetornaSaldo = 0;

                                $.each(retornoCardsCore, function(i, obj) {

                                    var dataFormatada = "";
                                    if (obj.DATA != "") {
                                        const dataStr = obj.DATA;

                                        const dataObj = new Date(dataStr);

                                        const dia = String(dataObj.getDate()).padStart(2, '0');
                                        const mes = String(dataObj.getMonth() + 1).padStart(2, '0'); // Os meses são indexados de 0 a 11
                                        const ano = dataObj.getFullYear();

                                        // Formate a data no formato desejado
                                        dataFormatada = `${dia}/${mes}/${ano}`;

                                    }

                                    var descricao = "";
                                    if (obj.DESCRICAO == "") {
                                        descricao = "-"
                                    } else {
                                        descricao = obj.DESCRICAO;
                                    }


                                    Retornocards += '<div class="container-resumo-card">' +
                                        '<div class="info">' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>' +
                                        '<span class="label label-secCol">Sub Categoria:</span> <span class="value value-secCol ">' + obj.NOMESUBCATEGORIA + '</span>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Data:</span> <span class="value">' + dataFormatada + '</span>' +
                                        '<span class="label label-secCol">Descrição:</span> <span class="value value-secCol">' + descricao + '</span> ' +
                                        '<!--<button class="botaoInvisivelCard" data-toggle="modal" data-target="#editar' + obj.IDMOVIMENTACAO + '" id="btnEditCar_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-pen classeLapis iconTabela"></i></button>-->' +
                                        '<button class="botaoInvisivelCard" id="btnExc_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-trash iconTabela"></i></button>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Valor:</span> <span class="value">  R$' + obj.VALOR + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="modal fade" id="editar' + obj.IDMOVIMENTACAO + '">' +
                                        '<div class="modal-dialog modal-custom">' +
                                        '<div class="modal-content">' +
                                        '<div class="modal-header">' +
                                        '<h4 class="modal-title">Editar</h4>' +
                                        '<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '<div class="modal-body">' +
                                        '<div class="row">' +
                                        '<div class="col-md-12">' +
                                        '<form action="">' +
                                        '<div class="col-md-12">' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>' +
                                        '<select id="selecaoTipoAlterar" name="nTipoMovimentacaoAltera" class="input-group-text caixaSelecaoCate caixaSelecaoCore">' +
                                        '<option value="" disabled selected>Selecione</option>' +
                                        '<option value="1">Entrada de valores</option>' +
                                        '<option value="2">Saída de valores</option>' +
                                        '<option value="3">Transferência</option>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Categoria:</strong></span>' +
                                        '<select name="nCategoriaCoreAltera" id="iCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>SubCategoria:</strong></span>' +
                                        '<select name="nSubCategoriaCoreAltera" id="iSubCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Data:</strong></span>' +
                                        '<input name="nDataCoreAltera" id="iDataCore" type="date" class="form-control caixaSelecaoCore">' +
                                        '</p>' +
                                        '<p class="text-muted-Core text-muted-Core-area">' +
                                        '<span class="tituloInputCore label-text-area"><strong>Descrição:</strong></span>' +
                                        '<textarea name="nDescrAltera" id="iDescr" class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Valor:</strong></span>' +
                                        '<input name="nValorCoreAltera" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">' +
                                        '</p>' +
                                        '<div class="text-muted-Core-button">' +
                                        '<button type="button" id="ibtAlterarCard" class="btn btn-novo-core" data-toggle="modal">Alterar</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '</form>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    if (obj.IDTIPOMOVIMENTACAO == 1) {
                                        Retornapositivo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                        RetornaNegativo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                        Retornapositivo = 0;
                                        RetornaNegativo = 0;
                                    }

                                })

                            } else {
                                Retornocards = '<div class="container-resumo">' +
                                    '<div class="info">' +
                                    '<div class="col">' +
                                    '<div class="caixaSpan">' +
                                    '<span class="label label-span">Sem retorno de resultado</span>';

                                Retornapositivo = 0;
                                RetornaNegativo = 0;

                                console.log("Sem retorno de resultado")
                            }
                            $('#iPositivo').html(Retornapositivo).show();
                            $('#iNegativo').html(RetornaNegativo).show();

                            var RetornaSaldo = Retornapositivo - RetornaNegativo;

                            $('#iSaldo').html(RetornaSaldo).show();
                            $('#cardsGravados').html(Retornocards).show();

                        })
                } else {
                    console.log("Sem retorno de resultado")
                }


            })
        })
        ////////////////////////////////////////////////////

        //document.addEventListener('DOMContentLoaded', (event) => {
        $(document).ready(function() {

            $('#mesEscolhido, #anoEscolhido').on('change', function() {

                var mesEscol = $('#mesEscolhido').val();
                var anoEscol = $('#anoEscolhido').val();

                if (mesEscol != "" && mesEscol != 0 && anoEscol != "" && anoEscol != 0) {

                    console.log(mesEscol, anoEscol)

                    $.getJSON('php/Corephpajax.php?mesEscol=' + mesEscol + '&anoEscol=' + anoEscol,
                        function(retornoCardsCore) {

                            if (retornoCardsCore.length > 0) {

                                var Retornocards = '';
                                var Retornapositivo = 0;
                                var RetornaNegativo = 0;
                                var RetornaSaldo = 0;


                                $.each(retornoCardsCore, function(i, obj) {

                                    var dataFormatada = "";

                                    if (obj.DATA != "") {
                                        const dataStr = obj.DATA;

                                        const dataObj = new Date(dataStr);

                                        const dia = String(dataObj.getDate()).padStart(2, '0');
                                        const mes = String(dataObj.getMonth() + 1).padStart(2, '0'); // Os meses são indexados de 0 a 11
                                        const ano = dataObj.getFullYear();

                                        // Formate a data no formato desejado
                                        dataFormatada = `${dia}/${mes}/${ano}`;

                                    }

                                    var descricao = "";
                                    if (obj.DESCRICAO == "") {
                                        descricao = "-"
                                    } else {
                                        descricao = obj.DESCRICAO;
                                    }


                                    var ModalAlteraCards = '';

                                    Retornocards +=
                                        '<div class="container-resumo-card">' +
                                        '<div class="info">' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Categoria:</span> <span class="value">' + obj.NOMECATEGORIA + '</span>' +
                                        '<span class="label label-secCol">Sub Categoria:</span> <span class="value value-secCol ">' + obj.NOMESUBCATEGORIA + '</span>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Data:</span> <span class="value">' + dataFormatada + '</span>' +
                                        '<span class="label label-secCol">Descrição:</span> <span class="value value-secCol">' + descricao + '</span> ' +
                                        '<!--<button class="botaoInvisivelCard" data-toggle="modal" data-target="#editar' + obj.IDMOVIMENTACAO + '" id="btnEditCar_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-pen classeLapis iconTabela"></i></button>-->' +
                                        '<button class="botaoInvisivelCard" id="btnExc_' + obj.IDMOVIMENTACAO + '"><i class="fa-solid fa-trash iconTabela"></i></button>' +
                                        '</div>' +
                                        '<div class="caixaSpanCard">' +
                                        '<span class="label label-priCol">Valor:</span> <span class="value">  R$' + obj.VALOR + '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="modal fade" id="editar' + obj.IDMOVIMENTACAO + '">' +
                                        '<div class="modal-dialog modal-custom">' +
                                        '<div class="modal-content">' +
                                        '<div class="modal-header">' +
                                        '<h4 class="modal-title">Editar</h4>' +
                                        '<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '<div class="modal-body">' +
                                        '<div class="row">' +
                                        '<div class="col-md-12">' +
                                        '<form action="">' +
                                        '<div class="col-md-12">' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Tipo de movimentação:</strong></span>' +
                                        '<select id="selecaoTipoAlterar" name="nTipoMovimentacaoAltera" class="input-group-text caixaSelecaoCate caixaSelecaoCore">' +
                                        '<option value="" disabled selected>Selecione</option>' +
                                        '<option value="1">Entrada de valores</option>' +
                                        '<option value="2">Saída de valores</option>' +
                                        '<option value="3">Transferência</option>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Categoria:</strong></span>' +
                                        '<select name="nCategoriaCoreAltera" id="iCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>SubCategoria:</strong></span>' +
                                        '<select name="nSubCategoriaCoreAltera" id="iSubCategoria" class="input-group-text caixaSelecaoCate caixaSelecaoCore" disabled>' +
                                        '</select>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Data:</strong></span>' +
                                        '<input name="nDataCoreAltera" id="iDataCore" type="date" class="form-control caixaSelecaoCore">' +
                                        '</p>' +
                                        '<p class="text-muted-Core text-muted-Core-area">' +
                                        '<span class="tituloInputCore label-text-area"><strong>Descrição:</strong></span>' +
                                        '<textarea name="nDescrAltera" id="iDescr" class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>' +
                                        '</p>' +
                                        '<p class="text-muted-Core">' +
                                        '<span class="tituloInputCore"><strong>Valor:</strong></span>' +
                                        '<input name="nValorCoreAltera" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">' +
                                        '</p>' +
                                        '<div class="text-muted-Core-button">' +
                                        '<button type="button" id="ibtAlterarCard" class="btn btn-novo-core" data-toggle="modal">Alterar</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '</form>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    if (obj.IDTIPOMOVIMENTACAO == 1) {
                                        Retornapositivo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO == 2) {
                                        RetornaNegativo += parseFloat(obj.VALOR);

                                    } else if (obj.IDTIPOMOVIMENTACAO != 1 && obj.IDTIPOMOVIMENTACAO != 2 && obj.IDTIPOMOVIMENTACAO != 3) {
                                        Retornapositivo = 0;
                                        RetornaNegativo = 0;
                                    }

                                })
                                $('#iPositivo').html(Retornapositivo).show();
                                $('#iNegativo').html(RetornaNegativo).show();

                                var RetornaSaldo = Retornapositivo - RetornaNegativo;

                                $('#iSaldo').html(RetornaSaldo).show();
                                $('#cardsGravados').html(Retornocards).show();
                            } else {
                                console.log("Sem retorno de resultado")
                            }
                        })
                } else {
                    console.log("Sem retorno de resultado")
                }


            })
        });


        $(document).ready(function() {
            console.log("1")
            $('#selecaoTipoAlterar').on('change', function() {

                console.log("2")
                var tipoMov = $('#selecaoTipoAlterar').val();
                var opcaoSub = '';
                var opcaoCategoria = '';

                console.log(tipoMov)

                if (tipoMov != "" && tipoMov != 0) {

                    $.getJSON('php/Corephpajax.php?tipoMov=' + tipoMov,
                        function(dados) {
                            opcaoCategoria = '<option value="" disabled selected>Selecione</option>'


                            if (dados.length > 0) {
                                $.each(dados, function(i, obj) {
                                    opcaoCategoria += '<option value="' + obj.idCategoria + '">' + obj.nomeCategoria + '</option>';
                                })
                                $('#iCategoria').attr("required", "req");
                                $('#iCategoria').html(opcaoCategoria).show();
                            } else {
                                opcaoCategoria += '<option value="">Puxar do banco</option>'
                                $('iCategoria').html(opcaoCategoria).show()
                            }
                        })
                } else {
                    opcaoCategoria += '<option value="">Selecione</option>'
                    $('iCategoria').html(opcaoCategoria).show()
                }
            })
        })


        document.addEventListener('DOMContentLoaded', (event) => {

            const seleCore = document.getElementById('selecaoTipo');
            const cateCore = document.getElementById('iCategoria');
            const SubCCore = document.getElementById('iSubCategoria');
            const DataCore = document.getElementById('iDataCore');
            const DescCore = document.getElementById('iDescr');
            const valoCore = document.getElementById('valoCore');

            seleCore.addEventListener('input', checkInput);
            cateCore.addEventListener('input', checkInput);
            SubCCore.addEventListener('input', checkInput);
            DataCore.addEventListener('input', checkInput);
            DescCore.addEventListener('input', checkInput);
            valoCore.addEventListener('input', checkInput);

            // Chama a função inicialmente para definir o estado correto do input2
            checkInput();
        });

        function checkInput() {
            const seleCore = document.getElementById('selecaoTipo');
            const cateCore = document.getElementById('iCategoria');
            const SubCCore = document.getElementById('iSubCategoria');
            const DataCore = document.getElementById('iDataCore');
            const DescCore = document.getElementById('iDescr');
            const valoCore = document.getElementById('valoCore');

            if (seleCore.value.trim() === '') {
                console.log(document.getElementById('selecaoTipo'))
                cateCore.disabled = true;
            } else {
                cateCore.disabled = false;
            }

            if (cateCore.value.trim() === '') {
                SubCCore.disabled = true;
            } else {
                SubCCore.disabled = false;
            }

            if (SubCCore.value.trim() === '') {
                DataCore.disabled = true;
            } else {
                DataCore.disabled = false;
            }

            if (DataCore.value.trim() === '') {
                DescCore.disabled = true;
                valoCore.disabled = true;

            } else {
                DescCore.disabled = false;
                valoCore.disabled = false;
            }
        }

        function formatarValorMonetario(input) {
            let value = input.value;

            value = value.replace(/\D/g, '');
            value = (value / 100).toFixed(2) + '';
            value = value.replace('.', ',');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            value = 'R$ ' + value;

            input.value = value;
        }
    </script>

    <?php
    include('partes/js.php');
    ?>
</body>

</html>