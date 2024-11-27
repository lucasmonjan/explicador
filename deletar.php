<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: listar.php");
exit;
?>
