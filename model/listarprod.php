<!DOCTYPE html>
<html lang="pt-br
">
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
      
        $consulta = "select *from tbprodutos";  

        $resultado = $conn->getConn()->prepare($consulta);
        $resultado->execute();   

        while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <form action="">
        <br/>
        Produto:
        <input type="text" name="cxproduto" value="<?php echo $cont['produto']?>"/><br/>
        Quantidade:
        <input type="text" name="cxqtde" value="<?php echo $cont['qtde']?>"/><br/>
        Valor:
        <input type="text" name="cxvalor" value="<?php echo $cont['valor']?>"/><br/>
        Foto:
        <input type="text" name="cxvalor" value="<?php echo'<img src="../fotos/'.$cont['foto'].'" alt="descrição da imagem" class="fotos"><br>';?>"/><br/>
        <a class="btexcluir" href="excluirproduto.php?id=<?php echo $linha['cod'];?>">X</a>  
        <br/>
        <br/>
    </form>
    <?php
       } //Fecha o while
    ?>
    <a class="" href="">
       Voltar
    </a>
</body>
</html>