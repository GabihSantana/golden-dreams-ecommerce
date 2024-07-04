<?php
    require_once '../factory/conexaobd.php';
    include_once "../view/cabecalho.php";

    echo '<a class="btvoltar" href="../view/buscarprod.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Busca de Produto</title>
</head>
<body>
    <br><br><br>
    <h2>Resultado da busca: </h2>
    <div class="inptsresul">
    <?php
        $campos_form = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    
        if(!empty($campos_form['btnPesquisar'])){
            $dado = "%" . $campos_form['txtPesquisar'] . "%";
    
            $sql = "SELECT * FROM tbprodutos WHERE produto LIKE :valor ORDER BY produto";
            $conexao = new CaminhoBd();
            $consulta = $conexao->getConexaoBd()->prepare($sql);
            $consulta->bindParam(':valor', $dado, PDO::PARAM_STR);
            $consulta->execute(); 

            //exibindo os resultados
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                extract($registro);
            ?>
            <div class="results">
                <form action="">
                    <br/>
                    Produto:
                    <input type="text" class="inptinfo" name="cxproduto" disabled value="<?php echo $registro['produto']?>"/><br/>
                    Quantidade:
                    <input type="text" class="inptinfo" name="cxqtde" disabled value="<?php echo $registro['qtde']?>"/><br/>
                    Valor:
                    <input type="text" class="inptinfo" name="cxvalor" disabled value="<?php echo $registro['valor']?>"/><br/>
                    Foto:<br/>
                    <?php echo'<img src="../foto/'.$registro['foto'].'" alt="descrição da imagem" class="fotos"><br>';?><br/>
                    <br/>
                    <br/>
                </form>
            </div>
    <?php
            }
        }
    ?>
    </div>
</body>
</html>
