<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['rol_id'] !== 3) {
    
    header('Location: index.php');
    exit;

}

echo "Bienvenido al panel de administración.";
echo '<a href="logout.php">Cerrar sesión</a>';

?>
