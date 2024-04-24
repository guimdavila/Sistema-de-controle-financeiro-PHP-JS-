function editCpf() {
    // Obtenha a referência ao parágrafo de exibição do CPF
    var cpfDisplay = document.getElementById('cpf-display');
    
    // Obtenha o valor atual do parágrafo
    var currentCpf = cpfDisplay.innerText;
    
    // Crie um campo de entrada para edição
    var inputField = document.createElement('input');
    inputField.type = 'text';
    inputField.value = currentCpf;
    
    // Substitua o parágrafo pelo campo de entrada
    cpfDisplay.parentNode.replaceChild(inputField, cpfDisplay);
    
    // Defina um evento de teclado para detectar quando o usuário pressiona Enter
    inputField.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            // Pegue o novo valor
            var newCpf = inputField.value;
            
            // Substitua o campo de entrada pelo parágrafo atualizado
            var newCpfDisplay = document.createElement('p');
            newCpfDisplay.id = 'cpf-display';
            newCpfDisplay.className = 'text-muted';
            newCpfDisplay.innerText = newCpf;
            
            inputField.parentNode.replaceChild(newCpfDisplay, inputField);
            
            // Aqui você pode adicionar código para salvar o novo CPF no servidor, se necessário
            // Por exemplo, fazendo uma requisição AJAX para salvar o novo valor
            // em uma base de dados ou outra forma de armazenamento.
        }
    });
    
    // Posicione o cursor no campo de entrada para facilitar a edição
    inputField.focus();
}

document.getElementById('tela2').style.display = 'block';

function mostrarTela(tela) {

  if (tela == 'tela1') {
    document.getElementById('tela1').style.display = 'block';
    document.getElementById('tela2').style.display = 'none';
  } else {
    document.getElementById('tela1').style.display = 'none';
    document.getElementById('tela2').style.display = 'block';
  }
}


function iniciaTelaUsuario(){
    
    document.getElementById('tela2').style.display = 'block';
}