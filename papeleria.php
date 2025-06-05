<?php
session_start();
include 'admin-panel/db.php';

$productos = [];

try {
    $stmt = $pdo->query("SELECT * FROM papeleria");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los productos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Papeleria-nuestra tienda</title>
  <link rel="stylesheet" href="style.css">

  <style>
        body {
            font-family: Arial, sans-serif;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columnas */
            gap: 20px;
            padding: 20px;
        }
        .producto {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .producto img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .producto h3 {
            margin: 10px 0 5px;
        }
        .producto p {
            margin: 5px 0;
        }
        .producto button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .producto button:hover {
            background-color: #218838;
        }
        .carrito-link {
            margin: 20px;
            display: inline-block;
        }
    </style>

</head>
<body>

    <!-- Barra de estado de login -->
    <div id="login-status">
        <span id="user-greeting"></span>
        <button id="logout-btn" style="display: none;">Cerrar Sesión</button>
    </div>

    <!-- BANNER DE NAVEGACIÓN IGUAL AL INDEX -->
<header style="background: #172a7c; color: #fff; padding: 0;">
  <div style="display: flex; align-items: center; justify-content: space-between; max-width: 100vw; padding: 0 30px;">
    <div style="display: flex; align-items: center;">
      <img src="https://media.licdn.com/dms/image/v2/D4E0BAQGzyLtzNxAmVQ/company-logo_200_200/company-logo_200_200/0/1706325237530/instituto_tecnologico_de_cancn_logo?e=2147483647&v=beta&t=lTklKP8Ih95EBR21RQvI1lgtFT0OKJJIfJZuHsY92aI" alt="Logo" style="height: 55px; margin-right: 18px; border-radius: 12px;">
      <nav>
        <ul style="display: flex; gap: 28px; list-style: none; margin: 0; padding: 0;">
          <li><a href="index.php" style="color: #fff; text-decoration: none; font-weight: bold;">Inicio</a></li>
          <li><a href="quienes-somos.php" style="color: #fff; text-decoration: none;">Quiénes Somos</a></li>
          <!-- <li><a href="#" style="color: #fff; text-decoration: none;">Mi Cuenta</a></li> -->
          <li><a href="#contactanos" style="color: #fff; text-decoration: none;">Contacto</a></li>
          <li><a href="FAQ.php" style="color: #fff; text-decoration: none;">Preguntas Frecuentes</a></li>
          <li><a href="#" style="color: #fff; text-decoration: none;">Testimonios</a></li>
        </ul>
      </nav>
    </div>
    <div style="display: flex; align-items: center; gap: 12px;">
      <input type="text" placeholder="Buscar productos..." style="padding: 5px 10px; border-radius: 3px; border: none;">
      <button style="background: #666; color: #fff; border: none; padding: 5px 12px; border-radius: 3px; cursor: pointer;">Buscar</button>
      <div class="carrito" onclick="verCarrito()">
      <span class="carrito-icono">🛒</span>
      <span class="contador" id="contador-carrito">0</span>
    </div>
  </div>
</header>



    

  <main>
<h1 style="text-align:center;">Tienda - Papeleria</h1>

  <!-- BANNER DE FOTOS INTERCAMBIABLES CON FLECHAS -->
  <div class="photo-banner-container" style="max-width: 820px; margin: 0 auto 30px auto; position: relative;">
    <img id="photo-banner-img" src="https://www.suescun.com.co/wp-content/uploads/2022/06/ofertas-de-papeleria-movil.jpg" alt="Banner 1" style="width: 100%; height: 380px; object-fit: cover; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.15);">
    <button id="photo-banner-prev" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); background: rgba(0,0,0,0.4); color: #fff; border: none; border-radius: 50%; width: 38px; height: 38px; font-size: 22px; cursor: pointer;">❮</button>
    <button id="photo-banner-next" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); background: rgba(0,0,0,0.4); color: #fff; border: none; border-radius: 50%; width: 38px; height: 38px; font-size: 22px; cursor: pointer;">❯</button>
  </div>
  <script>
    // Banner de fotos intercambiables
    const photoBannerImages = [
      "https://www.opmpapeleria.com/wp-content/uploads/2018/07/10-descuento-opm.png",
      "https://www.suescun.com.co/wp-content/uploads/2022/06/ofertas-de-papeleria-movil.jpg",
      "https://i.pinimg.com/736x/af/a2/e4/afa2e4c01dfac40ea9a133255fc26427.jpg",
      "https://img.freepik.com/vector-gratis/banner-venta-descuento-estudiantes_23-2150562178.jpg?semt=ais_hybrid&w=740",
    ];
    let photoBannerIndex = 0;
    const photoBannerImg = document.getElementById('photo-banner-img');
    document.getElementById('photo-banner-prev').onclick = function() {
      photoBannerIndex = (photoBannerIndex - 1 + photoBannerImages.length) % photoBannerImages.length;
      photoBannerImg.src = photoBannerImages[photoBannerIndex];
    };
    document.getElementById('photo-banner-next').onclick = function() {
      photoBannerIndex = (photoBannerIndex + 1) % photoBannerImages.length;
      photoBannerImg.src = photoBannerImages[photoBannerIndex];
    };
  </script>

  <!-- BANNER DE IMÁGENES ROTATIVAS -->
  <div class="image-banner-container">
    <div class="image-banner-images">
    </div>
  </div>

  <div class="grid-container">
    <?php foreach ($productos as $p): ?>
        <div class="producto">
            <img src="<?= $p['imagen_url'] ?>" alt="<?= $p['nombre'] ?>">
            <h3><?= $p['nombre'] ?></h3>
            <p><?= $p['descripcion'] ?></p>
            <p><strong>$<?= $p['precio'] ?></strong></p>
            <form method="POST" action="agregar_carrito.php">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <input type="hidden" name="nombre" value="<?= $p['nombre'] ?>">
                <input type="hidden" name="precio" value="<?= $p['precio'] ?>">
                <button>Agregar al carrito</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

  <script>
    // Variables globales
    let cart = [];
    let currentImage = 0;
    let currentBanner = 0;
    const images = document.querySelectorAll('.carousel-images img');
    const banners = document.querySelectorAll('.image-banner-images .banner-item');

    // Función para cambiar imágenes del carrusel
    function changeImage(direction) {
      images[currentImage].classList.remove('active');
      currentImage = (currentImage + direction + images.length) % images.length;
      images[currentImage].classList.add('active');
    }

    // Función para cambiar banners
    function changeBanner(direction) {
      banners[currentBanner].classList.remove('active');
      currentBanner = (currentBanner + direction + banners.length) % banners.length;
      banners[currentBanner].classList.add('active');
    }

    // Inicializa el contador del carrito al cargar la página
    function actualizarContadorCarrito() {
      let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
      document.getElementById('contador-carrito').textContent = carrito.length;
    }
    actualizarContadorCarrito();

    // Agregar producto al carrito
    function agregarAlCarrito(nombre, precio) {
      const boton = event.target;
      const productoDiv = boton.closest('.producto, .banner-item, .producto-banner-item');
      const img = productoDiv ? productoDiv.querySelector('img') : null;
      const imagen = img ? img.src : '';
      let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
      carrito.push({ nombre, precio, imagen });
      localStorage.setItem('carrito', JSON.stringify(carrito));
      actualizarContadorCarrito();
      alert(`Agregado: ${nombre} - $${precio}`);
    }

    // Ir al carrito
    function verCarrito() {
      window.location.href = "carrito.php";
    }


    // Event listeners
    document.getElementById("cart-link").addEventListener('click', function(e) {
      e.preventDefault();
      const sidebar = document.getElementById("cart-sidebar");
      sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
    });

    // Mantener el sidebar visible al hacer hover
    document.getElementById("cart-sidebar").addEventListener('mouseenter', function() {
      this.style.display = 'block';
    });

    document.getElementById("cart-sidebar").addEventListener('mouseleave', function() {
      this.style.display = 'none';
    });

    // Estilo para notificaciones
    const style = document.createElement('style');
    style.textContent = `
      .notification {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #27ae60;
        color: white;
        padding: 15px 25px;
        border-radius: 5px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 1001;
      }
      .notification.show {
        opacity: 1;
      }
    `;
    document.head.appendChild(style);
  </script>

</body>
</html>

<footer style="background: #232629; color: #fff; padding: 40px 0 15px 0; font-size: 15px; margin-top: 0;">
  <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">
    <div style="flex: 1; min-width: 220px;">
      <h4 style="margin-bottom: 10px;">Políticas y Devoluciones</h4>
      <ul style="list-style: disc; margin-left: 18px;">
        <li>Todos los productos cuentan con garantía de satisfacción.</li>
        <li>Las devoluciones pueden solicitarse dentro de los primeros 7 días naturales después de la compra.</li>
        <li>El producto debe estar en perfectas condiciones y con su empaque original.</li>
        <li>Para iniciar un proceso de devolución, contáctanos por el formulario o WhatsApp.</li>
      </ul>
    </div>
    <div style="flex: 1; min-width: 220px;">
      <h4 style="margin-bottom: 10px;">Métodos de Pago</h4>
      <ul style="list-style: disc; margin-left: 18px;">
        <li>Pago en efectivo en campus</li>
        <li>Transferencia bancaria</li>
        <li>Pago con tarjeta de crédito y débito</li>
        <li>Pago en OXXO</li>
      </ul>
    </div>
    <div style="flex: 1; min-width: 220px;">
      <h4 style="margin-bottom: 10px;">Tarjetas Participantes</h4>
      <div style="display: flex; gap: 6px; margin-bottom: 10px;">
        <img src="https://logodownload.org/wp-content/uploads/2016/10/visa-logo-1.png" alt="Visa" style="height: 28px; background: #fff; border-radius: 4px; padding: 2px;">
        <img src="https://logodownload.org/wp-content/uploads/2014/07/mastercard-logo-1.png" alt="Mastercard" style="height: 28px; background: #fff; border-radius: 4px; padding: 2px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1026px-American_Express_logo_%282018%29.svg.png" alt="American Express" style="height: 28px; background: #fff; border-radius: 4px; padding: 2px;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlP251q9GQrAtA9OYZyvxZzeLWg7Zs8PYyzQ&s" alt="OXXO" style="height: 28px; background: #fff; border-radius: 4px; padding: 2px;">
      </div>
      <span style="font-size: 13px;">Aceptamos tarjetas de crédito y débito participantes.</span>
    </div>
  </div>
  <div style="text-align: center; color: #ccc; font-size: 13px; margin-top: 28px;">
    © 2025 Tienda Virtual Instituto Tecnológico de Cancún. Todos los derechos reservados.
  </div>
</footer>