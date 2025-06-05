<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];

// Manejo de suma/resta de cantidad
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'], $_POST['id'])) {
        $id = $_POST['id'];
        if (isset($carrito[$id])) {
            if ($_POST['accion'] === 'sumar') {
                $carrito[$id]['cantidad']++;
            } elseif ($_POST['accion'] === 'restar' && $carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } elseif ($_POST['accion'] === 'restar' && $carrito[$id]['cantidad'] == 1) {
                unset($carrito[$id]);
            }
        }
    }
    $_SESSION['carrito'] = $carrito;
    header("Location: carrito.php");
    exit;
}
?>

<style>
/* Estilo para el carrito */
body {
    font-family: Arial, sans-serif;
    background: #f8f9fa;
    margin: 0;
    padding: 0;
}
.menu-superior {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    background: #172a7c;
    color: #fff;
    padding: 0;
    width: 100%;
    box-sizing: border-box;
}
.menu-superior .logo {
    display: flex;
    align-items: center;
    margin-left: 32px;
}
.menu-superior nav {
    flex: 1;
}
.menu-superior ul {
    display: flex;
    gap: 38px;
    list-style: none;
    margin: 0;
    padding: 0;
    justify-content: center;
    flex-wrap: wrap;
}
.menu-superior li {
    margin: 0;
}
.menu-superior a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}
.menu-superior .barra-busqueda {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-right: 32px;
}
.menu-superior input[type="text"] {
    padding: 5px 10px;
    border-radius: 3px;
    border: none;
    font-size: 15px;
}
.menu-superior button {
    background: #666;
    color: #fff;
    border: none;
    padding: 5px 12px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 15px;
}
.menu-superior #cerrar-sesion-btn {
    background: #e74c3c;
    border-radius: 4px;
    padding: 7px 12px;
    font-size: 14px;
    display: none;
}
.menu-superior .carrito {
    cursor: pointer;
    display: flex;
    align-items: center;
}
.menu-superior .carrito-icono {
    font-size: 20px;
}
.menu-superior .contador {
    font-size: 13px;
    margin-left: 3px;
}
@media (max-width: 900px) {
    .menu-superior {
        flex-direction: column;
        align-items: stretch;
    }
    .menu-superior .logo, .menu-superior .barra-busqueda {
        margin: 10px 0 10px 0;
        justify-content: center;
        margin-left: 0;
        margin-right: 0;
    }
    .menu-superior nav ul {
        gap: 18px;
    }
}
@media (max-width: 600px) {
    .menu-superior nav ul {
        flex-direction: column;
        gap: 8px;
    }
    .menu-superior .barra-busqueda {
        flex-direction: column;
        gap: 8px;
    }
    .carrito-container {
        padding: 18px 5vw;
    }
}

/* Banner deslizable */
.banner {
    width: 100%;
    max-width: 100vw;
    height: 220px;
    overflow: hidden;
    position: relative;
    background: #eaeaea;
    display: flex;
    align-items: center;
    justify-content: center;
}
.banner img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    transition: opacity 1s;
    z-index: 1;
}
.banner img.active {
    opacity: 1;
    z-index: 2;
}
@media (max-width: 700px) {
    .banner, .banner img {
        height: 120px;
    }
}

/* Estilo para el carrito */
.carrito-container {
    background: #fff;
    max-width: 500px;
    margin: 40px auto;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 30px 40px;
}
.carrito-lista {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
}
.carrito-lista li {
    border-bottom: 1px solid #eee;
    padding: 12px 0;
    font-size: 17px;
    color: #444;
    display: flex;
    justify-content: space-between;
}
.carrito-lista li:last-child {
    border-bottom: none;
}
.carrito-total {
    font-weight: bold;
    font-size: 18px;
    color: #222;
    margin-bottom: 20px;
}
.carrito-vacio {
    color: #888;
    text-align: center;
    margin: 40px 0;
}
.finalizar-btn {
    display: inline-block;
    background: #28a745;
    color: #fff;
    text-decoration: none;
    padding: 12px 28px;
    border-radius: 5px;
    font-size: 16px;
    transition: background 0.2s;
}
.finalizar-btn:hover {
    background: #218838;
}
</style>

<!-- MENU SUPERIOR -->
<div class="menu-superior">
    <div class="logo">
    </div>
    <nav style="flex:1;">
      <ul>
        <li><a href="admin-panel\admin.php">Panel Admin</a></li>
        <li><a href="quienes-somos.php">Quiénes Somos</a></li>
        <li><a href="#contacto">Contacto</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
        <li class="testimonios-link"><a href="#testimonios-link">Testimonios</a></li>
      </ul>
    </nav>
    <div class="barra-busqueda">
      <input type="text" placeholder="Buscar productos..." id="busqueda" onkeydown="if(event.key==='Enter'){buscarProducto();return false;}">
      <button onclick="buscarProducto()">Buscar</button>
      <span id="nombre-usuario"></span>
      <button id="cerrar-sesion-btn">Cerrar sesión</button>
      <div class="carrito" onclick="verCarrito()">
        <span class="carrito-icono">🛒</span>
        <span class="contador" id="contador-carrito">0</span>
      </div>
    </div>
</div>


<script>
// Banner deslizable
let bannerIndex = 0;
const banners = document.querySelectorAll('.banner img');
setInterval(() => {
    banners[bannerIndex].classList.remove('active');
    bannerIndex = (bannerIndex + 1) % banners.length;
    banners[bannerIndex].classList.add('active');
}, 3500);

// Carrito contador (opcional, si tienes lógica JS de carrito)
function verCarrito() {
    window.location.href = "carrito.php";
}
function buscarProducto() {
    const q = document.getElementById('busqueda').value.trim();
    if(q) window.location.href = "buscar.php?q=" + encodeURIComponent(q);
}
</script>

<div class="carrito-container">
    <h1>Carrito</h1>
    <?php if (empty($carrito)): ?>
        <p class="carrito-vacio">El carrito está vacío.</p>
    <?php else: ?>
        <ul class="carrito-lista">
            <?php foreach ($carrito as $id => $item): ?>
                <li>
                    <span><?= htmlspecialchars($item['nombre']) ?></span>
                    <span>
                        $<?= $item['precio'] ?> x 
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="accion" value="restar" style="padding:2px 8px; margin-right:2px;">-</button>
                        </form>
                        <?= $item['cantidad'] ?>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="accion" value="sumar" style="padding:2px 8px; margin-left:2px;">+</button>
                        </form>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="carrito-total">
            Total: $
            <?php
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            echo $total;
            ?>
        </p>
        <a class="finalizar-btn" href="checkout.php">Finalizar compra</a>
    <?php endif; ?>
</div>