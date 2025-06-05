<?php
session_start();
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch();

    // Comparación directa SIN hash
    if ($user && $contrasena === $user['contrasena']) {
        session_regenerate_id(true); // Protección contra fijación de sesión
        $_SESSION['usuario'] = $usuario;
        header("Location: admin.php"); // Corrige la ruta de redirección
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!-- HTML -->
<h2>Iniciar sesión como administrador</h2>
<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
