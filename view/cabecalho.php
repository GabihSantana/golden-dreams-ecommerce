<?php
    session_start();
    if (!isset($_SESSION['funcionario']) && !isset($_SESSION['adm'])) {
        header("Location: ../view/telalogin.php?erro=true");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="../css/materialize.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="icon" href="../img/logo.png" />
   <link rel="stylesheet" href="../css/headerstyle.css">
   <title></title>
</head>
<body>
    <nav class="custom-navbar">
        <div class="nav-wrapper">
            <img src="../img/logo2.png" alt="Golden Dreams Logo" />
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../view/buscarprod.php" title="Buscar produtos"><i class="material-icons">search</i></a></li>
                <?php 
                    if(isset($_SESSION['funcionario'])){
                        echo '<li><a href="../view/menufunc.php" title="Menu"><i class="material-icons">view_module</i></a></li>';
                    }else{
                        echo '<li><a href="../view/menuadm.php"title="Menu"><i class="material-icons">view_module</i></a></li>';
                    }
                ?>
                <li><a href="perfil.php" title="Conta"><i class="material-icons">account_circle</i></a></li>
                <li><a href="../view/logout.php" title="Sair"><i class="material-icons">keyboard_return</i></a></li>
            </ul>
        </div>
    </nav>

    <ul id="mobile-demo" class="sidenav">
        <li><a href="../view/buscarprod.php"><i class="material-icons">search</i>Buscar</a></li>
        <?php 
            if(isset($_SESSION['funcionario'])){
                echo '<li><a href="../view/menufunc.php"><i class="material-icons">view_module</i>Menu Funcionário</a></li>';
            } else {
                echo '<li><a href="../view/menuadm.php"><i class="material-icons">view_module</i>Menu Administrador</a></li>';
            }
        ?>
        <li><a href="perfil.php"><i class="material-icons">account_circle</i>Conta</a></li>
        <li><a href="../view/logout.php"><i class="material-icons">keyboard_return</i>Sair</a></li>
    </ul>

    <!-- JS do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);

            var elems_trigger = document.querySelectorAll('.sidenav-trigger');
            var instances_trigger = M.Sidenav.init(elems_trigger);
        });
    </script>
</body>
</html>