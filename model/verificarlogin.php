<?php

    include_once "../control/dadofunc.php";
    include_once "../factory/conexaobd.php";

    if(isset($_POST['btnLogar'])){
        $email = $_POST["cxemail"];
        $senha = $_POST["cxsenha"];
        $cargo = $_POST["checkcargo"];

        $valido = $email != NULL && $senha != NULL; 

        if($valido && $cargo == "func"){
            $conexaobd = new CaminhoBd;

            $sqlquery = "SELECT * FROM tbfuncionarios WHERE email = :email AND senha = :senha";
    
            $verificarLogin = $conexaobd->getConexaoBd()->prepare($sqlquery);
            $verificarLogin->bindParam(':email', $email);
            $verificarLogin->bindParam(':senha', $senha);
            $verificarLogin->execute();

            $registro = $verificarLogin->fetch(PDO::FETCH_ASSOC);
            if ($registro) {
                header("Location: ../view/telacadusuario.php");
                exit;
            }
            else{
                header("Location: ../index.php");
                exit;
            }
        }
        else if($valido && $cargo == "adm"){
            $conexaobd = new CaminhoBd;

            $sqlquery = "SELECT * FROM adms WHERE email = :email AND senha = :senha";
            
            $verificarLogin = $conexaobd->getConexaoBd()->prepare($sqlquery);
            $verificarLogin->bindParam(':email', $email);
            $verificarLogin->bindParam(':senha', $senha);
            $verificarLogin->execute();

            $registro = $verificarLogin->fetch(PDO::FETCH_ASSOC);
            if ($registro) {
                header("Location: ../view/telacadusuario.php");
                exit;
            }
            else{
                header("Location: ../index.php");
                exit;
            }
        }

    }else{
        header("Location: ../index.php");
        exit;
    }
?>