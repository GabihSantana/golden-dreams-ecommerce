<?php
    session_start();

    include_once "../factory/conexaobd.php";
    include_once "../control/dadofunc.php";
    include_once "../control/dadoadm.php";

    function verificaBanco($conexaobd, $tabela, $email, $senha){
        $sqlquery = "SELECT * FROM $tabela WHERE email = :email AND senha = :senha";
        $verificarLogin = $conexaobd->getConexaoBd()->prepare($sqlquery);
        $verificarLogin->bindParam(':email', $email, PDO::PARAM_STR);
        $verificarLogin->bindParam(':senha', $senha, PDO::PARAM_STR);
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
                $funcionario->setUsuario($dados['nome'], $dados['idade'], $dados['telefone'], $dados['email'], $dados['senha']);

                // guardando as informações do obj funcionario através do serialize
                $_SESSION['funcobj'] = serialize($funcionario);
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
