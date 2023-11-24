<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca  = $_POST['raca'];

    $sql = $conexao->query("UPDATE nomes_db.nomes SET nome = '$nome', especie = '$especie',
    raca = '$raca' WHERE id = '$id'");

    header("Location: trab.html");
}
?>