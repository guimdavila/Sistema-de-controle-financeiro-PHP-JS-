<?php

function nomeUsuario($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT nomeUsuario FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["nomeUsuario"];
        }
    }

    return $resp;
}

function coletaPrimeiraPalavra($phrase)
{
    // Use strtok para dividir a string usando um espaço como delimitador
    $primeiraPalavra = strtok($phrase, " ");

    // Retorne a primeira palavra
    return $primeiraPalavra;
}

function primeiroNomeUsuario($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT nomeUsuario FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL


            $resp = coletaPrimeiraPalavra($coluna["nomeUsuario"]);
        }
    }

    return $resp;
}

function fotoUsuario($id)
{






    $resp = "";

    include("conexao.php");
    $sql = "SELECT fotoPerfil FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {

            $resp = $coluna["fotoPerfil"];

            if (!empty($resp)) {
            } else {
                // Nenhuma foto do perfil está disponível, você pode exibir um valor padrão ou nada
                $resp = 'dist/img/foto defaut user.jpg';
            }
            return $resp;
        }
    }
}

function converterDataGregoriano($dateString)
{

    $date = new DateTime($dateString);

    $formattedDate = $date->format('d/m/Y');

    return $formattedDate;
}

function DataNasc($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT dataNasc FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["dataNasc"];

            $resp = converterDataGregoriano($resp);
        }
    }

    return $resp;
}

function FormatarTelefone($telefone)
{

    if (preg_match('/^(\d{2})(\d{5})(\d{4})$/', $telefone, $matches)) {

        $telefoneFormatado = sprintf('(%s) %s-%s', $matches[1], $matches[2], $matches[3]);
        return $telefoneFormatado;
    } else {

        return $telefone;
    }
}

function Telefone($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT telefone FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["telefone"];

            $resp = FormatarTelefone($resp);
        }
    }

    return $resp;
}

function formatarCPF($cpf)
{
    if (preg_match('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', $cpf, $matches)) {
        $cpfFormatado = sprintf('%s.%s.%s-%s', $matches[1], $matches[2], $matches[3], $matches[4]);
        return $cpfFormatado;
    } else {
        return $cpf;
    }
}

function cpf($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT cpf FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["cpf"];

            $resp = formatarCPF($resp);
        }
    }

    return $resp;
}

function email($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT email FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["email"];
        }
    }

    return $resp;
}

function sexo($id)
{

    $resp = "";

    include("conexao.php");
    $sql = "SELECT sexo FROM usuario WHERE idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        $array = array();

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {
            //***Verificar os dados da consulta SQL
            $resp = $coluna["sexo"];
        }
    }

    return $resp;
}



function coabitante($id)
{

    include("conexao.php");
    $sql = "SELECT a.nomeCoabitante from coabitanteusuario as a inner join usuario as b on a.idUsuarioPrincipal = b.idUsuario where b.idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    $coabitantes = "";

    $array = array();

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {

            if ($coabitantes == "") {
                $coabitantes =  $coluna["nomeCoabitante"];
            } else {
                $coabitantes = $coabitantes . ", ";

                $coabitantes = $coabitantes . $coluna["nomeCoabitante"];
            }
        }
    }

    return $coabitantes;
}

/* RETORNAR COABITANTES COM QUEBRA DE LINHA

function coabitanteEditarPerfil($id)
{

    include("conexao.php");
    $sql = "SELECT a.nomeCoabitante from coabitanteusuario as a inner join usuario as b on a.idUsuarioPrincipal = b.idUsuario where b.idUsuario = $id;";
    $result = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    $coabitantes = "";

    $array = array();

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {

        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }

        foreach ($array as $coluna) {

            if ($coabitantes == "") {
                $coabitantes =  $coluna["nomeCoabitante"];
            } else {

                $coabitantes = $coabitantes . "\n" . $coluna["nomeCoabitante"];
            }
        }
    }

    return $coabitantes;
}

*/

function editarUsuario($id)
{

    $emEdicao = 1;
}


$idUsuario = $_SESSION['idUsuario'];

//Alteração foto do perfil
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"])) {
    $caminho = "C:/xampp/htdocs/SA---Nordic-Finance/app/dist/img/" . $_FILES["foto"]["name"]; //Salva foto na pasta

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho)) {
        $caminho;
    } else {
        echo "";
    }


    include("conexao.php");

    if ($caminho != "") {

        $caminho2 = str_replace('C:/xampp/htdocs/SA---Nordic-Finance/app/', '', $caminho);

        if ($caminho2 == "dist/img/") {

            $sql = "UPDATE USUARIO SET FOTOPERFIL = 'dist/img/foto defaut user.jpg' where idUsuario = $idUsuario";

            $resultSql = mysqli_query($conexao, $sql);
        } else {

            $sql = "UPDATE USUARIO SET FOTOPERFIL = '$caminho2' where idUsuario = $idUsuario";

            $resultSql = mysqli_query($conexao, $sql);
        }
    } else {
    };
}

function AlteraNomeCoabitante($id, $coluna)
{
    include("conexao.php");
    $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
    $sql = "UPDATE coabitanteusuario SET nomeCoabitante = '$idCoabitanteUsuario' WHERE idUsuarioPrincipal = '$id' AND nomeCoabitante = '".$coluna["nomeCoabitante"]."'";

    $resultSql = mysqli_query($conexao, $sql);
}

function listaUsuario($id)
{
    include("conexao.php");
    $sql = "SELECT a.nomeCoabitante, a.idCoabitanteUsuario, a.nomeCoabitante FROM coabitanteusuario AS a INNER JOIN usuario AS b ON a.idUsuarioPrincipal = b.idUsuario WHERE b.idUsuario = ".$id.";";

    $result = mysqli_query($conexao, $sql);

    $lista = '';

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {

            $idCoabitanteUsuario = $coluna["idCoabitanteUsuario"];
            $nomeCoabitanteUsuario = $coluna["nomeCoabitante"];

            $lista .=
                "<tr>"
                . "<td>"
                // Se o botão "Alterar" for clicado, mostra um campo de entrada de texto
                . "<span id='nomeCoabitante_" . $coluna["nomeCoabitante"] . "'>" .  $coluna["nomeCoabitante"] . "</span>"
                . "<input type='text' id='novoNome_" .  $coluna["nomeCoabitante"] . "' style='display:none;' name='nTeste[]' value='" .  $coluna["nomeCoabitante"] . "'>"
                . "</td>"
                . "<td>"
                . "<button type='button' class='btn btn-edit-perfil' data-toggle='modal' onclick=\"mostrarCampoTexto('" .  $coluna["nomeCoabitante"] . "')\">Alterar</button>"
                . "<button type='button' class='btn btn-edit-perfil' data-toggle='modal' onclick='removerLinha(this)'>Excluir</button>"
                . "</td>"
                . "</tr>";
    
            // Adiciona o script JavaScript
        }
    }


        $lista .= "
            <script>
                function mostrarCampoTexto(nomeCoabitante) {
                    var span = document.getElementById('nomeCoabitante_' + nomeCoabitante);
                    var input = document.getElementById('novoNome_' + nomeCoabitante);

                    span.style.display = 'none';
                    input.style.display = 'inline-block';
                }                   
                            

                function removerLinha(button) {
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
            </script>

            
        
            ";   

        
        AlteraNomeCoabitante($id, $coluna);
        

        return $lista;

}
/*
function teste($iduser){
    //Recebe os valores Email e Senha da tela login por meio de post
    $id[] = $_POST["nTeste"];

    $qntd = count($id);    
    $t = 0;

    /*while($t < $qntd){
        echo($id[$t]);
        $t = $t + 1;
        
    }
    
}
*/

function teste($id){

    include('conexao.php');

    $id[] = $_POST["nTeste"];

    $qntd = count($id);    
    $t = 0;

    include("conexao.php");

    $sql = "SELECT * FROM coabitanteusuario where idUsuarioPrincipal = ". $id;

    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $coluna) {
            if($id[$t] == $coluna["idCoabitanteUsuario"]){

                echo($coluna["idCoabitanteUsuario"]);
                die();

                $t = $t + 1;



            }
            
        
        }
    
    }
}


?>

