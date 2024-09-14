<?php

    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role'];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = $mysqli->prepare("INSERT INTO usuarios (username, password, rol_id) VALUES (?, ?, ?)");
        $query->bind_param("ssi", $username, $hashed_password, $role_id);

        if ($query->execute()) {

            header("Location: index.php");

        } else {

            echo "Error: " . $query->error;

        }

        $query->close();

    }

?>
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
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        <button type="button" id="togglePassword" onclick="togglePassword()">Mostrar contraseña</button>
        <select name="role" required>
            <option value="" disabled selected>Selecciona un rol</option>
            <option value="1">Administrador</option>
            <option value="2">Editor</option>
            <option value="3">Visualizador</option>
            <option value="4">Soporte</option>
            <option value="5">Super Administrador</option>
        </select>
        <input type="submit" value="Registrarse">
    </form>
</div>

</body>
</html>