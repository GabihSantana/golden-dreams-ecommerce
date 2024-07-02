<?php 
    session_start();
    include_once "cabecalho.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Cadastrar Produtos</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['funcionario'])){
            echo '<a class="btvoltar" href="menufunc.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
        }else{
            echo '<a class="btvoltar" href="menuadm.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
        }
    ?>
    <div class="inptsinfo">
        <form action="../model/inserirprod.php" method="POST" enctype="multipart/form-data" name="cadastro"> 
            Produto:
            <input type="text" class="inptinfo" name="cxproduto" autocomplete="off" /><br/><br/>
            Quantidade:
            <input type="number" class="inptinfo" name="cxqtde" autocomplete="off" /><br/><br/>
            Valor:
            <input type="text" class="inptinfo" name="cxvalor" autocomplete="off" /><br/><br/>
            Foto: <br/><br/>
            <input type="file" class="inptfile" name="cxfoto" id="foto"/><br/><br/> 
            <input type="submit" class="btnenviar" name="Cadastrar" value="Cadastrar"/>
            <br/><br/>
        </form>
    </div>
    <br/>
</body>
</html>