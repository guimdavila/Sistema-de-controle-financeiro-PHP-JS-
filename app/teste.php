<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Selects</title>
</head>
<body>
    <form>
        <label for="selectA">Select A:</label>
        <select id="selectA">
            <option value="" selected disabled>Selecione uma opção</option>
            <option value="1">Opção 1</option>
            <option value="2">Opção 2</option>
            <option value="3">Opção 3</option>
        </select>

        <br><br>

        <label for="selectB">Select B:</label>
        <select id="selectB">
            <option value="" selected disabled>Selecione uma opção</option>
            <option value="a">Opção A</option>
            <option value="b">Opção B</option>
            <option value="c">Opção C</option>
        </select>
    </form>

    <script>
        document.getElementById('selectB').addEventListener('change', function() {
            document.getElementById('selectA').value = '';
        });
    </script>
</body>
</html>
