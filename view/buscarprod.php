<?php
    include_once "cabecalho.php";

    include_once "../view/botaovolta.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Buscar Produto</title>
</head>
<body>
<br><br><br>
<main>
    <br><br>
    <div class="inptsinfo">
    <form action="../model/buscar_prod_action.php" method="GET">
            <br>Informe o nome do Produto:<br><br><br>
            <input type="text" class="inptsinfo" name="txtPesquisar" id="pesquisar" autocomplete="off"  placeholder="Digite o nome">
            <input type="submit" name="btnPesquisar" class="btnenviar" value="Pesquisar" id="pesquisar">
            <input type="reset" name="btnLimpar" class="btnenviar" id="limpar" value="Limpar">
        </form>
    </div>
</main>       
</body>
</html>
