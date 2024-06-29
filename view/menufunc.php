<?php
    session_start();
    echo "Olá ". $_SESSION['funcionario'];

    if(!(isset($_SESSION['funcionario']))){
        header("Location: ../view/telalogin.php?erro=true");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>

    <div class="mainmenu">
        <a href="telacadprod.php">Cadastrar Produto</a>
        <a href="">Página Exibição</a>
        <a href=""></a>
        <a href=""></a>
    </div>
</body>
</html>