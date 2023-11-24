<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conexao->prepare("SELECT * FROM nomes_db.nomes WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result();
    $nome = $result->fetch_array();

    if ($nome) {
        echo '<form action= "atualizar.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $nome['id'] . '">';
        echo '<label for="nome">Nome do animal:</label>';
        echo '<input type="text" name="nome" value="' . $nome['nome'] . '" required><br>';
        echo '<label for="especie">Espécie:</label>';
        echo '<input type="text" name="especie" value="' . $nome['especie'] . '" required><br>';
        echo '<label for="raca">Raça:</label>';
        echo '<input type="text" name="raca" value="' . $nome['raca'] . '" required><br>';
        echo '<button type="submit">Atualizar</button>';
        echo '</form>';
    } else {
        echo '<p>Nome não encontrado.</p>';
    }
} else {
    echo '<p>Parâmetros inválidos.</p>';
}
echo '<a href="trab.html">Retornar para Cadastro</a>';
?>