<?php
    include_once "../view/cabecalho.php";
    include_once "../control/dadoadm.php"; 
    include_once "../control/dadofunc.php"; 

    if(isset($_SESSION['funcionario'])){
        echo '<a class="btvoltar" href="../view/menufunc.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
    }else{
        echo '<a class="btvoltar" href="../view/menuadm.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Dados da Conta</title>
</head>
<body>
    <h2>Dados da Conta</h2>
    <div class="inptsinfo">
        <?php
            if (isset($_SESSION['funcobj'])) {
                // convertendo os objetos que foram guardados no serialize no momento do login e exibindo os dados do usuário
                $adm = unserialize($_SESSION['funcobj']);

                echo "Cargo: Funcionário" . "<br /><br />";
                echo "Nome: " . $adm->getNome() . "<br /><br />";
                echo "Idade: " . $adm->getIdade() . "<br /><br />";
                echo "Telefone: " . $adm->getTelefone() . "<br /><br />";
                echo "Email: " . $adm->getEmail() . "<br /><br />";
                echo "Senha: " . $adm->getSenha() . "<br /><br />";
            } 

            elseif (isset($_SESSION['admobj'])){
                $funcionario = unserialize($_SESSION['admobj']);

                echo "Cargo: Administrador" . "<br /><br />";
                echo "Nome: " . $funcionario->getNome() . "<br /><br />";
                echo "Idade: " . $funcionario->getIdade() . "<br /><br />";
                echo "Telefone: " . $funcionario->getTelefone() . "<br /><br />";
                echo "Email: " . $funcionario->getEmail() . "<br /><br />";
                echo "Senha: " . $funcionario->getSenha() . "<br /><br />";
            }
            
            else {
                echo "ERRO - Usuário não encontrado!";
            }
    ?>
        
    </div>
</body>
</html>


    
