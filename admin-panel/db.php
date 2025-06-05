<?php
$host = "bhhtxpldrz0zbyynx075-mysql.services.clever-cloud.com";
$db = "bhhtxpldrz0zbyynx075";
$user = "up6zdlohsxgfz6ee";
$pass = "OvEsmhl8FquCGBFLG6en";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>