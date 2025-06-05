<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios - Tucán Market</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7fbff;
      margin: 0;
      padding: 0;
    }
    .servicios-tucan {
      margin: 50px 0 40px 0;
      text-align: center;
      background: #f7fbff;
      padding: 40px 0 30px 0;
    }
    .servicios-titulo {
      font-size: 2rem;
      font-weight: bold;
      color: #172a7c;
      margin-bottom: 32px;
    }
    .servicios-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 28px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 18px;
    }
    .servicio-tarjeta {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(44,62,80,0.10);
      padding: 28px 18px 22px 18px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: box-shadow 0.2s, transform 0.2s;
    }
    .servicio-tarjeta:hover {
      box-shadow: 0 6px 24px rgba(44,62,80,0.16);
      transform: translateY(-6px) scale(1.03);
    }
    .servicio-icono {
      background: #eaf6ff;
      border-radius: 14px;
      padding: 18px;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .servicio-icono img {
      width: 60px;
      height: 60px;
      object-fit: contain;
    }
    .servicio-nombre {
      font-size: 1.15rem;
      font-weight: bold;
      color: #142b6f;
      margin-bottom: 10px;
    }
    .servicio-desc {
      font-size: 0.98rem;
      color: #333;
      margin-bottom: 18px;
      min-height: 48px;
    }
    .servicio-boton {
      background: #172a7c;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 0;
      width: 90%;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s;
    }
    .servicio-boton:hover {
      background: #0e1a4d;
    }
    .servicio-agregar .servicio-boton {
      background: #25d366;
    }
    .servicio-agregar .servicio-boton:hover {
      background: #128c4b;
    }
    @media (max-width: 700px) {
      .servicios-grid {
        grid-template-columns: 1fr;
        gap: 18px;
      }
      .servicio-tarjeta {
        padding: 22px 8px 18px 8px;
      }
    }
  </style>
</head>
<body>
  <section class="servicios-tucan">
    <h2 class="servicios-titulo">Servicios para la comunidad</h2>
    <div class="servicios-grid">
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Asesorías">
        </div>
        <div class="servicio-nombre">Asesorías</div>
        <div class="servicio-desc">Apoyo académico en distintas materias y orientación personalizada.</div>
        <button class="servicio-boton">Solicitar</button>
      </div>
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" alt="Objetos Perdidos">
        </div>
        <div class="servicio-nombre">Objetos Perdidos</div>
        <div class="servicio-desc">Reporta o busca objetos extraviados dentro del campus.</div>
        <button class="servicio-boton">Reportar</button>
      </div>
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/3132/3132693.png" alt="Realización de Tareas">
        </div>
        <div class="servicio-nombre">Realización de Tareas</div>
        <div class="servicio-desc">Ayuda profesional para la elaboración de tareas y proyectos.</div>
        <button class="servicio-boton">Solicitar</button>
      </div>
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Entrega de Pedido">
        </div>
        <div class="servicio-nombre">Entrega de Pedido</div>
        <div class="servicio-desc">Recibe tus compras o pedidos directamente en el campus.</div>
        <button class="servicio-boton">Solicitar</button>
      </div>
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/2991/2991108.png" alt="Impresión de Documentos">
        </div>
        <div class="servicio-nombre">Impresión de Documentos</div>
        <div class="servicio-desc">Servicio rápido de impresión y copias para tus documentos.</div>
        <button class="servicio-boton">Solicitar</button>
      </div>
      <div class="servicio-tarjeta">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="Recargas Electrónicas">
        </div>
        <div class="servicio-nombre">Recargas Electrónicas</div>
        <div class="servicio-desc">Recarga saldo a tu celular o servicios digitales fácilmente.</div>
        <button class="servicio-boton">Solicitar</button>
      </div>
      <!-- Botón para agregar más servicios -->
      <div class="servicio-tarjeta servicio-agregar">
        <div class="servicio-icono">
          <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png" alt="Agregar servicio">
        </div>
        <div class="servicio-nombre">Agregar servicio</div>
        <div class="servicio-desc">¿Tienes una idea? Haz clic aquí para proponer un nuevo servicio.</div>
        <button class="servicio-boton">Agregar</button>
      </div>
    </div>
  </section>
</body>
</html>
