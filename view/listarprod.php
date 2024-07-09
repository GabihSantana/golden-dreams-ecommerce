<?php
    include_once "../view/cabecalho.php";
    include_once "../control/dadoprod.php";
    include_once "../factory/conexaobd.php";

    include_once "../view/botaovolta.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Lista de Produto</title>
</head>
<body>
    <h2>Produtos: </h2>
    <div class="inptsresul">
    <?php
       
        $prod = new Produtos();

        $resultado = $prod->listarProdutos();
        foreach ($resultado as $cont) {
    ?>
        <div class="results">
            <form action="">
                <br/>
                Produto:
                <input type="text" class="inptinfo" name="cxproduto" disabled value="<?php echo $cont['produto']?>"/><br/>
                Quantidade:
                <input type="text" class="inptinfo" name="cxqtde" disabled value="<?php echo $cont['qtde']?>"/><br/>
                Valor:
                <input type="text" class="inptinfo" name="cxvalor" disabled value="<?php echo $cont['valor']?>"/><br/>
                Foto:<br/>
                <?php echo'<img src="../foto/'.$cont['foto'].'" alt="descrição da imagem" class="fotos"><br>';?><br/>
                
                <div class="crud">
                    <a class="btexcluir" href="../model/excluirprod.php?id=<?php echo $cont['id'];?>">
                        <img src="../img/lata-de-lixo.png" alt="">
                    </a>  
                    <a class="btnalterar" href="alteraprod.php?id=<?php echo $cont['id'];?>">
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
</div> 
</body>
</html>