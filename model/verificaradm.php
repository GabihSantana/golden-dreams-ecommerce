<?php
    include_once "../factory/conexaobd.php";
    include_once "../dadoadm.php";

    $email = $_POST["cxemail"];
    $senha = $_POST["cxsenha"];

    $conexaobd = new CaminhoBd;

    $sqlquery = "SELECT * FROM tbadms WHERE email = :email AND senha = :senha";
    
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
?>