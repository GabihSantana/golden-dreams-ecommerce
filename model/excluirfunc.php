<?php
    include_once '../factory/conexaobd.php';
    include_once "../view/cabecalho.php";
    include_once "../control/dadoadm.php";

    $cod = $_GET['id'];
    $adm = new Administrador();
    
    $excluir = $adm->deletarFuncionario($cod);
 
    if($excluir){
      echo('<script>window.alert("Funcionário excluido com sucesso!");window.location="../view/listarfunc.php";</script>'); 
    }
    else{
      echo('<script>window.alert("Funcionário não encontrado!");window.location="../view/listarfunc.php";</script>'); 
    }

?>