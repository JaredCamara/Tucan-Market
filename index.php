<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tucan Market  </title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; padding-top: 80px; background-color: #f9f9f9; }
    body.modo-oscuro { background-color: #181818 !important; color: #f1f1f1 !important; }
    body.modo-oscuro .menu-superior,
    body.modo-oscuro .banner-item,
    body.modo-oscuro .producto,
    body.modo-oscuro .producto-banner-item,
    body.modo-oscuro .carrera-item { background-color: lch(28.19% 78.17 298.94) !important; color: #f1f1f1 !important; border-color: #444 !important; }
    body.modo-oscuro .banner,
    body.modo-oscuro main,
    body.modo-oscuro section { background-color: #181818 !important; color: #f1f1f1 !important; }
    body.modo-oscuro button,
    body.modo-oscuro .barra-busqueda button { background-color: #444 !important; color: #fff !important; }
    body.modo-oscuro button:hover,
    body.modo-oscuro .barra-busqueda button:hover { background-color: #666 !important; }
    body.modo-oscuro input,
    body.modo-oscuro .barra-busqueda input { background-color: #222 !important; color: #fff !important; border: 1px solid #444 !important; }

    .menu-superior {
      position: fixed; top: 0; width: 100%; background-color: #070ea1be; color: white; z-index: 1000;
      display: flex; justify-content: space-between; align-items: center; padding: 15px 30px;
    }
    .menu-superior .logo {
      margin-left: 0; /* Asegura que esté pegado a la izquierda */
      display: flex;
      align-items: center;
    }
    .menu-superior .logo img {
      height: 80px;
      border-radius: 18px; /* Bordes redondeados */
      margin-left: -10px; /* Mueve el logo más a la izquierda */
    }
    .menu-superior nav ul {
      list-style: none;
      display: flex;
      gap: 35px;
    }
    .menu-superior nav ul li.testimonios-link {
      margin-left: -30px; /* Mueve el botón de testimonios a la izquierda */
    }
    .menu-superior nav ul li a {
      color: white; text-decoration: none; font-weight: bold; font-size: 20px; transition: color 0.2s;
    }
    .menu-superior nav ul li a:hover { color: #25d366; }
    .barra-busqueda { display: flex; align-items: center; gap: 10px; }
    .barra-busqueda input {
      padding: 8px; border: none; border-radius: 4px; font-size: 16px; width: 250px;
    }
    .barra-busqueda button {
      padding: 8px 12px; background-color: #555; color: white; border: none; border-radius: 4px; cursor: pointer;
    }
    .barra-busqueda button:hover { background-color: #777; }
    .carrito { display: flex; align-items: center; gap: 10px; color: white; font-size: 18px; cursor: pointer; }
    .carrito-icono { font-size: 24px; }
    .contador {
      background-color: red; color: white; border-radius: 50%; padding: 5px 10px; font-size: 14px; font-weight: bold;
    }

    .banner { width: 100%; height: 500px; overflow: hidden; position: relative; }
    .banner img {
      width: 100%; height: 100%; object-fit: cover; position: absolute; opacity: 0; transition: opacity 1s ease-in-out;
    }
    .banner img.active { opacity: 1; }

    main { padding: 20px; text-align: center; }
    h2 { margin: 15px 0; }

    .productos { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 10px; margin-top: 10px; justify-items: center; }
    .producto {
      border: 1px solid #ddd; padding: 20px; width: 300px; border-radius: 5px; background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;
      text-align: center;
    }
    .producto:hover { transform: scale(1.05); }
    .producto img { width: 100%; height: auto; max-height: 150px; object-fit: contain; margin-bottom: 10px; }
    button { margin-top: 10px; padding: 8px 12px; background-color: #333; color: white; border: none; border-radius: 4px; cursor: pointer; }
    button:hover { background-color: #555; }

    .promociones { margin-top: 50px; text-align: center; }
    .promociones h2 { margin-bottom: 20px; font-size: 24px; color: #333; }
    .promociones-banner {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 20px; margin-top: 20px; justify-items: center;
    }
    .banner-item {
      position: relative; width: 100%; max-width: 500px; height: 300px; overflow: hidden; border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;
    }
    .banner-item img { width: 100%; height: 100%; object-fit: contain; transition: transform 0.3s ease; }
    .banner-item:hover img { transform: scale(1.1); }
    .banner-item button {
      position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%);
      padding: 10px 15px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer; opacity: 0; transition: opacity 0.3s ease;
    }
    .banner-item:hover button { opacity: 1; }
    .banner-item button:hover { background-color: #555; }

    .banner-productos { margin-top: 30px; text-align: center; }
    .banner-productos-container {
      position: relative; width: 100%; max-width: 600px; margin: 0 auto; overflow: hidden;
    }
    .producto-banner-item {
      text-align: center; padding: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;
    }
    .producto-banner-item:hover { transform: scale(1.05); }
    .producto-banner-item img { width: 100%; max-height: 150px; object-fit: contain; margin-bottom: 10px; }
    .producto-banner-item button { margin-top: 10px; padding: 8px 12px; background-color: #333; color: white; border: none; border-radius: 4px; cursor: pointer; }
    .producto-banner-item button:hover { background-color: #555; }

    .banner-productos-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; justify-items: center; padding: 20px;
    }

    .productos-destacados { margin-top: 20px; text-align: center; }
    .productos-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; justify-items: center; padding: 20px;
    }

    /* Categorías Tucán */
    .categorias-tucan { margin: 40px 0 30px 0; text-align: center; }
    .titulo-tucan { font-size: 2rem; font-weight: bold; margin-bottom: 30px; color: #222; }
    .categorias-tucan-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 32px; }
    .categoria-tarjeta {
      background: #fff; border-radius: 18px; box-shadow: 0 2px 12px rgba(44,62,80,0.08); padding: 28px 32px 24px 32px;
      width: 230px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s, transform 0.2s;
    }
    .categoria-tarjeta:hover { box-shadow: 0 6px 24px rgba(44,62,80,0.16); transform: translateY(-6px) scale(1.03); }
    .categoria-icono { background: #f1f5fb; border-radius: 14px; padding: 18px; margin-bottom: 18px; display: flex; align-items: center; justify-content: center; }
    .categoria-icono img { width: 90px; height: 90px; object-fit: contain; }
    .categoria-nombre { font-size: 1.25rem; font-weight: bold; color: #142b6f; margin-bottom: 18px; }
    .categoria-boton {
      background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 12px 0; width: 90%; font-size: 1rem; font-weight: 500; cursor: pointer; transition: background 0.2s;
    }
    .categoria-boton:hover { background: #0e1a4d; }

    /* Redes sociales fijas abajo derecha */
    .redes-sociales-fixed {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: flex;
      flex-direction: column;
      gap: 18px;
      z-index: 3000;
    }
    .redes-sociales-fixed a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 54px;
      height: 54px;
      background: #fff;
      border-radius: 50%;
      box-shadow: 0 2px 8px rgba(0,0,0,0.18);
      transition: box-shadow 0.2s, background 0.2s;
      border: 3px solid transparent;
    }
    .redes-sociales-fixed a img { width: 28px; height: 28px; display: block; }
    .redes-sociales-fixed .icono-whatsapp { border-color: #25d366; }
    .redes-sociales-fixed .icono-facebook { border-color: #1877f3; }
    .redes-sociales-fixed .icono-instagram { border-color: #e1306c; }
    .redes-sociales-fixed .icono-whatsapp:hover { background: #25d36622; }
    .redes-sociales-fixed .icono-facebook:hover { background: #1877f322; }
    .redes-sociales-fixed .icono-instagram:hover { background: #e1306c22; }

    #modo-oscuro-btn {
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 2000;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 25px;
      padding: 12px 22px;
      font-size: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      cursor: pointer;
      transition: background 0.2s;
    }
    #modo-oscuro-btn:hover { background-color: #555; }
  </style>
</head>
<body>

<script>
    // Redirigir a login si no está logueado
    if (localStorage.getItem("isLoggedIn") !== "true") {
        window.location.href = "login.php";
    }
</script>

  <!-- MENU SUPERIOR -->
  <div class="menu-superior" style="background: #172a7c; color: #fff; padding: 0;">
    <div class="logo" style="display: flex; align-items: center; margin-left: 32px;">
      <img src="https://media.licdn.com/dms/image/v2/D4E0BAQGzyLtzNxAmVQ/company-logo_200_200/company-logo_200_200/0/1706325237530/instituto_tecnologico_de_cancn_logo?e=2147483647&v=beta&t=lTklKP8Ih95EBR21RQvI1lgtFT0OKJJIfJZuHsY92aI" alt="Logo Tienda Virtual" style="height: 48px; margin-right: 32px; border-radius: 12px;">
    </div>
    <nav style="flex:1;">
      <ul style="display: flex; gap: 38px; list-style: none; margin: 0; padding: 0; justify-content: center;">
        <li><a href="admin-panel/loginad.php" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 16px;">Panel Admin</a></li>
        <li><a href="quienes-somos.php" style="color: #fff; text-decoration: none; font-size: 16px;">Quiénes Somos</a></li>
        <li><a href="#contacto" style="color: #fff; text-decoration: none; font-size: 16px;">Contacto</a></li>
        <li><a href="FAQ.php" style="color: #fff; text-decoration: none; font-size: 16px;">FAQ</a></li>
        <li class="testimonios-link" style="margin-left: 0;"><a href="#testimonios-link" style="color: #fff; text-decoration: none; font-size: 16px;">Testimonios</a></li>
      </ul>
    </nav>
    <div class="barra-busqueda" style="display: flex; align-items: center; gap: 18px; margin-right: 32px;">
      <input type="text" placeholder="Buscar productos..." id="busqueda" onkeydown="if(event.key==='Enter'){buscarProducto();return false;}" style="padding: 5px 10px; border-radius: 3px; border: none; font-size: 15px;">
      <button onclick="buscarProducto()" style="background: #666; color: #fff; border: none; padding: 5px 12px; border-radius: 3px; cursor: pointer; font-size: 15px;">Buscar</button>
      <span id="nombre-usuario" style="font-weight:bold; cursor:pointer; text-decoration:underline; font-size:15px;"></span>
      <button id="cerrar-sesion-btn" style="background:#e74c3c; color:#fff; border:none; border-radius:4px; padding:7px 12px; cursor:pointer; font-size:14px; display:none;">Cerrar sesión</button>
      <div class="carrito" onclick="verCarrito()">
        <span class="carrito-icono" style="font-size:20px;">🛒</span>
        <span class="contador" id="contador-carrito" style="font-size:13px;">0</span>
      </div>
    </div>
  </div>

  <!-- BANNER DESLIZANTE -->
  <div class="banner">
    <img src="https://www.cancun.tecnm.mx/wp-content/uploads/2024/05/IMG_0292-scaled.jpg" alt="Banner 1" class="active">
    <img src="https://www.cancun.tecnm.mx/wp-content/uploads/2023/11/slider-Art-7-fracc-XVII-03.jpg" alt="Banner 2">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuh-pJRjM8-y38NZwvK3tO8Dv8B8ge5Bj2kWJYbejf2GYFEkYYhk7HrTZpkvXy1F86iNY&usqp=CAU" alt="Banner 3">
  </div>

<!-- CATEGORÍAS TUCÁN (SECCIÓN REEMPLAZADA) -->
    <section class="categorias-tucan">
      <h2 class="titulo-tucan" style="text-align:center; margin-bottom: 30px; color: #222; font-size: 2rem; font-weight: bold;">
        Tu Quieres ser tucan, que esperas?
      </h2>
      <div class="categorias-tucan-grid">
        <div class="categoria-tarjeta">
          <div class="categoria-icono">
            <img src="https://cdn-icons-png.flaticon.com/512/892/892458.png" alt="Ropa">
          </div>
          <div class="categoria-nombre">Ropa</div>
          <button class="categoria-boton" onclick="window.location.href='ropa.php'">Ver productos</button>
        </div>
        <div class="categoria-tarjeta">
          <div class="categoria-icono">
            <img src="https://cdn-icons-png.flaticon.com/512/9906/9906556.png" alt="Tecnología">
          </div>
          <div class="categoria-nombre">Tecnología</div>
          <button class="categoria-boton" onclick="window.location.href='tecnologia.php'">Ver productos</button>
        </div>
        <div class="categoria-tarjeta">
          <div class="categoria-icono">
            <img src="https://cdn-icons-png.flaticon.com/512/860/860895.png" alt="Calzado">
          </div>
          <div class="categoria-nombre">Calzado</div>
          <button class="categoria-boton" onclick="window.location.href='calzado.php'">Ver productos</button>
        </div>
        <div class="categoria-tarjeta">
          <div class="categoria-icono">
            <img src="https://cdn-icons-png.flaticon.com/512/1146/1146869.png" alt="Papelería">
          </div>
          <div class="categoria-nombre">Papelería</div>
          <button class="categoria-boton" onclick="window.location.href='papeleria.php'">Ver productos</button>
        </div>
      </div>
    </section>  

  <!-- PRODUCTOS DESTACADOS -->
  <h2 style="text-align: center; margin: 40px 0 40px 0; font-size: 2rem; font-weight: bold; color: #222;">
      Sé más tucán que nunca
  </h2>
  <section class="productos-destacados">
    <div class="productos-grid">
      <div class="producto">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt6JApPWhRl-U53kLBH91CY8JMKVR-Gr1iq00u0ILOQnJ-8CnCuaR3XAOCCy7Hh5RYJwQ&usqp=CAU" alt="Taza Tucan Classica">
        <p>Taza Tucan Classica</p>
        <p>$149.99</p>
      </div>
      <div class="producto">
        <img src="https://tecmonterreymx.vtexassets.com/arquivos/ids/184676/image-3b73003b4ba2420290491496f0a615d1.jpg?v=638387724001200000" alt="Gorra Tec Azul Unisex">
        <p>Gorra Tec Azul Unisex</p>
        <p>$449.99</p>
      </div>
      <div class="producto">
        <img src="https://tecmonterreymx.vtexassets.com/arquivos/ids/187109/image-03a39f16ce104a679c86df3acfb7dba1.jpg?v=638494925619030000" alt="Termo metalico Tec de un litro">
        <p>Termo metalico Tec de un litro</p>
        <p>$349.99</p>
      </div>
      <div class="producto">
        <img src="https://papeleriacrisol.com.mx/941-home_default/lapicero-tecnico-mars-steadtler-mina-de-2mm.jpg" alt="Lapicero punta fina Azul">
        <p>Lapicero punta fina Azul</p>
        <p>$12.99</p>
      </div>
      <div class="producto">
        <img src="https://tecmonterreymx.vtexassets.com/arquivos/ids/177972/image-470edb8a78744802b0cc71c61ca7333f.jpg?v=638158795802000000" alt="Playera tecnm azul dama">
        <p>Playera tecnm azul dama</p>
        <p>$349.99</p>
      </div>
    </div>
  </section>

  <!-- CATÁLOGO DE PRODUCTOS -->
  <main>
    <h2>Los más vendidos</h2>
    <div class="productos">
      <div class="producto">
        <img src="https://tecmonterreymx.vtexassets.com/arquivos/ids/169449/Playera-casual-TEC-CM-azul_1.jpg?v=637777344059800000" alt="Playera Tecnm Clásica">
        <p>Playera Tecnm Clásica</p>
        <p>$349.99</p>
      </div>
      <div class="producto">
        <img src="https://m.media-amazon.com/images/I/514sIIlrxEL._AC_UY1000_.jpg" alt="Gorra Yankees Blanca">
        <p>Gorra Yankees Blanca</p>
        <p>$399.99</p>
      </div>
      <div class="producto">
        <img src="https://http2.mlstatic.com/D_NQ_NP_686713-MLM69805822156_062023-O-audifonos-inalambricos-bluetooth-touch-free-sky.webp" alt="Audífonos inalámbricos Sky">
        <p>Audífonos inalámbricos Sky</p>
        <p>$499.99</p>
      </div>
      <div class="producto">
        <img src="https://m.media-amazon.com/images/I/71HtIFEr0GL.jpg" alt="Reloj Smart Watch Oiris">
        <p>Reloj Smart Watch Oiris</p>
        <p>$899.99</p>
      </div>
      <div class="producto">
        <img src="https://www.officedepot.com.mx/medias/7339-2.jpg-1200ftw?context=bWFzdGVyfHJvb3R8MTM4MTY0fGltYWdlL2pwZWd8YURFMUwyaGpNQzh4TURBek9UazFNemMxTWpBNU5DNXFjR2N8NTYzZGVhMTE2MDYzOWRkMTc5YzI4ZTY1NTMwYWIzNTg3NDgwYjdhNWYxMGEzNzNiZmZiMTFiMmUwZjBjOTgwZQ" alt="Pegamento Pritt Chico">
        <p>Pegamento Pritt Chico</p>
        <p>$25.99</p>
      </div>
    </div>

    <h2 style="text-align: center; margin: 40px 0 40px 0; font-size: 2rem; font-weight: bold; color: #222;">
      
    </h2>

    <!-- NUEVO BLOQUE: INFORMACIÓN DEL CAMPUS -->
    <div style="background: #eaf6ff; padding: 40px 0;">
      <div style="max-width: 900px; margin: 0 auto; display: flex; align-items: center; background: #fff; border-radius: 20px; box-shadow: 0 4px 18px rgba(44,62,80,0.10); overflow: hidden;">
        <img src="https://i0.wp.com/meganews.s3.amazonaws.com/uploads/2019/03/Itc2.jpg?fit=800%2C534&ssl=1" alt="Campus ITCancún" style="width: 340px; height: 200px; object-fit: cover; border-radius: 10px; margin: 20px;">
        <div style="padding: 20px 30px; text-align: left;">
          <h2 style="color: #172a7c; font-size: 2rem; margin-bottom: 10px;">Nuestro Campus</h2>
          <p style="color: #222; font-size: 1rem; margin-bottom: 18px; max-width: 500px;">
            El Campus del Instituto Tecnológico de Cancún es un espacio moderno y equipado para impulsar la educación superior, la innovación y el desarrollo profesional de nuestros estudiantes. Aquí encontrarás laboratorios, áreas verdes y un ambiente ideal para tu formación académica.
          </p>
          <button style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 28px; font-size: 1rem; font-weight: 500; cursor: pointer;" onclick="window.location.href='https://www.cancun.tecnm.mx/'">
            Conocer más
          </button>
        </div>
      </div>
    </div>

    <div style="margin-top: 30px; text-align: center;">
      <img src="https://aulacm.com/wp-content/uploads/2018/01/banner-gastos-envio-gratis.jpg" alt="Imagen amplia" style="width: 80%; height: auto;">
    </div>

    <!-- NUEVO BLOQUE: OFERTAS EDUCATIVAS -->
    <section style="background: #f2f9ff; padding: 40px 0;">
      <h2 style="text-align: center; color: #172a7c; font-size: 1.4rem; font-weight: bold; margin-bottom: 30px;">
        Ofertas Educativas
      </h2>
      <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 32px;">
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 220px; display: flex; flex-direction: column; align-items: center; padding: 24px 18px 18px 18px;">
          <img src="https://www.tuproyectodevida.pe/wp-content/uploads/2023/04/especialidades-ingenieria-industrial.jpg" alt="Ingeniería Industrial" style="width: 100%; height: 120px; object-fit: cover; border-radius: 10px; margin-bottom: 18px;">
          <div style="font-weight: bold; color: #172a7c; margin-bottom: 12px;">Ingeniería Civil</div>
          <button style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 0; width: 100%; font-size: 1rem; font-weight: 500; cursor: pointer;" onclick="window.location.href='https://www.cancun.tecnm.mx/oferta/licenciatura/ingenieria-civil/'">Yo quiero entrar</button>
        </div>
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 220px; display: flex; flex-direction: column; align-items: center; padding: 24px 18px 18px 18px;">
          <img src="https://worldcampus.saintleo.edu/img/article/estudiar-ingenieria-en-sistemas-cuales-son-los-retos-de-ser-ingeniero-en-sistemas.webp" alt="Psicología" style="width: 100%; height: 120px; object-fit: cover; border-radius: 10px; margin-bottom: 18px;">
          <div style="font-weight: bold; color: #172a7c; margin-bottom: 12px;">Ingeniería en Sistemas</div>
          <button style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 0; width: 100%; font-size: 1rem; font-weight: 500; cursor: pointer;" onclick="window.location.href='https://www.cancun.tecnm.mx/oferta/licenciatura/ingenieria-en-sistemas-computacionales/'">Yo quiero entrar</button>
        </div>
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 220px; display: flex; flex-direction: column; align-items: center; padding: 24px 18px 18px 18px;">
          <img src="https://www.anahuac.mx/blog/sites/default/files/articles/1_8.jpg" alt="Administración de Empresas" style="width: 100%; height: 120px; object-fit: cover; border-radius: 10px; margin-bottom: 18px;">
          <div style="font-weight: bold; color: #172a7c; margin-bottom: 12px;">Administración de Empresas</div>
          <button style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 0; width: 100%; font-size: 1rem; font-weight: 500; cursor: pointer;" onclick="window.location.href='https://www.cancun.tecnm.mx/oferta/licenciatura/ingenieria-en-administracion/'">Yo quiero entrar</button>
        </div>
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 220px; display: flex; flex-direction: column; align-items: center; padding: 24px 18px 18px 18px;">
          <img src="https://admision.uautonoma.cl/content/uploads/2023/07/arquitectura-1200x720.jpg" alt="Medicina" style="width: 100%; height: 120px; object-fit: cover; border-radius: 10px; margin-bottom: 18px;">
          <div style="font-weight: bold; color: #172a7c; margin-bottom: 12px;">Arquitectura</div>
          <button style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 0; width: 100%; font-size: 1rem; font-weight: 500; cursor: pointer;" onclick="window.location.href='https://www.cancun.tecnm.mx/oferta-arquitectura/'">Yo quiero entrar</button>
        </div>
      </div>
    </section>

    <!-- NUEVO BLOQUE: TESTIMONIOS DE ESTUDIANTES -->
    <section id="testimonios-link" style="background: #e6eeff; padding: 50px 0;">
      <h2 style="text-align: center; color: #172a7c; font-size: 1.4rem; font-weight: bold; margin-bottom: 30px;">
        Testimonios de Estudiantes
      </h2>
      <div style="display: flex; justify-content: center; gap: 48px; flex-wrap: wrap;">
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 320px; display: flex; flex-direction: column; align-items: center; padding: 30px 18px 22px 18px;">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Carlos Méndez" style="width: 70px; height: 70px; border-radius: 50%; margin-bottom: 16px; object-fit: cover;">
          <div style="font-size: 1rem; color: #222; font-style: italic; margin-bottom: 12px;">
            "Gracias al Tec, conseguí mi primer empleo en una gran empresa. ¡Recomiendo mucho esta universidad!"
          </div>
          <div style="font-weight: bold; color: #172a7c;">Carlos Méndez</div>
        </div>
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); width: 320px; display: flex; flex-direction: column; align-items: center; padding: 30px 18px 22px 18px;">
          <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Ana López" style="width: 70px; height: 70px; border-radius: 50%; margin-bottom: 16px; object-fit: cover;">
          <div style="font-size: 1rem; color: #222; font-style: italic; margin-bottom: 12px;">
            "Las instalaciones y los profesores son excelentes. Me siento preparada para el futuro."
          </div>
          <div style="font-weight: bold; color: #172a7c;">Ana López</div>
        </div>
      </div>
    </section>

    <!-- Preguntas Frecuentes -->
    <section style="background: #fff; padding: 50px 0;">
      <div style="max-width: 600px; margin: 0 auto; background: #f7fbff; border-radius: 18px; box-shadow: 0 2px 12px rgba(44,62,80,0.08); padding: 32px 24px;">
        <h2 style="text-align: center; color: #172a7c; font-size: 1.2rem; font-weight: bold; margin-bottom: 24px;">
          Preguntas Frecuentes
        </h2>
        <div style="margin-bottom: 12px; background: #e6eeff; border-radius: 8px; padding: 12px 18px; color: #172a7c; font-weight: 500;">
          ¿Cómo me inscribo?
        </div>
        <div style="margin-bottom: 12px; background: #e6eeff; border-radius: 8px; padding: 12px 18px; color: #172a7c; font-weight: 500;">
          ¿Hay becas disponibles?
        </div>
      </div>
    </section>

    <!-- Contáctanos -->
    <section style="background: #f2f9ff; padding: 50px 0;">
      <div style="max-width: 400px; margin: 0 auto;">
        <h2 style="text-align: center; color: #172a7c; font-size: 1.2rem; font-weight: bold; margin-bottom: 24px;">
          Contáctanos
        </h2>
        <form style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(44,62,80,0.10); padding: 28px 22px; display: flex; flex-direction: column; gap: 14px;">
          <input type="text" placeholder="Nombre" style="padding: 10px; border-radius: 6px; border: 1px solid #cfd8dc;">
          <input type="email" placeholder="Correo electrónico" style="padding: 10px; border-radius: 6px; border: 1px solid #cfd8dc;">
          <textarea placeholder="Mensaje" rows="3" style="padding: 10px; border-radius: 6px; border: 1px solid #cfd8dc;"></textarea>
          <button type="submit" style="background: #172a7c; color: #fff; border: none; border-radius: 8px; padding: 10px 0; width: 100%; font-size: 1rem; font-weight: 500; cursor: pointer;">Enviar</button>
        </form>
      </div>
    </section>
  </main>

  <!-- Redes sociales fijas en la parte inferior derecha -->
  <div class="redes-sociales-fixed">
    <a href="https://wa.me/5219999999999" target="_blank" class="icono-whatsapp" title="WhatsApp">
      <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/whatsapp.svg" alt="WhatsApp">
    </a>
    <a href="https://facebook.com/" target="_blank" class="icono-facebook" title="Facebook">
      <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook">
    </a>
    <a href="https://instagram.com/" target="_blank" class="icono-instagram" title="Instagram">
      <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram">
    </a>
  </div>

  <!-- Botón de modo oscuro en la parte inferior izquierda -->
  <button id="modo-oscuro-btn" onclick="toggleModoOscuro()">Modo oscuro</button>

  <!-- Agrega este banner justo después de la sección de "Contáctanos" y antes del cierre de </body> -->

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
    © 2025 Tucan Market Instituto Tecnológico de Cancún. Todos los derechos reservados.
  </div>
</footer>

  <script>
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

    // Buscar productos en todas las secciones relevantes
    function buscarProducto() {
      const texto = document.getElementById('busqueda').value.trim().toLowerCase();

      // Mostrar todo si la búsqueda está vacía
      if (!texto) {
        document.querySelectorAll('.producto, .banner-item, .producto-banner-item').forEach(el => {
          el.style.display = '';
        });
        // Mostrar todas las categorías si existen
        document.querySelectorAll('.categoria-tarjeta').forEach(el => {
          el.style.display = '';
        });
        return;
      }

      // Oculta todos los productos/categorías por defecto
      document.querySelectorAll('.producto, .banner-item, .producto-banner-item, .categoria-tarjeta').forEach(el => {
        el.style.display = 'none';
      });

      // Busca en productos generales
      document.querySelectorAll('.producto').forEach(prod => {
        const nombre = prod.querySelector('p, h3') ? prod.querySelector('p, h3').textContent.toLowerCase() : '';
        if (nombre.includes(texto)) prod.style.display = '';
      });

      // Busca en promociones/banner-item
      document.querySelectorAll('.banner-item').forEach(item => {
        const alt = item.querySelector('img') ? item.querySelector('img').alt.toLowerCase() : '';
        if (alt.includes(texto)) item.style.display = '';
      });

      // Busca en productos tipo banner
      document.querySelectorAll('.producto-banner-item').forEach(prod => {
        const nombre = prod.querySelector('p, h3') ? prod.querySelector('p, h3').textContent.toLowerCase() : '';
        if (nombre.includes(texto)) prod.style.display = '';
      });

      // Busca en categorías (ropa, tecnología, calzado, papelería, servicios)
      document.querySelectorAll('.categoria-tarjeta').forEach(cat => {
        const nombre = cat.querySelector('.categoria-nombre') ? cat.querySelector('.categoria-nombre').textContent.toLowerCase() : '';
        if (nombre.includes(texto)) cat.style.display = '';
      });
    }

    // Ir al carrito
    function verCarrito() {
      window.location.href = "carrito.php";
    }

    // Banner deslizante
    const banners = document.querySelectorAll('.banner img');
    let currentIndex = 0;
    setInterval(() => {
      banners[currentIndex].classList.remove('active');
      currentIndex = (currentIndex + 1) % banners.length;
      banners[currentIndex].classList.add('active');
    }, 3000);

    // Banner de productos con flechas
    let productoActual = 0;
    const productos = document.querySelectorAll('.producto-banner-item');
    function cambiarProducto(direccion) {
      productos[productoActual].classList.remove('active');
      productoActual = (productoActual + direccion + productos.length) % productos.length;
      productos[productoActual].classList.add('active');
    }

    // Carrusel de carreras (si lo tienes)
    let carreraActual = 0;
    const carrerasWrapper = document.querySelector('.carreras-wrapper');
    const carreraItems = document.querySelectorAll('.carrera-item');
    function cambiarCarrera(direccion) {
      carreraActual = (carreraActual + direccion + carreraItems.length) % carreraItems.length;
      const offset = -carreraActual * 100;
      if (carrerasWrapper) {
        carrerasWrapper.style.transform = `translateX(${offset}%)`;
      }
    }
    if (carrerasWrapper) {
      setInterval(() => cambiarCarrera(1), 3000);
    }

    // Modo oscuro
    function toggleModoOscuro() {
      document.body.classList.toggle('modo-oscuro');
      const btn = document.getElementById('modo-oscuro-btn');
      if (document.body.classList.contains('modo-oscuro')) {
        btn.textContent = 'Modo claro';
        localStorage.setItem('modoOscuro', 'true');
      } else {
        btn.textContent = 'Modo oscuro';
        localStorage.setItem('modoOscuro', 'false');
      }
    }
    window.addEventListener('DOMContentLoaded', () => {
      if (localStorage.getItem('modoOscuro') === 'true') {
        document.body.classList.add('modo-oscuro');
        document.getElementById('modo-oscuro-btn').textContent = 'Modo claro';
      }
    });

    // Mostrar nombre de usuario y botón de cerrar sesión
    function mostrarNombreUsuario() {
      const usuario = JSON.parse(localStorage.getItem('usuarioLogueado'));
      const nombreSpan = document.getElementById('nombre-usuario');
      const cerrarBtn = document.getElementById('cerrar-sesion-btn');
      if (usuario && usuario.nombre) {
        nombreSpan.textContent = "Hola, " + usuario.nombre;
        cerrarBtn.style.display = "inline-block";
        // Hacer clic en el nombre redirige al perfil
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
  </script>
</body>
</html>