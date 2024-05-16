<!DOCTYPE html>
<html>
<head>
    <title>Exemplo</title>
</head>
<body>

<table id="tabela">
    <tr>
        <th>Sub-Categoria</th>
        <th>Categorias</th>
        <th>Espécie</th>
        <th>Tipo</th>
        <th>Permissão</th>
    </tr>
    <tr>
        <td>subcategoria1</td>
        <td>categoria1</td>
        <td>especie1</td>
        <td>tipo1</td>
        <td>permissao1</td>
    </tr>
    <tr>
        <td>subcategoria2</td>
        <td>categoria2</td>
        <td>especie2</td>
        <td>tipo2</td>
        <td>permissao2</td>
    </tr>
    <tr>
        <td>subcategoria3</td>
        <td>categoria3</td>
        <td>especie3</td>
        <td>tipo3</td>
        <td>permissao3</td>
    </tr>
</table>

<select class="input-group-text caixaSelecaoCate" name="nCategoriasNaSubcategoria" required>
    <option value="" disabled selected>Selecione</option>
</select>

<script>
    window.onload = function() {
        var tabela = document.getElementById('tabela');
        var select = document.querySelector('select[name="nCategoriasNaSubcategoria"]');
        
        for (var i = 1; i < tabela.rows.length; i++) {
            var cell = tabela.rows[i].cells[1]; // Coluna "Categorias"
            var option = document.createElement('option');
            option.value = cell.innerHTML;
            option.textContent = cell.innerHTML;
            select.appendChild(option);
        }
    };
</script>

</body>
</html>
