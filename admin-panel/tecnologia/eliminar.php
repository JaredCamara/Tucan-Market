<?php include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tecnologia WHERE id=$id");
header("Location: listar.php");
?>