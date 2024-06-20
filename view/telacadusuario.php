<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionario</title>
</head>
<body>
<div class="SignUpFuncField">
        <form action="../model/inserirfunc.php" method="POST">
            <label for="cxnome">Nome:
                <input type="text" name="cxnome">
            </label>
            <label for="cxidade">Idade:
                <input type="number" name="cxidade">
            </label>
            <label for="cxtelefone">Telefone:
                <input type="text" name="cxtelefone">
            </label>
            <label for="cxemail">Email:
                <input type="email" name="cxemail">
            </label>
            <label for="cxsenha">Senha:
                <input type="password" name="cxsenha">
            </label>

            <button>Cadastrar</button>
        </form>
    </div>
</body>
</html>