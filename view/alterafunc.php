<?php
    require_once "../factory/conexaobd.php";
    include_once "../view/cabecalho.php";
    include_once "../control/dadofunc.php";

    $func = new Funcionario();

    $info = $func->consultarFuncionario($_GET['id']);
    echo '<a class="btvoltar" href="../view/listarfunc.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
    echo "Funcionário: {$info['id_funcionario']}";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Alterar Informações do Funcionário</title>
</head>
<body>
    <div class="inptsinfo">
        <form action="../model/altera_func_action.php" method="POST">
            <br/>
            <input type="hidden" class="inptinfo" name="cxidfuncionario" value="<?php echo "{$info['id_funcionario']}";?>">
            Nome: 
            <input type="text" class="inptinfo" name="cxnome" id="nome" value="<?php echo "{$info['nome']}";?>">
            Idade:
            <input type="number" class="inptinfo" name="cxidade" id="idade" value="<?php echo "{$info['idade']}";?>">
            Telefone:
            <input type="text" class="inptinfo" name="cxtelefone" id="telefone" value="<?php echo "{$info['telefone']}";?>">
            Email:
            <input type="text" class="inptinfo" name="cxemail" id="email" value="<?php echo "{$info['email']}";?>">
            Senha:
            <input type="password" class="inptinfo" name="cxsenha" id="senha" value="<?php echo "{$info['senha']}";?>">
            <button type="submit" class="btnenviar" name="btnalterar">Alterar</button>
        </form>
    </div>     
</body>
</html>
