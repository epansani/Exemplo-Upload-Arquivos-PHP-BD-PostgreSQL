<?php
$host = "localhost";
$dbname = "";
$user = "postgres";
$password = "";

$conn = pg_connect("host=$host port=5432                                   
                    dbname=$dbname user=$user
                    password=$password");

if (!$conn) {
    exit("Erro ao conectar ao Banco de Dados!");
}