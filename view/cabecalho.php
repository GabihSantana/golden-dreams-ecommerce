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
            <a href="" class="logo"><img src="../img/logo2.png" alt="Golden Dreams Logo" /></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html"><i class="material-icons">search</i></a></li>
                <?php 
                    if(isset($_SESSION['funcionario'])){
                        echo '<li><a href="../view/menufunc.php"><i class="material-icons">view_module</i></a></li>';
                    }else{
                        echo '<li><a href="../view/menuadm.php"><i class="material-icons">view_module</i></a></li>';
                    }
                ?>
                <li><a href="collapsible.html"><i class="material-icons">account_circle</i></a></li>
                <li><a href="logout.php"><i class="material-icons">keyboard_return</i></a></li>
            </ul>
        </div>
    </nav>

    <!-- JS do Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>