<?php
    include_once "dadoscomum.php";
    require_once "../factory/conexaobd.php";
    
    // extendendo os dados que são em comum
    class Funcionario extends DadosComuns{

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

        public function consultarFuncionario($id) {
            $query = "SELECT * FROM tbfuncionarios WHERE id_funcionario = :cod";
            $consulta = $this->conexao->getConexaoBd()->prepare($query); 
            $consulta->bindParam(':cod', $id, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }

        public function alterarFuncionario($cod, $nome, $idade, $tel, $email, $senha){
            $query = "UPDATE tbfuncionarios SET nome=:nome, idade=:idade, telefone=:telefone, email=:email, senha=:senha WHERE id_funcionario=:cod";
            $altera = $this->conexao->getConexaoBd()->prepare($query); 
            $altera->bindParam(':cod', $cod, PDO::PARAM_INT);
            $altera->bindParam(':nome', $nome, PDO::PARAM_STR);
            $altera->bindParam(':idade', $idade, PDO::PARAM_INT);
            $altera->bindParam(':telefone', $tel, PDO::PARAM_STR);
            $altera->bindParam(':email', $email, PDO::PARAM_STR);
            $altera->bindParam(':senha', $senha, PDO::PARAM_STR);
            
            return $altera->execute();
        }

        public function deletarFuncionario($cod){
            $query = "DELETE from tbfuncionarios WHERE id_funcionario = :cod";
            $exclusao = $this->conexao->getConexaoBd()->prepare($query); 
            $exclusao->bindParam(':cod', $cod, PDO::PARAM_INT);

            return $exclusao->execute();
        }

        public function inserirFuncionario($nome, $idade, $telefone, $email, $senha){
            $sqlquery = "INSERT INTO tbfuncionarios(nome, idade, telefone, email, senha) 
                        VALUES (:nome, :idade, :telefone, :email, :senha)";
            $cadastrarFunc = $this->conexao->getConexaoBd()->prepare($sqlquery);
            $cadastrarFunc->bindParam(':nome', $nome, PDO::PARAM_STR);
            $cadastrarFunc->bindParam(':idade', $idade, PDO::PARAM_INT);
            $cadastrarFunc->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $cadastrarFunc->bindParam(':email', $email, PDO::PARAM_STR);
            $cadastrarFunc->bindParam(':senha', $senha, PDO::PARAM_STR);
            
            return $cadastrarFunc->execute();
        }


    }
?>