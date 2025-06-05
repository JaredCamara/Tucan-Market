<?php include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM ropa WHERE id=$id");
header("Location: listar.php");
?>