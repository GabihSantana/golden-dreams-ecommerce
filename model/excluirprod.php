<?php
   
   include_once '../factory/conexaobd.php';
   
   $cod = $_GET['id'];
   $excluir= "DELETE from tbprodutos where id = :codigo ";

   $conn = new CaminhoBd;

   $exclusao = $conn->getConexaoBd()->prepare($excluir); 
   $exclusao->bindParam(':codigo', $cod);
   $exclusao->execute();

   if($exclusao){
    echo('<script>window.alert("Produto excluido com sucesso");window.location="listarprod.php";</script>'); 
   }
   else{
    echo('<script>window.alert("Produto não encontrado");window.location="listarprod.php";</script>'); 
   }
?>