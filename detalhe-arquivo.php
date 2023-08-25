<!DOCTYPE html>
<html>
    <head>
        <title>Exemplo de Envio de Arquivos</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Mostrar Arquivo de imagem</h1>
            <?php
            $id_arquivo = $_GET["id"];
            ?>
            <img src="mostrar-arquivo.php?id=<?= $id_arquivo ?>" alt="Imagem" />
            
            <a class="btn btn-default" href="listagem.php">
                Voltar
            </a>

        </div>
    </body>
</html>

