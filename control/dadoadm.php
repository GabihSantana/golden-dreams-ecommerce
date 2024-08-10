<?php
    include_once "dadoscomum.php";
    require_once "../factory/conexaobd.php";

    // func e adm possuem os mesmos dados cadastrados

    class Administrador extends DadosComuns {
        private $conexao;
        
        public function __construct() {
            $this->conexao = new CaminhoBd();
        }

        public function setUsuario($nome, $idade, $tel, $email, $senha) {
            $this->setNome($nome);
            $this->setIdade($idade);
            $this->setTelefone($tel);
            $this->setEmail($email);
            $this->setSenha($senha);
        }

        public function acessoAdm($email, $senha) {
        $sqlquery = "CALL verificaAdm(:email, :senha)";
        $verificarLogin = $this->conexao->getConexaoBd()->prepare($sqlquery);
        $verificarLogin->bindParam(':email', $email, PDO::PARAM_STR);
        $verificarLogin->bindParam(':senha', $senha, PDO::PARAM_STR);
        $verificarLogin->execute();

        $registro = $verificarLogin->fetch(PDO::FETCH_ASSOC);
        return $registro;
        }

    }
?>
