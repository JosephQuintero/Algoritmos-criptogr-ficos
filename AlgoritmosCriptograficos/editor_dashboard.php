<?php
session_start();

/*
if (!isset($_SESSION['user_id']) || $_SESSION['rol_id'] !== 2) {
    
    header('Location: index.php');
    exit;

}
*/

#echo "Bienvenido al panel de administración.";
#echo '<a href="logout.php">Cerrar sesión</a>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Editor</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>Panel de Editor</h1>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Gestión de Usuarios</a></li>
                <li><a href="#">Reportes</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
    <div class="welcome-message">
        <h2>Bienvenido al panel de editor, Editor</h2>
        <p>Como editor, puedes crear, editar y gestionar contenido dentro del sistema. Aquí tienes un resumen de tus principales tareas:</p>
        <ul>
            <li><strong>Editar publicaciones:</strong> Modifica y actualiza el contenido existente.</li>
            <li><strong>Aprobar comentarios:</strong> Revisa y aprueba los comentarios realizados por los usuarios.</li>
            <li><strong>Gestionar categorías:</strong> Organiza el contenido en diferentes categorías.</li>
        </ul>
        <p>Utiliza el menú de navegación para acceder a todas las funcionalidades disponibles para tu rol.</p>
    </div>
</main>
</body>
</html>