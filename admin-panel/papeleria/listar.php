<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Papelería</title>
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
            max-width: 1200px;
            margin: 0 auto;
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
        
        .header-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        
        .btn:hover {
            background: var(--secondary-color);
        }
        
        .btn-danger {
            background: var(--accent-color);
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .btn-edit {
            background: var(--success-color);
        }
        
        .btn-edit:hover {
            background: #27ae60;
        }
        
        .btn-back {
            background: var(--dark-color);
        }
        
        .btn-back:hover {
            background: #1a252f;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .product-price {
            font-size: 1.1rem;
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .product-actions {
            display: flex;
            gap: 10px;
        }
        
        .no-products {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 8px;
            grid-column: 1 / -1;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-pencil-alt"></i> Lista de Papelería</h2>
            <div class="header-actions">
                <a href="../admin.php" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Regresar
                </a>
                <a href="crear.php" class="btn">
                    <i class="fas fa-plus"></i> Agregar nuevo
                </a>
            </div>
        </div>
        
        <div class="products-grid">
            <?php
            $res = $conn->query("SELECT * FROM papeleria");
            if ($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
            ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($row['imagen_url']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title"><?php echo htmlspecialchars($row['nombre']); ?></h3>
                        <p class="product-price">$<?php echo number_format($row['precio'], 2); ?></p>
                        <div class="product-actions">
                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
            ?>
                <div class="no-products">
                    <i class="fas fa-box-open" style="font-size: 3rem; color: #ccc; margin-bottom: 15px;"></i>
                    <h3>No hay productos de papelería registrados</h3>
                    <p>Comienza agregando un nuevo producto</p>
                    <a href="crear.php" class="btn" style="margin-top: 15px;">
                        <i class="fas fa-plus"></i> Agregar producto
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>