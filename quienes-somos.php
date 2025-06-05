<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44,62,80,0.10);
            padding: 36px 32px;
            position: relative;
        }
        h1 {
            color: #172a7c;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 18px;
        }
        .historia {
            color: #222;
            font-size: 1.15rem;
            margin-bottom: 28px;
            line-height: 1.7;
            text-align: justify;
        }
        .galeria {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            justify-content: center;
            margin-bottom: 18px;
        }
        .galeria img {
            width: 270px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(44,62,80,0.10);
        }
        .volver-link {
            display: block;
            margin: 0 auto;
            margin-top: 18px;
            width: max-content;
            color: #172a7c;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .volver-link:hover {
            text-decoration: underline;
        }
        .editar-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #172a7c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .editar-btn:hover {
            background-color: #0f1d5a;
        }
        .guardar-btn {
            display: none;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        .guardar-btn:hover {
            background-color: #218838;
        }
        textarea {
            width: 100%;
            min-height: 200px;
            font-family: Arial, sans-serif;
            font-size: 1.15rem;
            line-height: 1.7;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <button id="editarBtn" class="editar-btn">Editar</button>
        <button id="guardarBtn" class="guardar-btn">Guardar Cambios</button>
        
        <h1>Quiénes Somos</h1>
        <div class="historia" id="textoHistoria">
            <strong>Tucán Market</strong> es una tienda virtual creada por estudiantes y para estudiantes del Instituto Tecnológico de Cancún. Nuestra historia comienza con la visión de ofrecer productos y servicios de calidad, útiles para la vida académica y cotidiana, en un entorno seguro y amigable.<br><br>
            Desde nuestros inicios, hemos buscado fortalecer la comunidad estudiantil, promoviendo valores como la colaboración, la innovación y el sentido de pertenencia. Nos enorgullece ser parte de la historia del <strong>Instituto Tecnológico de Cancún</strong>, una institución con más de 30 años de excelencia educativa, formando profesionales comprometidos con el desarrollo de la región y del país.<br><br>
            En Tucán Market, creemos que cada estudiante merece acceso a los mejores recursos, por eso trabajamos día a día para mejorar nuestra oferta y brindar una experiencia única. ¡Gracias por ser parte de nuestra comunidad!
        </div>
        <textarea id="editorTexto" style="display: none;"></textarea>
        <div class="galeria">
            <img src="https://www.cancun.tecnm.mx/wp-content/uploads/2024/05/IMG_0292-scaled.jpg" alt="Campus ITCancún 1">
            <img src="https://i0.wp.com/meganews.s3.amazonaws.com/uploads/2019/03/Itc2.jpg?fit=800%2C534&ssl=1" alt="Campus ITCancún 2">
            <img src="https://www.cancun.tecnm.mx/wp-content/uploads/2023/11/slider-Art-7-fracc-XVII-03.jpg" alt="Campus ITCancún 3">
        </div>
        <a href="index.php" class="volver-link">← Volver al inicio</a>
    </div>

    <script>
        const editarBtn = document.getElementById('editarBtn');
        const guardarBtn = document.getElementById('guardarBtn');
        const textoHistoria = document.getElementById('textoHistoria');
        const editorTexto = document.getElementById('editorTexto');

        editarBtn.addEventListener('click', function() {
            // Ocultar el texto y mostrar el editor
            textoHistoria.style.display = 'none';
            editorTexto.style.display = 'block';
            editorTexto.value = textoHistoria.innerHTML;
            
            // Mostrar botón de guardar y ocultar el de editar
            editarBtn.style.display = 'none';
            guardarBtn.style.display = 'block';
        });

        guardarBtn.addEventListener('click', function() {
            // Guardar los cambios y volver a mostrar el texto
            textoHistoria.innerHTML = editorTexto.value;
            textoHistoria.style.display = 'block';
            editorTexto.style.display = 'none';
            
            // Mostrar botón de editar y ocultar el de guardar
            editarBtn.style.display = 'block';
            guardarBtn.style.display = 'none';
            
            // Opcional: Guardar en localStorage para persistencia
            localStorage.setItem('historiaEditada', editorTexto.value);
        });

        // Cargar contenido guardado si existe
        window.addEventListener('DOMContentLoaded', function() {
            const historiaGuardada = localStorage.getItem('historiaEditada');
            if (historiaGuardada) {
                textoHistoria.innerHTML = historiaGuardada;
            }
        });
    </script>
</body>
</html>