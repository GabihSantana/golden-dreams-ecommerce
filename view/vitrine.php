<?php
    include_once "../view/cabecalho.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/pages.css">
    <title>Exibir Produto</title>
</head>
<body>
    <?php
        include_once '../factory/conexaobd.php';
        $conn = new CaminhoBd();

        $consulta = "SELECT * FROM tbprodutos";  
        $resultado = $conn->getConexaoBd()->prepare($consulta);
        $resultado->execute();   
    ?>

    <h2>Produtos</h2>
    <hr>
    <div class="display_produtos">
        
    <?php
        while ($cont = $resultado->fetch(PDO::FETCH_ASSOC)) {
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
