<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['rol_id'] !== 1) {
    echo "Acceso denegado. Solo administradores.";
    exit;
}

echo "Bienvenido al panel de administración.";

echo '<a href="logout.php">Cerrar sesión</a>';
?>
