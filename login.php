<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            /* Cambia el color de la barra superior a azul fuerte */
            border-top: 8px solid #172a7c; /* Azul fuerte */
        }
        
        h1 {
            color: #172a7c; /* Azul fuerte para el título */
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #172a7c; /* Azul fuerte */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        
        button:hover {
            background-color: #0e1a4d; /* Azul más oscuro al pasar el mouse */
        }
        
        .register-link {
            margin-top: 15px;
            display: block;
            color: #666;
        }
        
        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .hidden {
            display: none;
        }
        
        .error-message {
            color: red;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Formulario de Inicio de Sesión -->
        <div id="login-form">
            <h1>Iniciar Sesión</h1>
            <form id="form-login" action="index.php" method="get">
                <div class="form-group">
                    <label for="login-username">Usuario o Email:</label>
                    <input type="text" id="login-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Contraseña:</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <div id="login-error" class="error-message">Usuario o contraseña incorrectos</div>
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="register-link">
                ¿No tienes una cuenta? <a href="#" id="show-register">Regístrate aquí</a>
            </div>
        </div>
        
        <!-- Formulario de Registro (oculto inicialmente) -->
        <div id="register-form" class="hidden">
            <h1>Registro</h1>
            <form action="#" method="post" onsubmit="return validarRegistro()">
                <div class="form-group">
                    <label for="register-name">Nombre completo:</label>
                    <input type="text" id="register-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email:</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-username">Usuario:</label>
                    <input type="text" id="register-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Contraseña:</label>
                    <input type="password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="register-confirm-password">Confirmar contraseña:</label>
                    <input type="password" id="register-confirm-password" name="confirm-password" required>
                </div>
                <div id="register-error" class="error-message"></div>
                <button type="submit">Registrarse</button>
            </form>
            <div class="register-link">
                ¿Ya tienes una cuenta? <a href="#" id="show-login">Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <script>
        // JavaScript para alternar entre los formularios
        document.getElementById('show-register').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.remove('hidden');
        });
        
        document.getElementById('show-login').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
        });

        // Almacenamiento de usuarios
        let usuariosRegistrados = JSON.parse(localStorage.getItem('usuariosRegistrados')) || [];
        
        // Crear usuario admin si no existe
        if(!usuariosRegistrados.some(u => u.usuario === "admin")) {
            usuariosRegistrados.push({
                nombre: "Administrador",
                email: "admin@tienda.com",
                usuario: "admin",
                password: "12345"
            });
            localStorage.setItem('usuariosRegistrados', JSON.stringify(usuariosRegistrados));
        }

        function validarLogin() {
            const usuarioIngresado = document.getElementById('login-username').value;
            const passIngresado = document.getElementById('login-password').value;
            const errorElement = document.getElementById('login-error');
            
            // Buscar usuario
            const usuarioEncontrado = usuariosRegistrados.find(u => 
                (u.usuario === usuarioIngresado || u.email === usuarioIngresado) && 
                u.password === passIngresado
            );
            
            if(usuarioEncontrado) {
                localStorage.setItem('usuarioLogueado', JSON.stringify({
                    nombre: usuarioEncontrado.nombre,
                    usuario: usuarioEncontrado.usuario,
                    email: usuarioEncontrado.email
                }));
                localStorage.setItem("isLoggedIn", "true");
                errorElement.style.display = 'none';
                return true;
            } else {
                errorElement.style.display = 'block';
                return false;
            }
        }

        function validarRegistro() {
            const nombre = document.getElementById('register-name').value;
            const email = document.getElementById('register-email').value;
            const usuario = document.getElementById('register-username').value;
            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('register-confirm-password').value;
            const errorElement = document.getElementById('register-error');
            
            // Validaciones
            if(password !== confirmPassword) {
                errorElement.textContent = "Las contraseñas no coinciden";
                errorElement.style.display = 'block';
                return false;
            }
            
            if(usuariosRegistrados.some(u => u.usuario === usuario)) {
                errorElement.textContent = "El nombre de usuario ya existe";
                errorElement.style.display = 'block';
                return false;
            }
            
            if(usuariosRegistrados.some(u => u.email === email)) {
                errorElement.textContent = "El email ya está registrado";
                errorElement.style.display = 'block';
                return false;
            }
            
            // Registrar nuevo usuario
            const nuevoUsuario = {
                nombre: nombre,
                email: email,
                usuario: usuario,
                password: password
            };
            
            usuariosRegistrados.push(nuevoUsuario);
            localStorage.setItem('usuariosRegistrados', JSON.stringify(usuariosRegistrados));
            
            // Mostrar mensaje y cambiar a login
            alert("¡Registro exitoso! Ahora puedes iniciar sesión.");
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
            
            // Limpiar formulario de registro
            document.getElementById('register-name').value = '';
            document.getElementById('register-email').value = '';
            document.getElementById('register-username').value = '';
            document.getElementById('register-password').value = '';
            document.getElementById('register-confirm-password').value = '';
            errorElement.style.display = 'none';
            
            return false;
        }

        // Manejar el submit del login correctamente
        document.getElementById("form-login").addEventListener("submit", function (e) {
            e.preventDefault();
            if (validarLogin()) {
                window.location.href = "index.php";
            }
        });
    </script>
</body>
</html>