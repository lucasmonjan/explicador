<?php include 'db.php'; ?>

<?php
$sql = "SELECT * FROM clientes";
$stmt = $conn->query($sql);
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link rel="stylesheet" href="listar.css">
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="cadastrar.php">Cadastrar Novo Cliente</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['id'] ?></td>
            <td><?= $cliente['nome'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
            <td>
                <a href="editar.php?id=<?= $cliente['id'] ?>">Editar</a>
                <a href="deletar.php?id=<?= $cliente['id'] ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
