<?php
session_start();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

// Inicia carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si ya está en el carrito, suma 1
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad']++;
} else {
    $_SESSION['carrito'][$id] = [
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => 1
    ];
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();