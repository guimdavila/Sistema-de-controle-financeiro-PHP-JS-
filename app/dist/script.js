
// Quando um input do tipo radio for clicado
$('input[type="radio"]').click(function() {
    // Captura o valor selecionado
    var tipoCadastroSelecionado = $(this).val();

    // Envia os dados para o servidor usando AJAX com método POST
    $.ajax({
        url: 'cadastraMov.php', // Substitua 'processar.php' pelo nome do seu script PHP que receberá os dados
        method: 'POST',
        data: { tipoCadastro: tipoCadastroSelecionado }, // Dados a serem enviados para o servidor
        success: function(response) {
            console.log('Dados enviados com sucesso.');
            console.log(response); // Log da resposta do servidor (opcional)
        },
        error: function(xhr, status, error) {
            console.error('Erro ao enviar dados: ' + error);
        }
    });
});
