<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['rol_id'] !== 5) {
    
    header('Location: index.php');
    exit;

}

#echo "Bienvenido al panel de administración.";
#echo '<a href="logout.php">Cerrar sesión</a>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Super Administrador</title>
    <link rel="stylesheet" type="text/css" href="super_admin_styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>Panel de Super Administrador</h1>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Gestión de Usuarios</a></li>
                <li><a href="#">Reportes</a></li>
                <li><a href="#">Configuraciones</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
        <div class="welcome-message">
            <h2>Bienvenido al panel de Super Administrador, Super Admin</h2>
            <p>Como super administrador, tienes control total sobre la plataforma. Aquí puedes gestionar usuarios, ver reportes y ajustar configuraciones críticas.</p>
        </div>
    </main>
</body>
</html>
