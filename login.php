<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="form-container">
    <h2>Registro de Usuario</h2>
    <form action="procesar_registro.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="text" name="role" placeholder="Rol de usuario" required>
        <input type="submit" value="Registrarse">
    </form>
</div>

</body>
</html>

