<?php
$host = "bhhtxpldrz0zbyynx075-mysql.services.clever-cloud.com";
$db = "bhhtxpldrz0zbyynx075";
$user = "up6zdlohsxgfz6ee";
$pass = "OvEsmhl8FquCGBFLG6en";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
