<?php
    include_once "../factory/conexaobd.php";
    include_once "../control/dadofunc.php";
    include_once "../view/cabecalho.php";

    $funcionario = new Funcionario;

    $nome = $_POST["cxnome"];
    $idade = $_POST["cxidade"];
    $telefone = $_POST["cxtelefone"];
    $email = $_POST["cxemail"];
    $senha = $_POST["cxsenha"];

    if($email != ""){
        $cadastrarFunc = $funcionario->inserirFuncionario($nome, $idade, $telefone, $email, $senha);

        if($cadastrarFunc){
            echo('<script>window.alert("Funcionario cadastrado com sucesso!");window.location="../view/menuadm.php";</script>');
        }
        else{
            echo('<script>window.alert("ERRO - Funcionario não cadastrado!");window.location="../view/menuadm.php";</script>');        }
    } else{
        "Campos em branco";
    }

?>