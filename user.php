<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .perfil-container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto 0 auto;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44,62,80,0.10);
            padding: 32px 28px 28px 28px;
            text-align: center;
            border-top: 8px solid #172a7c;
        }
        .perfil-titulo {
            color: #172a7c;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 18px;
        }
        .perfil-foto {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #172a7c;
            margin-bottom: 18px;
            background: #eaf6ff;
        }
        .perfil-nombre {
            font-size: 1.3rem;
            font-weight: bold;
            color: #222;
            margin-bottom: 8px;
        }
        .perfil-email {
            color: #555;
            margin-bottom: 18px;
        }
        .perfil-usuario {
            color: #888;
            margin-bottom: 18px;
        }
        .perfil-form label {
            display: block;
            margin-bottom: 6px;
            color: #172a7c;
            font-weight: 500;
            text-align: left;
        }
        .perfil-form input[type="file"] {
            margin-bottom: 18px;
        }
        .perfil-form button {
            background: #172a7c;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 0;
            width: 100%;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .perfil-form button:hover {
            background: #0e1a4d;
        }
        .volver-link {
            display: block;
            margin-top: 24px;
            color: #172a7c;
            text-decoration: none;
            font-weight: bold;
        }
        .volver-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <div class="perfil-titulo">Mi Perfil</div>
        <img id="foto-perfil" class="perfil-foto" src="https://ui-avatars.com/api/?name=Usuario&background=eaf6ff&color=172a7c" alt="Foto de perfil">
        <form class="perfil-form" id="form-foto">
            <label for="input-foto">Cambiar foto de perfil:</label>
            <input type="file" id="input-foto" accept="image/*">
            <button type="submit">Guardar Foto</button>
        </form>
        <div class="perfil-nombre" id="perfil-nombre"></div>
        <div class="perfil-email" id="perfil-email"></div>
        <div class="perfil-usuario" id="perfil-usuario"></div>
        <button onclick="window.location.href='index.php'" style="margin-top:18px;background:#172a7c;color:#fff;border:none;border-radius:8px;padding:10px 0;width:100%;font-size:1rem;font-weight:500;cursor:pointer;transition:background 0.2s;">Ir al inicio</button>
    </div>
    <script>
        // Redirigir a login si no está logueado
        if (localStorage.getItem("isLoggedIn") !== "true") {
            window.location.href = "login.html";
        }

        // Mostrar datos del usuario
        const usuario = JSON.parse(localStorage.getItem('usuarioLogueado'));
        if (usuario) {
            document.getElementById('perfil-nombre').textContent = usuario.nombre;
            document.getElementById('perfil-email').textContent = usuario.email;
            document.getElementById('perfil-usuario').textContent = "Usuario: " + usuario.usuario;
        }

        // Cargar foto de perfil si existe
        const fotoGuardada = localStorage.getItem('fotoPerfil_' + (usuario ? usuario.usuario : ''));
        const fotoPerfil = document.getElementById('foto-perfil');
        if (fotoGuardada) {
            fotoPerfil.src = fotoGuardada;
        } else if (usuario && usuario.nombre) {
            fotoPerfil.src = "https://ui-avatars.com/api/?name=" + encodeURIComponent(usuario.nombre) + "&background=eaf6ff&color=172a7c";
        }

        // Guardar nueva foto de perfil
        document.getElementById('form-foto').addEventListener('submit', function(e) {
            e.preventDefault();
            const fileInput = document.getElementById('input-foto');
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    localStorage.setItem('fotoPerfil_' + usuario.usuario, evt.target.result);
                    fotoPerfil.src = evt.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
