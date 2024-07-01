<?php
    session_start();
    include_once "../view/cabecalho.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Produto</title>
</head>
<body>
    <?php
       include_once '../factory/conexaobd.php';

       $conn = new CaminhoBd();
      
        $consulta = "select * from tbfuncionarios";  

        $resultado = $conn->getConexaoBd()->prepare($consulta);
        $resultado->execute();   

        while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <form action="">
        <br/>
        Nome:
        <input type="text" name="cxproduto" value="<?php echo $cont['nome']?>"/><br/>
        Idade:
        <input type="number" name="cxidade" value="<?php echo $cont['idade']?>"/><br/>
        Telefone:
        <input type="text" name="cxtelefone" value="<?php echo $cont['telefone']?>"/><br/>
        Email:
        <input type="text" name="cxemail" value="<?php echo $cont['email']?>"/><br/>

        <a class="btexcluir" href="excluirfunc.php?id=<?php echo $cont['id_funcionario'];?>">X</a>  
        <br/>
        <br/>
    </form>
    <?php
       } //Fecha o while
    ?>
    <?php 
            if(isset($_SESSION['funcionario'])){
                echo '<a class="btvoltar" href="menufunc.php"> Voltar </a>';
            }else{
                echo '<a class="btvoltar" href="menuadm.php"> Voltar </a>';
            }
        ?>
</body>
</html>