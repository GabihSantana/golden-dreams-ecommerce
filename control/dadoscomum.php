<?php
    include_once "../view/cabecalho.php";
    require_once "../factory/conexaobd.php";

    class DadosComuns{
        private $nome;
        private $idade;
        private $telefone;
        private $email;
        private $senha;

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nm){
            $this->nome = $nm;
        }

        public function getIdade(){
            return $this->idade;
        }
        public function setIdade($idd){
            $this->idade = $idd;
        }

        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($tel){
            $this->telefone = $tel;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($mail){
            $this->email = $mail;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($se){
            $this->senha = $se;
        }
    }
?>
