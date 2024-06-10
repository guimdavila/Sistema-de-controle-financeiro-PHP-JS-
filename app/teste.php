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

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 divCore">
            <div class="card">
              <div class="card-header">


                <div class="modal-dialog modal-custom">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Editar</h4>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">





                        <form method="POST" action="php/AlteraCategoria.php">
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
                              <button type="button" id="ibtAlterarCard" class="btn btn-novo-core" data-toggle="modal">Alterar</button>
                            </div>
                        </form>







                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>

</html>