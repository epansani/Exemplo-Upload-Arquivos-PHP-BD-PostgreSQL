<?php
require 'conexao.php';

$sql = "SELECT id_arquivo, descricao, nome, tipo, tamanho, to_char( data_envio, 'DD-MM-YYYY - HH24:MI') as data_envio FROM arquivo order by id_arquivo";

$result = pg_query($conn, $sql);

$total = pg_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exemplo de Envio de Arquivos</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Listagem de Arquivos</h1>

            <?php
            if ($total == 0) {
                ?>
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="alert alert-info" role="alert">
                        <h4>Não há arquivos cadastrados.</h4>
                        <p>A tabela está vazia.</p>
                    </div>
                </div>
                <?php
                require 'menu.php';
                exit;
            }
            ?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIÇÃO</th>
                        <th>NOME</th>
                        <th>TIPO</th>
                        <th>TAMANHO</th>
                        <th>DATA CRIAÇÃO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dados = pg_fetch_assoc($result)) {
                        $id_arquivo = $dados["id_arquivo"];
                        $descricao = $dados["descricao"];
                        $nome = $dados["nome"];
                        $tipo = $dados["tipo"];
                        $tamanho = $dados["tamanho"];
                        $data_envio = $dados["data_envio"];
                        ?>
                        <tr>
                            <td><?php echo $id_arquivo; ?></td>
                            <td><?php echo $descricao; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $tipo; ?></td>
                            <td><?php echo $tamanho; ?></td>
                            <td><?php echo $data_envio; ?></td>
                            <td style="width: 18%;" class="text-center" >
                                <a class="btn btn-sm btn-primary" href="detalhe-arquivo.php?id=<?php echo $id_arquivo; ?>" title="Visualizar"  target="_blank" >
                                    <span class="glyphicon glyphicon-picture"></span>
                                </a>
                                <a class="btn btn-sm btn-primary" href="baixar-arquivo.php?id=<?php echo $id_arquivo; ?>" title="Baixar"  target="_blank" >
                                    <span class="glyphicon glyphicon-download-alt"></span>
                                </a>
                                <a class="btn btn-sm btn-warning" href="formulario-alt.php?id=<?php echo $id_arquivo; ?>" >
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a class="btn btn-sm btn-danger" href="excluir.php?id=<?php echo $id_arquivo; ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
                                            return false;">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php
            require 'menu.php';
            ?>

        </div>
    </body>
</html>

