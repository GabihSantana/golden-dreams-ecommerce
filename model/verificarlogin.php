<?php
    session_start();

    include_once "../factory/conexaobd.php";
    include_once "../control/dadofunc.php";
    include_once "../control/dadoadm.php";

    if(isset($_POST['btnLogar'])){
        $email = $_POST["cxemail"];
        $senha = $_POST["cxsenha"];
        $cargo = $_POST["checkcargo"];

        $valido = $email != NULL && $senha != NULL && $cargo != NULL; 

        if($valido && $cargo == "func"){
            $func = new Funcionario; 
            $dados = $func->acesso($email, $senha);
            if ($dados) {
                $func->setUsuario($dados['nome'], $dados['idade'], $dados['telefone'], $dados['email'], $dados['senha']);

                // guardando as informações do obj funcionario através do serialize
                $_SESSION['funcobj'] = serialize($func);
                $_SESSION['funcionario'] = $func->getNome();
                header("Location: ../view/menufunc.php");
                exit;
            } 
            else{
                header("Location: ../view/telalogin.php?failaccess=true");
                exit;
            }
        }
        else if($valido && $cargo == "adm"){
            $adm = new Administrador;
            $dados = $adm->acessoAdm($email, $senha);
            if ($dados != NULL) {
                $adm = new Administrador;

                $adm->setUsuario($dados['nome'], $dados['idade'], $dados['telefone'], $dados['email'], $dados['senha']);

                $_SESSION['admobj'] = serialize($adm);
                $_SESSION['adm'] = $adm->getNome();
                header("Location: ../view/menuadm.php");
                exit();
            }
            else{
                header("Location: ../view/telalogin.php?failaccess=true");
                exit();
            }
        }
        else{
            header("Location: ../view/telalogin.php?failaccess=true");
            exit;
        }

    } else {
        header("Location: ../view/telalogin.php?failaccess");
        exit;
    }
?>
	