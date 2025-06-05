<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /Tucan-Market/admin-panel/loginad.php");
    exit;
}
?>
