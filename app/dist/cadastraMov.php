<?php
// Verifica se foi recebido um valor do input via método POST
if (isset($_POST['tipoCadastro'])) {
    // Recupera o valor enviado
    $tipoCadastro = $_POST['tipoCadastro'];

    // Faça o que desejar com o valor recebido
    // Por exemplo, armazená-lo em uma variável
    $tipoCadastroSelecionado = $tipoCadastro;

    // Exemplo de resposta para o cliente (opcional)
    echo 'Tipo de cadastro selecionado: ' . $tipoCadastroSelecionado;
} else {
    // Caso nenhum valor seja recebido
    echo 'Nenhum tipo de cadastro selecionado.';
}


