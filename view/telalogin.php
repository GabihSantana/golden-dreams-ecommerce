<?php
    session_start();

    //caso tentarem entrar em alguma página sem login
    if(isset($_GET['erro'])){
        echo "<script>";
        echo "const erro = 'Acesso restrito para funcionarios!';";
        echo "alert(erro)";
        echo "</script>";
    }
    //caso as credenciais sejam inválidas
    if(isset($_GET['failaccess'])){
        echo "<script>";
        echo "const erro = 'Credenciais Inválidas!';";
        echo "alert(erro)";
        echo "</script>";
    }       
?>

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
                <input type="email" name="cxemail" id="email">
            </label>
            <label for="senha">Senha:
                <input type="password" name="cxsenha" id="senha">
            </label>
            <input type="radio" name="checkcargo" value="func">Funcionario
            <input type="radio" name="checkcargo" value="adm">Administrador

            <input type="submit" name="btnLogar" value="Acessar">
        </form>
    </div>
</body>
</html>