<?php
require_once './conexao.php';

$id_arquivo = filter_input(INPUT_GET, "id");

$sql = "SELECT nome, tipo, tamanho, dados_arquivo FROM arquivo WHERE id_arquivo = $id_arquivo";
$result = pg_query($conn, $sql);
$dados = pg_fetch_assoc($result);
$nome = $dados["nome"];
$tipo = $dados["tipo"];
$tamanho = $dados["tamanho"];
$dados_arquivo = $dados["dados_arquivo"];
header('Content-Type: ' . $tipo);
header('Content-Length: ' . $tamanho);
header("Content-Disposition: attachment; filename=\"$nome\"");
header('Content-Transfer-Encoding: binary');
header('Connection: Keep-Alive');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
echo pg_unescape_bytea($dados_arquivo);