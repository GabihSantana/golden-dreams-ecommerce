<?php
        require_once('../factory/conexaobd.php'); 

        if (isset($_POST['Cadastrar'])) {

            $conn = new CaminhoBd();
            $query = "INSERT INTO tbprodutos (produto, qtde, valor, foto) VALUES (:produto, :qtde, :valor, :nome_imagem)";
            $foto = $_FILES["cxfoto"]; 

            if (!empty($foto["name"])) {
            // Verifica se um arquivo foi enviado e se o nome não está vazio (empty)   
                $largura = 1500; 
                $altura = 1800; 
                $tamanho = 2048000; 
                $error = array(); // Array para armazenar possíveis erros encontrados durante o processo de validação da imagem.

                if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])){
                // Verifica se o tipo de arquivo enviado é uma imagem válida (JPEG, PNG, GIF ou BMP).
                $error[0] = "Isso não é uma imagem."; 
            } 
        
            $dimensoes = getimagesize($foto["tmp_name"]); // Obtém as dimensões (largura e altura) da imagem enviada.
        
            if($dimensoes[0] > $largura) {
            // Verifica se a largura da imagem excede a largura máxima permitida.
                $error[1] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; 
            }

            if($dimensoes[1] > $altura) {
            // Verifica se a altura da imagem excede a altura máxima permitida.
                $error[2] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; 
            }
            
            if($foto["size"] > $tamanho) {
            // Verifica se o tamanho do arquivo excede o tamanho máximo permitido.
                $error[3] = "A imagem deve ter no máximo ".$tamanho." bytes"; 
            }

            if (count($error) == 0) {
            // Verifica se não houve erros durante a validação da imagem.

                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); // Extrai a extensão do nome do arquivo e armazena-a na variável $ext.

                $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; // Gera um nome único para a imagem usando o tempo atual e a extensão extraída, e o armazena na variável $nome_imagem.
                $CaminhoBd_imagem = "../foto/" . $nome_imagem; // Define o CaminhoBd onde a imagem será salva, concatenando o diretório "fotos/" com o nome da imagem.

                move_uploaded_file($foto["tmp_name"], $CaminhoBd_imagem); // Move o arquivo enviado para o CaminhoBd especificado.
            
               
                $cadastrar = $conn->getConexaoBd()->prepare($query);   
                
                $cadastrar->bindParam(':produto',$_POST['cxproduto'],PDO::PARAM_STR);
                $cadastrar->bindParam(':qtde',$_POST['cxqtde'],PDO::PARAM_STR);
                $cadastrar->bindParam(':valor',$_POST['cxvalor'],PDO::PARAM_STR);
                $cadastrar->bindParam(':nome_imagem',$nome_imagem,PDO::PARAM_STR);

                $cadastrar->execute();

                if ($cadastrar->rowCount())
                { 
                echo "
                <script> alert('Produto cadastrado com sucesso!') 
                </script>";
                header("Location: ../view/menufunc.php");
                exit;
                // Verifica se a consulta SQL foi executada com sucesso e exibe uma mensagem de sucesso.
                }
                else
                {
                    echo ('<script>ERRO - Falha ao cadastrar o produto.</script>');
                } 
            }

            $totalerro = ""; // Cria uma variável vazia para armazenar mensagens de erro.

            if (count($error) != 0) {
            // Verifica se houve algum erro durante a validação da imagem.

                for($cont = 0; $cont <= sizeof($error); $cont++) {
                // Inicia um loop para percorrer o array de erros.

                    if (!empty($error[$cont])) $totalerro = $totalerro.$error[$cont].'\n';
                    // Se o erro no índice atual não estiver vazio, concatena a mensagem de erro na variável $totalerro.
                }

                echo('<script>window.alert("'.$totalerro.'");window.location="cadastro.php";</script>'); // Exibe um alerta JavaScript com as mensagens de erro e redireciona o usuário de volta para a página "cadastro.php".
            }
        } else {
        // Se não houve erros durante a validação da imagem.

            echo('<script>window.alert("Você não selecionou nenhuma arquivo!");window.location="../view/cadastro.php";</script>'); // Exibe um alerta JavaScript informando ao usuário que nenhum arquivo foi selecionado e redireciona-o de volta para a página "cadastro.php".
        }
    }
    
    ?>
