<?php
    session_start();

    include_once "../factory/conexaobd.php";
    include_once "../control/dadofunc.php";
    include_once "../control/dadoadm.php";

    function verificaBanco($conexaobd, $tabela, $email, $senha){
        $sqlquery = "SELECT * FROM $tabela WHERE email = :email AND senha = :senha";
        $verificarLogin = $conexaobd->getConexaoBd()->prepare($sqlquery);
        $verificarLogin->bindParam(':email', $email);
        $verificarLogin->bindParam(':senha', $senha);
        $verificarLogin->execute();

        $registro = $verificarLogin->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }

    if(isset($_POST['btnLogar'])){
        $email = $_POST["cxemail"];
        $senha = $_POST["cxsenha"];
        $cargo = $_POST["checkcargo"];

        $valido = $email != NULL && $senha != NULL && $cargo != NULL; 

        if($valido && $cargo == "func"){
            $tb = "tbfuncionarios";
            $conexaobd = new CaminhoBd;
            $dados = verificaBanco($conexaobd, $tb, $email, $senha);
            if ($dados) {
                $funcionario = new Funcionario;
                $funcionario->setNome($dados['nome']);
                $funcionario->setIdade($dados['idade']);

                $_SESSION['funcionario'] = $funcionario->getNome();
                header("Location: ../view/menufunc.php");
                exit;
            } 
            else{
                header("Location: ../view/telalogin.php?failaccess=true");
                exit;
            }
        }
        else if($valido && $cargo == "adm"){
            $conexaobd = new CaminhoBd;
            $tb = "tbadms";
            $dados = verificaBanco($conexaobd, $tb, $email, $senha);
    
            if ($dados) {
                $adm = new Administrador;
                $adm->setNome($dados['nome']);

                $_SESSION['adm'] = $adm->getNome();
                header("Location: ../view/menuadm.php");
                exit;
            }
            else{
                header("Location: ../view/telalogin.php?failaccess=true");
                exit;
            }
        }
        else{
            header("Location: ../view/telalogin.php?failaccess=true");
            exit;
        }

    }else{
        header("Location: ../view/telalogin.php?failaccess");
        exit;
    }
?>