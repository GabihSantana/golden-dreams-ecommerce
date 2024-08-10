<?php
    require_once "../view/cabecalho.php";
    require_once "../control/dadoprod.php";

    $produto_id = $_GET['id'];

    $produtoObj = new Produtos();
    $info = $produtoObj->consultarProduto($produto_id);

    if (!$info) {
        echo '<script>window.alert("Produto não encontrado."); window.location="../view/listarprod.php";</script>';
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/default.css">
        <link rel="stylesheet" href="../css/form.css">
        <title>Alterar Informações do Produto</title>
    </head>
    <body>
        <?php 
        echo '<a class="btvoltar" href="../view/listarprod.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
        echo "Produto: $produto_id"; ?> 
        <div class="inptsinfo">
            <form action="../model/altera_prod_action.php" method="POST" enctype="multipart/form-data">
            <br/>
            <input type="hidden" class="inptinfo" name="cxid" value="<?php echo $info['id']; ?>"><br/>
            Produto: <br/>
            <input type="text" class="inptinfo" name="cxproduto" id="produto" value="<?php echo $info['produto']; ?>"><br/><br/>
            Quantidade:
            <input type="number" class="inptinfo" name="cxqtde" id="qtde" value="<?php echo $info['qtde']; ?>"><br/><br/>
            Valor:
            <input type="text" class="inptinfo" name="cxvalor" id="valor" value="<?php echo $info['valor']; ?>"><br/><br/>
            Foto: <br/><br/>
            <?php echo '<img src="../foto/'.$info['foto'].'" alt="descrição da imagem" class="fotos">'; ?><br/><br/>
            <input type="file" class="inptfile" name="cxfoto" id="foto"/><br/><br/>
            <br/><br/>

            <button type="submit" class="btnenviar" name="btnalterar">Alterar</button>
            </form>
        </div>
</body>
</html>
