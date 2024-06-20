<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="LoginField">
        <form action="../model/verificarlogin.php" method="POST">
            <label for="email">Email:
                <input type="email" name="cxemail">
            </label>
            <label for="senha">Senha:
                <input type="password" name="cxsenha">
            </label>
            <input type="radio" name="checkcargo" value="func">Funcionario
            <input type="radio" name="checkcargo" value="adm">Administrador

            <input type="submit" name="btnLogar" value="Acessar">
        </form>
    </div>
</body>
</html>