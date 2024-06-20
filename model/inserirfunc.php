<?php
    include_once "../factory/conexaobd.php";
    include_once "../control/dadofunc.php";

    $funcionario = new Funcionario;

    $funcionario->setNome($_POST["cxnome"]);
    $funcionario->setIdade($_POST["cxidade"]);
    $funcionario->setTelefone($_POST["cxtelefone"]);
    $funcionario->setEmail($_POST["cxemail"]);
    $funcionario->setSenha($_POST["cxsenha"]);

    $nome = $funcionario->getNome();
    $idade = $funcionario->getIdade();
    $telefone = $funcionario->getTelefone();
    $email = $funcionario->getEmail();
    $senha = $funcionario->getSenha();

    if($funcionario->getEmail() != ""){
        $conexaobd = new CaminhoBd;
        $sqlquery = "INSERT INTO tbfuncionarios(nome, idade, telefone, email, senha) 
                    VALUES (:nome, :idade, :telefone, :email, :senha)";
        $cadastrarFunc = $conexaobd->getConexaoBd()->prepare($sqlquery);
        $cadastrarFunc->bindParam(':nome', $nome, PDO::PARAM_STR);
        $cadastrarFunc->bindParam(':idade', $idade, PDO::PARAM_INT);
        $cadastrarFunc->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $cadastrarFunc->bindParam(':email', $email, PDO::PARAM_STR);
        $cadastrarFunc->bindParam(':senha', $senha, PDO::PARAM_STR);
        $cadastrarFunc->execute();

        if($cadastrarFunc->rowCount()){
            echo "Dados cadastrado com sucesso!";
        }
        else{
            echo "Dados não cadastrado";
        }
    } else{
        "Campos em branco";
    }

?>