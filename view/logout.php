<?php
    //pagina para acabar com a session do usuário ao clicar em desconectar
    session_start();

    session_unset();
    session_destroy();
   
    //redirecionar para a página de login
   header('Location: ../index.php');   
   exit;
?>