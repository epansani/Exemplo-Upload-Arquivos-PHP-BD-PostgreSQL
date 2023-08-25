<!DOCTYPE html>
<html>
    <head>
        <title>Exemplo de Envio de Arquivos</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Página de Exclusão</h1>

            <?php
            require 'conexao.php';

            $id_arquivo = filter_input(INPUT_GET, "id");

            $sql = "DELETE FROM arquivo WHERE id_arquivo = $id_arquivo";

            $result = pg_query($conn, $sql);

            if ($result == true) {
                ?>
                <div class="alert alert-success" role="alert">
                    <h4>Arquivo excluído com sucesso!</h4>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Falha ao efetuar exclusão.</h4>
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