<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Valor</title>
</head>
<body>

<h2>Consulta de Valor</h2>

<input type="text" id="inputValor" oninput="filterTable()">
<div id="result"></div>

<table id="tabela">
  <thead>
    <tr>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>100</td>
    </tr>
    <tr>
      <td>200</td>
    </tr>
    <tr>
      <td>300</td>
    </tr>
  </tbody>
</table>

<script>
  function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputValor");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabela");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
    document.getElementById("result").innerHTML = "Você digitou: " + input.value;
  }
</script>

</body>
</html>
