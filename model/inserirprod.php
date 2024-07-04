<?php
        require_once('../factory/conexaobd.php'); 
        include_once "../view/cabecalho.php";

    if (isset($_POST['Cadastrar'])) {

        $conn = new CaminhoBd();
        $query = "INSERT INTO tbprodutos (produto, qtde, valor, foto) VALUES (:produto, :qtde, :valor, :nome_imagem)";
        $foto = $_FILES["cxfoto"]; 

        if (!empty($foto["name"])) {
            $largura = 1500; 
            $altura = 1800; 
            $tamanho = 2048000; 
            $error = array(); // Array para armazenar erros 

            if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[0] = "Isso não é uma imagem."; 
            } 
        
            $dimensoes = getimagesize($foto["tmp_name"]); 
        
            if($dimensoes[0] > $largura) {
                $error[1] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; 
            }

            if($dimensoes[1] > $altura) {
                $error[2] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; 
            }
            
            if($foto["size"] > $tamanho) {
                $error[3] = "A imagem deve ter no máximo ".$tamanho." bytes"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; 
                $CaminhoBd_imagem = "../foto/" . $nome_imagem;
                move_uploaded_file($foto["tmp_name"], $CaminhoBd_imagem); 

                $cadastrar = $conn->getConexaoBd()->prepare($query);   
                $cadastrar->bindParam(':produto',$_POST['cxproduto'],PDO::PARAM_STR);
                $cadastrar->bindParam(':qtde',$_POST['cxqtde'],PDO::PARAM_STR);
                $cadastrar->bindParam(':valor',$_POST['cxvalor'],PDO::PARAM_STR);
                $cadastrar->bindParam(':nome_imagem',$nome_imagem,PDO::PARAM_STR);

                $cadastrar->execute();

                if ($cadastrar->rowCount()){ 
                    if(isset($_SESSION['funcionario'])){
                        echo('<script>window.alert("Produto cadastrado com sucesso!");window.location="../view/menufunc.php";</script>');
                        exit;
                    }else{
                        echo('<script>window.alert("Produto cadastrado com sucesso!");window.location="../view/menuadm.php";</script>');
                        exit;
                    }   
                }else{
                    echo ('<script>ERRO - Falha ao cadastrar o produto.</script>');
                } 
            }

            $totalerro = ""; 

            if (count($error) != 0) {
                for($cont = 0; $cont <= sizeof($error); $cont++) {
                    if (!empty($error[$cont])) $totalerro = $totalerro.$error[$cont].'\n';
                }

                echo('<script>window.alert("'.$totalerro.'");window.location="../view/telacadprod.php";</script>'); 
            }
        } else {
            echo('<script>window.alert("Você não selecionou nenhuma arquivo!");window.location="../view/telacadprod.php";</script>'); 
        }
    }
    
?>
