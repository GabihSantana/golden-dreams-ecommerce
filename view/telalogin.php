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
    <link rel="icon" href="../img/logo.png" />
    <link rel="stylesheet" href="../css/default.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">
    <title>Login</title>
</head>
<body>
    <div class="LoginField">
        <form action="../model/verificarlogin.php" method="POST">
            <img src="../img/logo.png" alt=""><br />
            <label for="email">Email
                <input type="email" class="caixa cxinput" name="cxemail" id="email" autocomplete="off">
            </label>
            <label for="senha">Senha
                <input type="password" class="caixa cxinput" name="cxsenha" id="senha" autocomplete="off">
            </label>
            <div class="radiobtn">
                <input type="radio" id="inptfunc" class="inptrdbtn" name="checkcargo" value="func">
                <label for="inptfunc">Funcionario</label>
                <input type="radio" id="inptadm" class="inptrdbtn" name="checkcargo" value="adm">
                <label for="inptadm">Administrador</label>

            </div>
            <input type="submit" class="caixa btnlogar" name="btnLogar" value="Entrar">
        </form>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'>
        $(document).ready(function() {
        M.updateTextFields();
    });
    </script>
</body>
</html>