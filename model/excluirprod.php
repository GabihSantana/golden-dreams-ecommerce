<?php
   
   include_once '../factory/conexaobd.php';
   
   $cod = $_GET['id'];
   $excluir= "DELETE from tbprodutos where cod = :codigo ";

   $conn = new CaminhoBd;

   $exclusao = $conn->getConexaoBd()->prepare($excluir); 
   $exclusao->bindParam(':codigo', $cod);
   $exclusao->execute();

   if($exclusao){
     echo "<script>alert('Produto excluido com sucesso');</script>";
     echo "<a href='listarproduto.php'>Voltar</a>";
   }
   else{
    echo "<script>alert('Dado não encontrado');</script>"; 
   }
?>