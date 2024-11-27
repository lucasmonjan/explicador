<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Telefone:</label>
        <input type="text" name="telefone">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
