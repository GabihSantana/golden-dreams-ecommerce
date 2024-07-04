<?php
    include_once "dadoscomum.php";

    // func e adm possuem os mesmos dados cadastrados

    class Administrador extends DadosComuns {
        public function setUsuario($nome, $idade, $tel, $email, $senha) {
            $this->setNome($nome);
            $this->setIdade($idade);
            $this->setTelefone($tel);
            $this->setEmail($email);
            $this->setSenha($senha);
        }
    }
?>
