<?php
include '../auth.php';
include '../cloudinary.php';
include '../db.php';
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$stmt = $pdo->prepare("SELECT * FROM papeleria WHERE id = :id");
$stmt->execute(['id' => $id]);
$papeleria = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$papeleria) {
    die("Producto no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagen = $papeleria['imagen_url'];
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = subirACloudinary($_FILES['imagen']['tmp_name']);
    }

    $stmt = $pdo->prepare("UPDATE papeleria SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen_url = :imagen WHERE id = :id");
    $stmt->execute([
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'imagen' => $imagen,
        'id' => $id
    ]);

    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto de Papelería</title>
    <style>
        :root {
            --primary-color: #1abc9c;
            --secondary-color: #16a085;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .header h2 {
            color: var(--dark-color);
            font-size: 1.8rem;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            background: var(--secondary-color);
        }
        
        .btn-back {
            background: #95a5a6;
        }
        
        .btn-back:hover {
            background: #7f8c8d;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: var(--primary-color);
            outline: none;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .preview-container {
            margin-top: 15px;
            text-align: center;
        }
        
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .current-image {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .required-field::after {
            content: " *";
            color: var(--accent-color);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-pencil-alt"></i> Editar Producto de Papelería</h2>
            <a href="listar.php" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
        
        <form method="POST" enctype="multipart/form-data" id="productForm">
            <div class="form-group">
                <label for="nombre" class="required-field">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($papeleria['nombre']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"><?= htmlspecialchars($papeleria['descripcion']) ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="precio" class="required-field">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" min="0" value="<?= htmlspecialchars($papeleria['precio']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <div class="current-image">
                    <p>Imagen actual:</p>
                    <img src="<?= htmlspecialchars($papeleria['imagen_url']) ?>" class="image-preview" onerror="this.src='https://via.placeholder.com/200?text=Imagen+no+disponible'">
                </div>
                <input type="file" id="imagen" name="imagen" accept="image/*">
                <div class="preview-container">
                    <p>Vista previa nueva imagen:</p>
                    <img id="imagePreview" class="image-preview" src="#" alt="Vista previa de la nueva imagen" style="display: none;">
                </div>
            </div>
            
            <div class="form-actions">
                <button type="reset" class="btn btn-back">
                    <i class="fas fa-undo"></i> Restablecer
                </button>
                <button type="submit" class="btn">
                    <i class="fas fa-save"></i> Actualizar Producto
                </button>
            </div>
        </form>
    </div>

    <script>
        // Mostrar vista previa de la nueva imagen seleccionada
        document.getElementById('imagen').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Validación básica del formulario
        document.getElementById('productForm').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre').value;
            const precio = document.getElementById('precio').value;
            
            if (!nombre || !precio) {
                e.preventDefault();
                alert('Por favor complete los campos requeridos (*)');
            }
        });
    </script>
</body>
</html>