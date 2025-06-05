<?php
session_start();
$_SESSION['carrito'] = []; // vacía el carrito

echo "<h1>¡Gracias por tu compra!</h1>";
echo "<a href='index.php'>Volver a la tienda</a>";