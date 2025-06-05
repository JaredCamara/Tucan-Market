<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Finalizar compra</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .checkout-container { max-width: 700px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 10px #0001; padding: 30px; }
        h2 { text-align: center; color: #172a7c; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: center; }
        th { background: #f2f2f2; color: #172a7c; }
        .total { font-weight: bold; color: #222; }
        .btn-finalizar { background: #172a7c; color: #fff; border: none; border-radius: 6px; padding: 12px 30px; font-size: 1.1rem; cursor: pointer; margin-top: 25px; display: block; width: 100%; }
        .btn-finalizar:hover { background: #0e1a4d; }
        .empty-cart { text-align: center; color: #888; margin: 40px 0; }
        img { max-width: 60px; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Resumen de tu compra</h2>

        <?php if (empty($carrito)): ?>
            <div class="empty-cart">Tu carrito está vacío.</div>
        <?php else: ?>
            <table>
                <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>
                <?php
                $total = 0;
                foreach ($carrito as $item):
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($item['nombre']) ?></td>
                    <td>$<?= number_format($item['precio'], 2) ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td>$<?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total">$<?= number_format($total, 2) ?></td>
                </tr>
            </table>
            <form method="POST">
                <button type="submit" name="finalizar" class="btn-finalizar">Finalizar compra</button>
            </form>
        <?php endif; ?>

        <div style="text-align:center; margin-top:20px;">
            <a href="carrito.php" style="color:#172a7c; text-decoration:underline; font-size:1rem;">← Volver al carrito</a>
        </div>
    </div>

<?php
// Al finalizar compra: limpiar carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    $_SESSION['carrito'] = [];
    echo "<script>alert('¡Gracias por tu compra!'); window.location.href = 'index.php';</script>";
}
?>
</body>
</html>
