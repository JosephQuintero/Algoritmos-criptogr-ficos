<?php

    session_start();
    include 'db.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        function sanitize_username($username) {
            
            $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
            
            if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $username)) {

                return false;

            }

            return $username;

        }

        function validate_password($password) {

            if (strlen($password) < 8) {
                
                return false;

            }
        
            if (!preg_match('/[0-9]/', $password)) {

                return false;

            }
        
            if (!preg_match('/[\W_]/', $password)) {

                return false;

            }
        
            if (!preg_match('/^[a-zA-Z0-9_\-@.]+$/', $password)) {

                return false;

            }

            return $password;

        }

        $username = sanitize_username($_POST['username']);
        $password = validate_password($_POST['password']);

        if ($username && $password) {

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
                    exit();

                } else {

                    echo "Credenciales incorrectas.";

                }

            } else {

                echo "Usuario no encontrado.";

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