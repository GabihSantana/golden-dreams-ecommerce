<?php
   include_once '../factory/conexaobd.php';
   include_once "../view/cabecalho.php";
   include_once "../control/dadoprod.php";
   
   $cod = $_GET['id'];

   $produto = new Produtos();

   $excluir = $produto->excluirProduto($cod);

   if($excluir){
    echo('<script>window.alert("Produto excluido com sucesso");window.location="../view/listarprod.php";</script>'); 
   }
   else{
    echo('<script>window.alert("Produto não encontrado");window.location="../view/listarprod.php";</script>'); 
   }
?>