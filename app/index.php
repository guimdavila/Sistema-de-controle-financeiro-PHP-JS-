<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordic System</title>
</head>

<body>



    <form method="POST" action="php/validaLogin.php">

        <p>
            <label for="iEmail">E-mail: </label>
            <input type="email" id="iEmail" name="nEmail" required>
        </p>

        <p>
            <label for="iSenha">Senha: </label>
            <input type="password" id="iSenha" name="nSenha" required>
        </p>

        <button type="submit">Logar</button>

    </form>


</body>

</html>