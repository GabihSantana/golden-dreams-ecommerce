<?php
    include_once "cabecalho.php";

    if (!isset($_SESSION['adm'])) {
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
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Cadastrar Funcionários</title>
</head>
<body>
    <a class="btvoltar" href="menuadm.php">
        <img src="../img/seta-esquerda (1).png" alt="">
    </a>
    <div class="inptsinfo">
        <form action="../model/inserirfunc.php" method="POST">
            <br/>
            Nome:
            <input type="text" class="inptinfo" name="cxnome" autocomplete="off" /><br/><br/>
            Idade:
            <input type="number" class="inptinfo" name="cxidade"/><br/><br/>
            Email:
            <input type="text" class="inptinfo" name="cxemail" autocomplete="off" /><br/><br/>
            Telefone:
            <input type="text" class="inptinfo" name="cxtelefone" autocomplete="off" /><br/><br/>
            Senha:
            <input type="password" class="inptinfo" name="cxsenha" id="senha" autocomplete="off" /><br/><br/>
            <input type="submit" class="btnenviar" value="Gravar"/>
            <br/><br/>
        </form>
    </div>
    
</body>
</html>