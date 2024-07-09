<?php
    include_once "../view/cabecalho.php";

    if(isset($_SESSION['funcionario'])){
        echo '<a class="btvoltar" href="../view/menufunc.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
    }else{
        echo '<a class="btvoltar" href="../view/menuadm.php"> <img src="../img/seta-esquerda (1).png" alt="" width="40px"> </a>';
    }
?>