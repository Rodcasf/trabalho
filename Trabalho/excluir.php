<!DOCTYPE html>
<html>
    <head>
        <title>Excluir Cadastro</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Excluir Cadastro</h1>
    <?php
    include 'conexao.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) &&
    isset($_GET['confirm']) && $_GET['confirm'] === 'true') {

        $id = $_GET['id'];
        $sql = $conexao->prepare("DELETE FROM nomes_db.nomes WHERE id = ?");
        $sql->bind_param('i', $id);
        $sql->execute();
        echo '<p>Cadastro excluido com sucesso.</p>';
        echo '<a href= "listar.php">Retornar para lista</a>';
    
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = $conexao->prepare("SELECT nome FROM nomes_db.nomes WHERE id = ?");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $nome = $row['nome'];
            echo '<p>Tem certeza que quer excluir o cadastro "' . $nome . '"?</p>';
            echo '<a href="excluir.php?id=' . $id . '&confirm=true">Sim</a></br>';
            echo '<a href="listar.php">Não</a>';

        } else {
            echo '<p>Nome não encontrado.</p>';
        }
    }   else{
        echo '<p>Parametros invalidos.</p>';
    }
    ?>
    </body>
    </html>