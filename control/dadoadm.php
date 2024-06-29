<?php
    include_once "dadoscomum.php";
    class Administrador extends DadosComuns{
        public function setNome($nm){
            $this->nome = $nm;
        }
        public function getNome(){
            return $this->nome; 
        }

        public function setIdade($idd){
            $this->idade = $idd;
        }
        public function getIdade(){
            return $this->idade; 
        }

        public function setTelefone($tel){
            $this->telefone = $tel;
        }
        public function getTelefone(){
            return $this->telefone; 
        }

        public function setEmail($mail){
            $this->email = $mail;
        }
        public function getEmail(){
            return $this->email; 
        }

        public function setSenha($se){
            $this->senha = $se;
        }
        public function getSenha(){
            return $this->senha; 
        }
    }
?>