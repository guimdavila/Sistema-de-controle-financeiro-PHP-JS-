function editCpf() {
  var cpfDisplay = document.getElementById('cpf-display');

  var currentCpf = cpfDisplay.innerText;

  var inputField = document.createElement('input');
  inputField.type = 'text';
  inputField.value = currentCpf;

  cpfDisplay.parentNode.replaceChild(inputField, cpfDisplay);

  inputField.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
      var newCpf = inputField.value;

      var newCpfDisplay = document.createElement('p');
      newCpfDisplay.id = 'cpf-display';
      newCpfDisplay.className = 'text-muted';
      newCpfDisplay.innerText = newCpf;

      inputField.parentNode.replaceChild(newCpfDisplay, inputField);

    }
  });

  inputField.focus();
}

// perfilUsuario.php
function mostrarTela(tela) {

  if (tela == 'tela1') {
    document.getElementById('tela1').style.display = 'block';
    document.getElementById('tela2').style.display = 'none';
  } else {
    document.getElementById('tela1').style.display = 'none';
    document.getElementById('tela2').style.display = 'block';
  }
}

function iniciaTelaUsuario() {

  document.getElementById('tela2').style.display = 'block';
}

// Consulta categoriaSubcategoria.php

function filterTable(inputId, tableId) {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById(inputId);
  filter = input.value.toUpperCase();
  table = document.getElementById(tableId);
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
}

  //CORE 

//MES ANO
window.onload = function() {
  const yearPicker = document.getElementById('anoEscolhido');
  const currentYear = new Date().getFullYear();
  const startYear = 2024; 
  const endYear = currentYear + 2; 

  for (let year = startYear; year <= endYear; year++) {
      let option = document.createElement('option');
      option.value = year;
      option.textContent = year;
      yearPicker.appendChild(option);
  }

  document.getElementById('mesEscolhido').addEventListener('change', displaySelection);
  yearPicker.addEventListener('change', displaySelection);

  function displaySelection() {
      const selectedMonth = document.getElementById('mesEscolhido').value;
      const selectedYear = document.getElementById('anoEscolhido').value;
      console.log(`Ano: ${selectedYear}, Mês: ${selectedMonth}`);
  }
};


