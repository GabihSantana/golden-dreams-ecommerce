<?php
    session_start();
    include_once "cabecalho.php";

    if (!isset($_SESSION['funcionario'])) {
        header("Location: ../view/telalogin.php?erro=true");
        exit;
      }

    echo "Olá ". $_SESSION['funcionario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Menu</title>
</head>
<body>
<section id="mainmenu">
        <div class="opcoes">
                <a href="telacadprod.php" class="opc2">
                    <img src="../img/adicionar-produto.png" alt="">    
                    Cadastrar Produto
                </a>
                <a href="../model/listarprod.php" class="opc4">
                    <img src="../img/lista-de-controle.png" alt="">  
                    Listar Produtos
                </a>
                <a href="../model/listarprod.php" class="opc5">
                    <img src="../img/codificacao-da-web.png" alt="">
                    Página Exibição
                </a>
            </div>
    </section>
</body>
</html>