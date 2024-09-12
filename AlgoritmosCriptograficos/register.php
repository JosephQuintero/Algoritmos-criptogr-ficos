<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
    window.onload = function() {
        var toggleButton = document.getElementById("togglePassword");
        toggleButton.addEventListener("click", function() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Ocultar contraseña";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Mostrar contraseña";
            }
        });
    };
</script>
</head>
<body>

<div class="form-container">
    <h2>Registro de Usuario</h2>
    <form action="procesar_registro.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        <button type="button" id="togglePassword" onclick="togglePassword()">Mostrar contraseña</button>
        <select name="role" required>
            <option value="" disabled selected>Selecciona un rol</option>
            <option value="Admin">Administrador</option>
            <option value="Editor">Editor</option>
            <option value="Viewer">Visualizador</option>
            <option value="Support">Soporte</option>
            <option value="SuperAdmin">Super Administrador</option>
        </select>
        <input type="submit" value="Registrarse">
    </form>
</div>

</body>
</html>

