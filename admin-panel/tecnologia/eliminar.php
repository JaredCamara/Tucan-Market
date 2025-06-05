<?php
include '../auth.php'; include '../db.php';

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$stmt = $pdo->prepare("DELETE FROM tecnologia WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: listar.php");
exit;
?>