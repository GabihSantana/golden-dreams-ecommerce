<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
</head>
<body>
    <form action="inserirprod.php" method="POST" enctype="multipart/form-data" name="cadastro"> 
        Produto:
        <input type="text" name="cxproduto"/><br/><br/>
        Quantidade:
        <input type="number" name="cxqtde"/><br/><br/>
        Valor:
        <input type="text" name="cxvalor"/><br/><br/>
        Foto:
        <input type="file" name="cxfoto" id="foto"/><br/><br/> 
        <input type="submit" id="cadtBtn" name="Cadastrar" value="Cadastrar"/>
        <br/><br/>
        <a class="btvoltar" href="">
          Voltar
        </a>
    <br/>
</body>
</html>