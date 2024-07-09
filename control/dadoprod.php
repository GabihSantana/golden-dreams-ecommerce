<?php
    include_once "../view/cabecalho.php";
    require_once "../factory/conexaobd.php";

    class Produtos{

        private $conexao;

        public function __construct() {
            $this->conexao = new CaminhoBd();
        }

        private $nome;
        private $quantidade;
        private $valor;
        private $foto;

        public function setNome($nm){
            $this->nome = $nm;
        }
        public function getNome(){
            return $this->nome; 
        }

        public function setQtd($qtd){
            $this->quantidade = $qtd;
        }
        public function getQtd(){
            return $this->quantidade; 
        }

        public function setValor($val){
            $this->valor = $val;
        }
        public function getValor(){
            return $this->valor; 
        }

        public function setFoto($foto){
            $this->foto = $foto;
        }
        public function getFoto(){
            return $this->foto; 
        }

        public function consultarProduto($id) {
            $query = "CALL consultarProduto(:id)";
            $consulta = $this->conexao->getConexaoBd()->prepare($query);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
    
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
    
        public function alterarProdutoImg($id, $produto, $qtde, $valor, $foto) {
            $query = "CALL alterarProdutoComImg(:id, :produto, :qtde, :valor, :foto)";
            $altera = $this->conexao->getConexaoBd()->prepare($query);
            $altera->bindParam(':produto', $produto, PDO::PARAM_STR);
            $altera->bindParam(':qtde', $qtde, PDO::PARAM_INT);
            $altera->bindParam(':valor', $valor, PDO::PARAM_STR);
            $altera->bindParam(':foto', $foto, PDO::PARAM_STR);
            $altera->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $altera->execute();
        }

        public function alterarProduto($id, $produto, $qtde, $valor) {
            $query = "CALL alterarProdutoSemImg(:id, :produto, :qtde, :valor)";
            $altera = $this->conexao->getConexaoBd()->prepare($query);
            $altera->bindParam(':produto', $produto, PDO::PARAM_STR);
            $altera->bindParam(':qtde', $qtde, PDO::PARAM_INT);
            $altera->bindParam(':valor', $valor, PDO::PARAM_STR);
            $altera->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $altera->execute();
        }

        public function inserirProduto($prod, $qtd, $valor, $img){
            $query = "CALL criarProduto(:produto, :qtde, :valor, :nome_imagem)";

            $cadastrar = $this->conexao->getConexaoBd()->prepare($query);   
            $cadastrar->bindParam(':produto',$prod,PDO::PARAM_STR);
            $cadastrar->bindParam(':qtde',$qtd,PDO::PARAM_STR);
            $cadastrar->bindParam(':valor',$valor,PDO::PARAM_STR);
            $cadastrar->bindParam(':nome_imagem',$img,PDO::PARAM_STR);

            return $cadastrar->execute();
        }

        public function excluirProduto($id){
            $query = "CALL deletarProduto(:codigo)";
            $excluir = $this->conexao->getConexaoBd()->prepare($query);
            $excluir->bindParam(':codigo', $id, PDO::PARAM_INT);
            
            return $excluir->execute();
        }

        public function listarProdutos() {
            $consulta = "CALL listarProdutos()";  
            $resultado = $this->conexao->getConexaoBd()->prepare($consulta);
            if ($resultado->execute()) {
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if(isset($_SESSION['funcionario'])){
                    echo('<script>window.alert("Não foi possivel listar os produtos");window.location="../view/menufunc.php";</script>');
                }else{
                    echo('<script>window.alert("Não foi possivel listar os produtos");window.location="../view/menuadm.php";</script>');
                } 
            }
        }

        public function buscarProduto($produto){
            $busca = "CALL buscarProduto(:prod)";
            $resultado = $this->conexao->getConexaoBd()->prepare($busca);
            $resultado->bindParam(':prod',$produto,PDO::PARAM_STR);

            if ($resultado->execute()) {
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        
}

?>