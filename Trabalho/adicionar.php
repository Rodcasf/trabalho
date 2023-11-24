<?php
    include 'conexao.php';

    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];

    $sql = "INSERT INTO nomes_db.nomes (nome, especie, raca) VALUES ('$nome', '$especie', '$raca')";

    if ($conexao->query($sql) === TRUE) {
        echo "Dados inseridos!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }
    $conexao->close();
header('Location: index.html');
?>