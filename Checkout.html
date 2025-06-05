<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Tienda Virtual</title>
    <link rel="stylesheet" href="style.css">
    <!-- Material Icons para el carrito -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      .header-dark {
        background: #353535;
        border-bottom: 2px solid #222;
        margin-bottom: 24px;
      }
      .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1400px;
        margin: 0 auto;
        padding: 12px 32px;
      }
      .logo img {
        height: 64px;
        border-radius: 8px;
        background: #fff;
      }
      .menu {
        display: flex;
        gap: 40px;
        list-style: none;
        margin: 0 40px 0 40px;
        padding: 0;
      }
      .menu li a {
        color: #fff;
        font-weight: bold;
        font-size: 1.15em;
        text-decoration: none;
        transition: color 0.2s;
      }
      .menu li a:hover {
        color: #ffd600;
      }
      .search-form {
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .search-form input[type="text"] {
        padding: 8px 12px;
        border-radius: 6px;
        border: none;
        font-size: 1em;
        width: 200px;
      }
      .search-form button {
        padding: 8px 16px;
        border-radius: 6px;
        border: none;
        background: #444;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s;
      }
      .search-form button:hover {
        background: #1976d2;
      }
      .carrito-icono {
        position: relative;
        margin-left: 24px;
      }
      .carrito-contador {
        position: absolute;
        top: -8px;
        right: -12px;
        background: #f00;
        color: #fff;
        border-radius: 50%;
        font-size: 0.95em;
        padding: 2px 8px;
        font-weight: bold;
      }
      .formulario-checkout {
        max-width: 400px;
        margin: 32px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        padding: 32px 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
      }
      .formulario-checkout label {
        font-weight: bold;
        margin-bottom: 4px;
      }
      .formulario-checkout input, .formulario-checkout select {
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 1em;
      }
      .formulario-checkout button {
        padding: 10px 0;
        border-radius: 6px;
        border: none;
        background: #1976d2;
        color: #fff;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        margin-top: 12px;
      }
      .formulario-checkout button:hover {
        background: #145ea8;
      }
      .mensaje-exito {
        text-align: center;
        color: #2d8f2d;
        font-size: 1.2em;
        margin-top: 24px;
        font-weight: bold;
      }
      .metodo-extra {
        margin-top: 10px;
        background: #f5f5f5;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
      }
      .codigo-efectivo {
        font-size: 1.2em;
        font-weight: bold;
        color: #1976d2;
        letter-spacing: 2px;
        margin-top: 8px;
        margin-bottom: 8px;
      }
      @media (max-width: 900px) {
        .header-container {
          flex-direction: column;
          gap: 12px;
          padding: 12px 8px;
        }
        .menu {
          gap: 18px;
          margin: 0;
        }
        .search-form input[type="text"] {
          width: 120px;
        }
      }
      @media (max-width: 600px) {
        .logo img {
          height: 40px;
        }
        .formulario-checkout {
          padding: 16px 8px;
        }
      }
    </style>
</head>
<body>
  <!-- Banner  -->
  <div class="menu-superior" style="background: #172a7c; color: #fff; padding: 0; display: flex; align-items: center; justify-content: space-between; padding: 8px 16px;">
    <div class="logo" style="display: flex; align-items: center; margin-left: 32px;">
      <img src="https://media.licdn.com/dms/image/v2/D4E0BAQGzyLtzNxAmVQ/company-logo_200_200/company-logo_200_200/0/1706325237530/instituto_tecnologico_de_cancn_logo?e=2147483647&v=beta&t=lTklKP8Ih95EBR21RQvI1lgtFT0OKJJIfJZuHsY92aI" alt="Logo Tienda Virtual" style="height: 48px; margin-right: 32px; border-radius: 12px;">
    </div>
    <nav style="flex:1;">
      <ul style="display: flex; gap: 38px; list-style: none; margin: 0; padding: 0; justify-content: center;">
        <li><a href="index.php" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 20px;">Inicio</a></li>
        <li><a href="quienes-somos.php" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 20px;">Quiénes Somos</a></li>
        <li><a href="#contacto" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 20px;">Contacto</a></li>
        <li><a href="FAQ.php" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 20px;">FAQ</a></li>
        <li class="testimonios-link" style="margin-left: 0;"><a href="#testimonios-link" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 20px;">Testimonios</a></li>
      </ul>
    </nav>
    <div class="barra-busqueda" style="display: flex; align-items: center; gap: 18px; margin-right: 32px;">
      <input type="text" placeholder="Buscar productos..." id="busqueda-carrito" onkeydown="if(event.key==='Enter'){buscarProductoCarrito();return false;}" style="padding: 5px 10px; border-radius: 3px; border: none; font-size: 15px;">
      <button onclick="buscarProductoCarrito()" style="background: #666; color: #fff; border: none; padding: 5px 12px; border-radius: 3px; cursor: pointer; font-size: 15px;">Buscar</button>
      <span id="nombre-usuario" style="font-weight:bold; cursor:pointer; text-decoration:underline; font-size:15px;"></span>
      <button id="cerrar-sesion-btn" style="background:#e74c3c; color:#fff; border:none; border-radius:4px; padding:7px 12px; cursor:pointer; font-size:14px; display:none;">Cerrar sesión</button>
      <div class="carrito" onclick="window.location.href='carrito.php'">
        <span class="carrito-icono material-icons" style="font-size:20px;">shopping_cart</span>
        <span class="contador" id="contadorCarrito" style="font-size:13px;">0</span>
      </div>
    </div>
  </div>

    <main>
        <h2>Resumen de tu Pedido</h2>
        <section id="carritoCheckout">
            <!-- Aquí se agregarán los productos dinámicamente con JavaScript -->
        </section>
        <div class="total">
            <h3>Total a Pagar: $<span id="totalPago">0</span></h3>
        </div>

        <!-- Formulario de finalización de pedido (se muestra solo si hay productos) -->
        <form class="formulario-checkout" id="formularioCheckout" style="display:none;">
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" required>
          <label for="apellidos">Apellidos:</label>
          <input type="text" id="apellidos" required>
          <label for="metodoPago">Método de Pago:</label>
          <select id="metodoPago" required onchange="mostrarMetodoPago()">
            <option value="">Selecciona un método</option>
            <option value="tarjeta">Tarjeta de Crédito/Débito</option>
            <option value="transferencia">Transferencia Bancaria</option>
            <option value="efectivo">Pago en Efectivo (OXXO)</option>
          </select>
          <!-- Aquí se mostrarán los campos adicionales según el método -->
          <div id="extraMetodoPago"></div>
          <button type="submit" id="procesarPagoBtn" style="display:none;">Procesar Pago</button>
        </form>
        <div class="mensaje-exito" id="mensajeExito" style="display:none;">
          ¡Pedido realizado con éxito!
        </div>
    </main>
    <script>
      // Actualiza el contador del carrito
      function actualizarContadorCarrito() {
        const contador = document.getElementById('contadorCarrito');
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        contador.textContent = carrito.length;
      }
      actualizarContadorCarrito();

      // Mostrar productos del carrito y formulario si hay productos
      function mostrarCheckout() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const contenedor = document.getElementById('carritoCheckout');
        const totalPago = document.getElementById('totalPago');
        const formulario = document.getElementById('formularioCheckout');
        let total = 0;

        if (carrito.length === 0) {
          contenedor.innerHTML = "<p>No hay productos en el carrito.</p>";
          formulario.style.display = "none";
          totalPago.textContent = "0";
        } else {
          contenedor.innerHTML = carrito.map(prod => `
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
              <img src="${prod.imagen}" alt="${prod.nombre}" style="width:60px;height:60px;object-fit:contain;border-radius:8px;border:1px solid #eee;">
              <span style="flex:1;">${prod.nombre}</span>
              <span style="font-weight:bold;color:#1976d2;">$${parseFloat(prod.precio).toFixed(2)}</span>
            </div>
          `).join('');
          total = carrito.reduce((acc, prod) => acc + parseFloat(prod.precio), 0);
          totalPago.textContent = total.toFixed(2);
          formulario.style.display = "flex";
        }
      }
      mostrarCheckout();

      // Mostrar campos según método de pago
      function mostrarMetodoPago() {
        const metodo = document.getElementById('metodoPago').value;
        const extra = document.getElementById('extraMetodoPago');
        const btn = document.getElementById('procesarPagoBtn');
        extra.innerHTML = '';
        btn.style.display = 'none';

        if (metodo === "tarjeta") {
          extra.innerHTML = `
            <div class="metodo-extra">
              <label for="numTarjeta">Número de Tarjeta:</label>
              <input type="text" id="numTarjeta" maxlength="16" pattern="\\d{16}" required>
              <label for="cvv">CVV:</label>
              <input type="text" id="cvv" maxlength="4" pattern="\\d{3,4}" required>
              <label for="vencimiento">Fecha de Vencimiento:</label>
              <input type="month" id="vencimiento" required>
              <label for="titular">Titular de la Tarjeta:</label>
              <input type="text" id="titular" required>
            </div>
          `;
          btn.style.display = 'block';
        } else if (metodo === "transferencia") {
          // Número de cuenta ficticio
          extra.innerHTML = `
            <div class="metodo-extra">
              <label>Realiza tu transferencia a la siguiente cuenta bancaria:</label>
              <div style="font-weight:bold;color:#1976d2;margin:8px 0;">CLABE: 012345678901234567</div>
              <label>Banco: Banco Ejemplo S.A.</label>
              <label>Una vez realizado el pago, tu pedido será procesado.</label>
            </div>
          `;
          btn.style.display = 'block';
        } else if (metodo === "efectivo") {
          // Generar código OXXO
          const codigo = generarCodigoOXXO();
          extra.innerHTML = `
            <div class="metodo-extra">
              <label>Acude a tu OXXO más cercano y proporciona el siguiente código:</label>
              <div class="codigo-efectivo">${codigo}</div>
              <label>El pago puede tardar hasta 48h en reflejarse.</label>
            </div>
          `;
          btn.style.display = 'block';
        }
      }

      function generarCodigoOXXO() {
        // Genera un código de 14 dígitos aleatorio
        let codigo = '';
        for(let i=0; i<14; i++) {
          codigo += Math.floor(Math.random()*10);
        }
        return codigo;
      }

      // Finalizar pedido
      document.getElementById('formularioCheckout').addEventListener('submit', function(e) {
        e.preventDefault();
        // Validaciones básicas
        const metodo = document.getElementById('metodoPago').value;
        if (!metodo) {
          alert("Selecciona un método de pago.");
          return;
        }
        if (metodo === "tarjeta") {
          // Validar campos de tarjeta
          const numTarjeta = document.getElementById('numTarjeta').value.trim();
          const cvv = document.getElementById('cvv').value.trim();
          const vencimiento = document.getElementById('vencimiento').value.trim();
          const titular = document.getElementById('titular').value.trim();
          if (!numTarjeta || !cvv || !vencimiento || !titular) {
            alert("Completa todos los campos de la tarjeta.");
            return;
          }
        }
        // Guardar pedido (puedes guardar en localStorage o enviar a un backend)
        localStorage.removeItem('carrito');
        document.getElementById('carritoCheckout').innerHTML = "";
        document.getElementById('totalPago').textContent = "0";
        document.getElementById('formularioCheckout').style.display = "none";
        document.getElementById('mensajeExito').style.display = "block";
        actualizarContadorCarrito();
      });

      // Mostrar nombre de usuario y botón de cerrar sesión (igual que en index/carrito)
      function mostrarNombreUsuario() {
        const usuario = JSON.parse(localStorage.getItem('usuarioLogueado'));
        const nombreSpan = document.getElementById('nombre-usuario');
        const cerrarBtn = document.getElementById('cerrar-sesion-btn');
        if (usuario && usuario.nombre) {
          nombreSpan.textContent = "Hola, " + usuario.nombre;
          cerrarBtn.style.display = "inline-block";
          nombreSpan.onclick = function() {
            window.location.href = "user.php";
          };
        } else {
          nombreSpan.textContent = "";
          cerrarBtn.style.display = "none";
          nombreSpan.onclick = null;
        }
      }
      mostrarNombreUsuario();

      document.getElementById('cerrar-sesion-btn').onclick = function() {
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('usuarioLogueado');
        window.location.href = "login.php";
      };

      // Buscar productos en el checkout (opcional: solo oculta productos del resumen)
      function buscarProductoCheckout() {
        const termino = document.getElementById("busqueda-checkout").value.toLowerCase();
        document.querySelectorAll("#carritoCheckout > div").forEach(producto => {
          const texto = producto.textContent.toLowerCase();
          producto.style.display = texto.includes(termino) ? "flex" : "none";
        });
      }
    </script>
</body>
</html>
