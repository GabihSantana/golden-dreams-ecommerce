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
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Exibir Produto</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['funcionario'])){
            echo '<a class="btvoltar" href="../view/menufunc.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
        }else{
            echo '<a class="btvoltar" href="../view/menuadm.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
        }

       include_once '../factory/conexaobd.php';

       $conn = new CaminhoBd();
      
        $consulta = "select * from tbfuncionarios";  

        $resultado = $conn->getConexaoBd()->prepare($consulta);
        $resultado->execute();   

        while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <div class="inptsinfo">
        <form action="">
            <br/>
            Nome:
            <input type="text" class="inptinfo" name="cxproduto" disabled value="<?php echo $cont['nome']?>"/><br/>
            Idade:
            <input type="number" class="inptinfo" name="cxidade" disabled value="<?php echo $cont['idade']?>"/><br/>
            Telefone:
            <input type="text" class="inptinfo" name="cxtelefone" disabled value="<?php echo $cont['telefone']?>"/><br/>
            Email:
            <input type="text" class="inptinfo" name="cxemail" disabled value="<?php echo $cont['email']?>"/><br/>

            <div class="crud">
                <a class="btexcluir" href="excluirfunc.php?id=<?php echo $cont['id_funcionario'];?>">
                    <img src="../img/lata-de-lixo.png" alt="">
                </a>  
                <a class="btnalterar" href=".php?id=<?php echo $cont['id_funcionario'];?>">
                    <img src="../img/editar-arquivo.png" alt="">
                </a>  
            </div>
            <br/>
            <br/>
        </form>
    </div>
    <?php
       } //Fecha o while
    ?>
</body>
</html>