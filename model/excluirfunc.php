<?php
    include_once '../factory/conexaobd.php';

    $cod = $_GET['id'];
    $query = "DELETE from tbfuncionarios WHERE id_funcionario = :cod";

    $conexao = new CaminhoBd;

    $exclusao = $conexao->getConexaoBd()->prepare($query); 
    $exclusao->bindParam(':cod', $cod);
    $exclusao->execute();
 
    if($exclusao){
      echo "<script>alert('Funcionário excluido com sucesso!');</script>";
      echo "<a href='listarfunc.php'>Voltar</a>";
    }
    else{
     echo "<script>alert('Funcionario não encontrado!');</script>"; 
    }

?>