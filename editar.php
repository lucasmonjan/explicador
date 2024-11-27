<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'id' => $id]);

    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $cliente['email'] ?>" required>
        <br>
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>">
        <br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
