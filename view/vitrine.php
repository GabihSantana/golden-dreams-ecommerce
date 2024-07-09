<?php
    include_once "../view/cabecalho.php";
    include_once "../control/dadoprod.php";
    include_once "../factory/conexaobd.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/pages.css">
    <title>Vitrine</title>
</head>
<body>
    <?php
        $prod = new Produtos();
        $resultado = $prod->listarProdutos();
    ?>

    <h2>Produtos</h2>
    <hr>
    <div class="display_produtos">
        
    <?php
        foreach ($resultado as $cont) {
    ?>
        <div class="card">
            <div class="card-image">
                <?php echo '<img src="../foto/'.$cont['foto'].'" alt="descrição da imagem">';?>
            </div>
            <div class="card-content">
                <h3><?php echo $cont['produto']?></h3><br />
                <p>R$ <?php echo $cont['valor']?></p>
                <p>Disponível: <?php echo $cont['qtde']?></p>
            </div>
            <div class="card-action">
                <a href="#">Comprar</a>
            </div>
        </div>
    <?php
        } // Fecha o while
    ?>
    </div>
</body>
</html>
