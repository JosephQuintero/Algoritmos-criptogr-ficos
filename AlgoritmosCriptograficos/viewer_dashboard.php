<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['rol_id'] !== 3) {
    
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
    <title>Panel de Visualizador</title>
    <link rel="stylesheet" type="text/css" href="viewer_styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>Panel de Visualizador</h1>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Ver Reportes</a></li>
                <li><a href="#">Consultas</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
        <div class="welcome-message">
            <h2>Bienvenido al panel de visualización</h2>
            <p>Desde aquí podrás ver los reportes y realizar consultas relacionadas con los datos.</p>
        </div>
    </main>
</body>
</html>