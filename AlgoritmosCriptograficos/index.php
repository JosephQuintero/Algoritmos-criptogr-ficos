<?php

    session_start();
    include 'db.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $mysqli->prepare("SELECT id, password, rol_id FROM usuarios WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $query->bind_result($user_id, $hashed_password, $rol_id);
        $query->fetch();

        if ($hashed_password != null) {

            if (password_verify($password, $hashed_password)) {

                $_SESSION['user_id'] = $user_id;
                $_SESSION['rol_id'] = $rol_id;
                header('Location: dashboard.php');
    
            } else {
    
                echo "Credenciales incorrectas.";
    
            }

        }
    
        $query->close();

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuario</title>
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
    <h2>Login de Usuario</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        <button type="button" id="togglePassword" onclick="togglePassword()">Mostrar contraseña</button>
        <input type="submit" value="Ingresar">
         <!-- Enlace para registrar usuario -->
         <a href="register.php" class="register-link">Registrar usuario</a>
    </form>
    </form>
</div>

</body>
</html>