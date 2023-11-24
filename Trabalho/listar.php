<!DOCTYPE html>
<html>
<head>
    <title>Lista de Animais</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Lista de Animais</h1>
    <ul>
        <?php
        include 'conexao.php';
        $sql = $conexao->query("SELECT * FROM nomes_db.nomes");
        while ($row = $sql->fetch_array()) {
            echo "<li>{$row['nome']} (Espécie: {$row['especie']},
            Raça: {$row['raca']})</li>";
            echo "<a href='editar.php?id={$row['id']}'>Editar</a> ";
            echo "<a href='excluir.php?id={$row['id']}'>Excluir</a></li> ";
        }
        ?>
        <br><a href="trab.html">Voltar</a>
    </ul>
</body>
</html>