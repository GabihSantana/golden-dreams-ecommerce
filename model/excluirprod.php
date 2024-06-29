<?php
   
   include_once '../factory/conexaobd.php';
   $cod=$_GET["idProd"];
   $excluir= "delete from tbprodutos where cod='$cod'";

   $executar = mysqli_query($conn,$excluir);

   if($executar){
     echo "<script>alert('Produto excluido com sucesso');</script>";
     echo "<a href='listarproduto.php'>Voltar</a>";
   }
   else{
    echo "<script>alert('Dado não encontrado');</script>"; 
   }
?>