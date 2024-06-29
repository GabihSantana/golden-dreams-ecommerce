<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionários</title>
</head>
<body>
    <form action="../model/inserirfunc.php" method="POST">
    <br/>
        Nome:
        <input type="text" name="cxnome"/><br/><br/>
        Idade:
        <input type="number" name="cxidade"/><br/><br/>
        Email:
        <input type="text" name="cxemail"/><br/><br/>
        Telefone:
        <input type="text" name="cxtelefone"/><br/><br/>
        Senha:
        <input type="password" name="cxsenha" id="senha"/><br/><br/>
        <input type="submit" value="Gravar"/>
        <br/><br/>
        <a class="btvoltar" href="">
           Voltar
        </a>
    </form>
</body>
</html>