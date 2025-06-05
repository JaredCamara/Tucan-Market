<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];
?>

<h1>Carrito</h1>
<?php if (empty($carrito)): ?>
    <p>El carrito está vacío.</p>
<?php else: ?>
    <ul>
        <?php foreach ($carrito as $id => $item): ?>
            <li>
                <?= $item['nombre'] ?> - $<?= $item['precio'] ?> x <?= $item['cantidad'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>
        Total: $
        <?php
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        echo $total;
        ?>
    </p>
    <a href="finalizar.php">Finalizar compra</a>
<?php endif; ?>
