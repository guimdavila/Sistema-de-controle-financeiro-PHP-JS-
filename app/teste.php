<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Inputs</title>
</head>

<body>
    <input type="text" id="input1" placeholder="Digite algo aqui">
    <input type="text" id="input2" placeholder="Este campo será desabilitado" disabled>

    <script>
        // Função para verificar o valor do input1 e habilitar/desabilitar o input2
        function checkInput1() {
            const input1 = document.getElementById('input1');
            const input2 = document.getElementById('input2');
            if (input1.value.trim() === '') {
                input2.disabled = true;
            } else {
                input2.disabled = false;
            }
        }

        // Adicionando o evento de escuta para o evento 'input' no input1
        document.addEventListener('DOMContentLoaded', (event) => {
            const input1 = document.getElementById('input1');
            input1.addEventListener('input', checkInput1);

            // Chama a função inicialmente para definir o estado correto do input2
            checkInput1();
        });
    </script>
</body>

</html>