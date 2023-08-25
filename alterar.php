<!DOCTYPE html>
<html>
    <head>
        <title>Exemplo de Envio de Arquivos</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Página de Inserir</h1>

            <?php
            require 'conexao.php';

            $id_arquivo = filter_input(INPUT_POST, "id_arquivo");
            $descricao = filter_input(INPUT_POST, "descricao");

            if (empty($_FILES['arquivo']['tmp_name'])) {
                 $sql = "UPDATE arquivo SET descricao = '$descricao'
                           WHERE id_arquivo = $id_arquivo";
            } else {

                $nome = $_FILES['arquivo']['name'];
                $tamanho = $_FILES['arquivo']['size'];
                $tipo = $_FILES['arquivo']['type'];
                $extensao = pathinfo($nome, PATHINFO_EXTENSION);

                // Read in a binary file
                $data = file_get_contents($_FILES['arquivo']['tmp_name']);

                // Escape the binary data
                $dados_arquivo = bin2hex($data);

                $sql = "UPDATE arquivo SET descricao = '$descricao', 
                                       nome = '$nome', 
                                       tipo = '$tipo', 
                                       tamanho = '$tamanho', 
                                       dados_arquivo = decode('{$dados_arquivo}' , 'hex')
                           WHERE id_arquivo = $id_arquivo";
            }
            
            $result = pg_query($conn, $sql);

            if ($result == true) {
                ?>
                <div class="alert alert-success" role="alert">
                    <h4>Dados gravados com sucesso!</h4>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Falha ao efetuar gravação.</h4>
                    <p><?php echo pg_last_error(); ?></p>
                    <p>SQL Executado: <?php echo $sql; ?></p>
                </div>
                <?php
            }
            ?>

            <a class="btn btn-default" href="listagem.php">
                Voltar
            </a>


        </div>
    </body>
</html>