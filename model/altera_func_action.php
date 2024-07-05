<?php
    require_once "../factory/conexaobd.php";
    include_once "../view/cabecalho.php";
    include_once "../control/dadofunc.php";

    $func = new Funcionario();

    $cod = $_POST['cxidfuncionario'];
    $nome = $_POST['cxnome'];
    $idade = $_POST['cxidade'];
    $telefone = $_POST['cxtelefone'];
    $email = $_POST['cxemail'];
    $senha = $_POST['cxsenha'];

    $altera = $func->alterarFuncionario($cod, $nome, $idade, $telefone, $email, $senha);

    if($altera){
        echo('<script>window.alert("Funcionário alterado com sucesso");window.location="../view/listarfunc.php";</script>'); 
       }
       else{
        echo('<script>window.alert("Funcionário não encontrado");window.location="../view/listarfunc.php";</script>'); 
       }
?>