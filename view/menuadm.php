<?php
    session_start();
    echo "Olá ". $_SESSION['adm'];

    if(!(isset($_SESSION['adm']))){
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
        <a href="telacadfunc.php">Cadastrar Funcionário</a>
        <a href="telacadprod.php">Cadastrar Produto</a>
        <a href="listarprod.php">Listar Produtos</a>
        <a href="">Página Exibição</a>
    </div>
</body>
</html>