<!DOCTYPE html>
<html>
    <head>
        <title>Exemplo de Envio de Arquivos</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Formulário de Envio de Arquivos</h1>

            <form id="form_foto" action="inserir.php" enctype="multipart/form-data" method="POST" class="form-horizontal" >
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">
                        Descrição:
                    </label>
                    <div class="col-sm-5">
                        <input type="text" name="descricao" id="descricao" required value="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="arquivo" class="col-sm-2 control-label">
                        Arquivo:
                    </label>
                    <div class="col-sm-5">
                        <input type="file" name="arquivo" id="arquivo" required class="form-control">
                    </div>
                </div>
                <div class="col-sm-9 form-group text-center">
                    <input type="submit" value="Enviar" 
                           id="botao_submit" class="btn btn-primary" >
                    <input type="reset" value="Limpar" 
                           id="botao_limpar" class="btn btn-primary" >
                </div>
            </form>
            
            <?php
            require 'menu.php';
            ?>
            
        </div>

    </body>
</html>