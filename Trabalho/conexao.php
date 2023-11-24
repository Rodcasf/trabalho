<?php

$conexao = new mysqli("localhost", "root");

$conexao->execute_query("CREATE DATABASE IF NOT EXISTS nomes_db");

$conexao->execute_query("CREATE TABLE IF NOT EXISTS nomes_db.nomes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    especie VARCHAR(255) NOT NULL,
    raca VARCHAR(255) NOT NULL
    )");
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

?>