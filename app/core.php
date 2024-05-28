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
                                <form action="" id="form1">
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
                                                <textarea name="nDescr" id="iDescr"  class="form-control caixaSelecaoCore text-area-core" disabled maxlength="50"></textarea>
                                            </p>

                                            <p class="text-muted-Core">
                                                <span class="tituloInputCore"><strong>Valor:</strong></span>
                                                <input name="nValorCore" id="valoCore" type="text-area" class="form-control caixaSelecaoCore" placeholder="R$ 0,00" disabled oninput="formatarValorMonetario(this)">
                                            </p>

                                            <div class="text-muted-Core-button">
                                                <button type="button" id="ibt" class="btn btn-novo-core" data-toggle="modal">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-md-3 divCore">
                            <div class="card">
                                <div class="card-body tamanho-body2">
                                    <!-- Conteúdo adicional aqui -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 divCore">
                            <div class="card">
                                <div class="card-body tamanho-body2">
                                    <div class="objetosSaldos objetoEntrada">
                                        <i class="fa-solid fa-plus iconesCore iconesCoreEntrada"></i>
                                        <span class="spanCore spanCoreEntrada">R$
                                            <!-- Função PHP com o cálculo -->
                                        </span>
                                    </div>
                                    <div class="objetosSaldos objetoSaida">
                                        <i class="fa-solid fa-minus iconesCore iconesCoreSaida"></i>
                                        <span class="spanCore spanCoreSaida">R$
                                            <!-- Função PHP com o cálculo -->
                                        </span>
                                    </div>
                                    <div class="objetosSaldos objetoSaldo">
                                        <i class="fa-solid fa-equals iconesCore iconesCoreSaldo"></i>
                                        <span class="spanCore spanCoreSaldo">R$
                                            <!-- Função PHP com o cálculo -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
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
                                    $('iSubCategoria').html(opcaoSub).show()
                                }
                            })
                    } else {
                        opcaoSub += '<option value="">Selecione</option>'
                        $('iSubCategoria').html(opcaoSub).show()
                    }

                    
                })
            })
            ///////////////////27-05////////////////////////////////

            $(document).ready(function() {

            $('#ibt').on('click', function() {
                var tipo = $('#selecaoTipo').val();
                var categoria = $('#iCategoria').val();
                var subcategoria = $('#iSubCategoria').val();
                var data = $('#iDataCore').val();
                var desc = $('#iDescr').val();
                var valor = $('#valoCore').val();

                $.getJSON('php/Corephpajax.php?tipoMov='+tipo+'&categoria='+categoria+'&subcategoria='
                +subcategoria+'&data='+data+'&desc='+desc+'&valor='+valor,
                    function(dados1) {

                    if (dados1.length > 0) {                        
                        console.log("Entrou1");

                    } else {
                        console.log("Entrou2");
                    
                    }
                })
                
            })
            })

            //////////////////////////////////////////////////////////

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