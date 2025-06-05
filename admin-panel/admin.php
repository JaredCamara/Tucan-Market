<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
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
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background: var(--dark-color);
            color: white;
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h2 {
            color: white;
            font-size: 1.5rem;
        }
        
        .sidebar-header p {
            color: var(--light-color);
            font-size: 0.8rem;
            opacity: 0.8;
        }
        
        .nav-menu {
            list-style: none;
            margin-top: 20px;
        }
        
        .nav-menu li {
            margin-bottom: 5px;
        }
        
        .nav-menu a {
            display: block;
            color: var(--light-color);
            text-decoration: none;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .nav-menu a:hover {
            background: rgba(255,255,255,0.1);
            border-left: 3px solid var(--primary-color);
        }
        
        .nav-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .main-content {
            flex: 1;
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
        
        .header h1 {
            color: var(--dark-color);
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .card-icon.blue {
            background: var(--primary-color);
        }
        
        .card-icon.green {
            background: var(--success-color);
        }
        
        .card-icon.red {
            background: var(--accent-color);
        }
        
        .card-icon.orange {
            background: #f39c12;
        }
        
        .card h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .card p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .recent-activity {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .recent-activity h2 {
            margin-bottom: 20px;
            color: var(--dark-color);
        }
        
        .activity-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
        }
        
        .activity-content h4 {
            margin-bottom: 5px;
        }
        
        .activity-content p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .activity-time {
            color: #999;
            font-size: 0.8rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>AdminPanel</h2>
                <p>Panel de administración</p>
            </div>
            <ul class="nav-menu">
                <li><a href="../login.php" onclick="return confirm('¿Estás seguro que deseas cerrar sesión?')"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                <li><a href="../index.php" onclick="return confirm('¿Estás seguro que deseas salir al inicio?')"><i class="fas fa-home"></i> Salir al Inicio</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>Panel de Administración</h1>
                <div class="user-info">
                    <img src="https://via.placeholder.com/40" alt="Usuario">
                    <span>Administrador</span>
                </div>
            </div>

            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-header">
                        <h3>Ropa</h3>
                        <div class="card-icon blue">
                            <i class="fas fa-tshirt"></i>
                        </div>
                    </div>
                    <p>Gestiona productos de ropa</p>
                    <a href="ropa/listar.php">Ver más →</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Tecnología</h3>
                        <div class="card-icon green">
                            <i class="fas fa-laptop"></i>
                        </div>
                    </div>
                    <p>Gestiona productos tecnológicos</p>
                    <a href="tecnologia/listar.php">Ver más →</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Calzado</h3>
                        <div class="card-icon red">
                            <i class="fas fa-shoe-prints"></i>
                        </div>
                    </div>
                    <p>Gestiona productos de calzado</p>
                    <a href="calzado/listar.php">Ver más →</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Papelería</h3>
                        <div class="card-icon orange">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <p>Gestiona productos de papelería</p>
                    <a href="papeleria/listar.php">Ver más →</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>