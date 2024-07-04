<?php
     require_once "../view/cabecalho.php";
     require_once "../control/dadoprod.php";

    if (isset($_POST['btnalterar'])) {
        $produtoObj = new Produtos();

        $id = $_POST['cxid'];
        $produto = $_POST['cxproduto'];
        $qtde = $_POST['cxqtde'];
        $valor = $_POST['cxvalor'];
        $foto = isset($_FILES['cxfoto']) ? $_FILES['cxfoto'] : null;

        if ($foto && !empty($foto["name"])) {
            // Verificação e validação da foto aqui
            $largura = 1500; 
            $altura = 1800; 
            $tamanho = 2048000; 
            $error = array();

            if (!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])) {
                $error[] = "Isso não é uma imagem."; 
            }

            $dimensoes = getimagesize($foto["tmp_name"]);

            if ($dimensoes[0] > $largura || $dimensoes[1] > $altura || $foto["size"] > $tamanho) {
                $error[] = "A imagem deve ter no máximo " . $tamanho . " bytes e não pode ultrapassar as dimensões de " . $largura . "x" . $altura . " pixels"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "../foto/" . $nome_imagem;

                move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                // Atualiza o produto com a nova imagem
                $resultado = $produtoObj->alterarProdutoImg($id, $produto, $qtde, $valor, $nome_imagem);

                if ($resultado) {
                    echo '<script>window.alert("Produto alterado com sucesso!"); window.location="../view/listarprod.php";</script>';
                    exit;
                } else {
                    echo '<script>window.alert("ERRO - Falha ao alterar o produto."); window.location="../view/listarprod.php";</script>';
                    exit;
                }
            } else {
                foreach ($error as $erro) {
                    echo '<script>window.alert("' . $erro . '"); window.location="../view/listarprod.php";</script>';
                    exit;
                }
            }
        } else {
            // Atualiza o produto sem alterar a imagem
            $resultado = $produtoObj->alterarProduto($id, $produto, $qtde, $valor);

            if ($resultado) {
                echo '<script>window.alert("Produto alterado com sucesso!"); window.location="../view/listarprod.php";</script>';
                exit;
            } else {
                echo '<script>window.alert("ERRO - Falha ao alterar o produto."); window.location="../view/listarprod.php";</script>';
                exit;
            }
        }
    } else {
        echo '<script>window.alert("Acesso inválido."); window.location="../view/listarprod.php";</script>';
        exit;
    }
?>
