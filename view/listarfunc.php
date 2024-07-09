<?php
    include_once "../view/cabecalho.php";
    include_once '../factory/conexaobd.php';
    include_once "../control/dadofunc.php";

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
    <title>Lista de Funcionários</title>
</head>
<body>
    <h2>Funcionários: </h2>
    <div class="inptsresul">
        <?php 
        $func = new Funcionario();
            $resultado = $func->listarFunc();   
            foreach($resultado as $cont) {
        ?>
        <div class="results">
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
                    <a class="btexcluir" href="../model/excluirfunc.php?id=<?php echo $cont['id_funcionario'];?>">
                        <img src="../img/lata-de-lixo.png" alt="">
                    </a>  
                    <a class="btnalterar" href="alterafunc.php?id=<?php echo $cont['id_funcionario'];?>">
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