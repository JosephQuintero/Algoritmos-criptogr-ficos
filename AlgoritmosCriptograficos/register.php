<?php

    include 'db.php';

    $error_message = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        function sanitize_username($username) {
            
            $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
            
            if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $username)) {

                return false;

            }

            return $username;

        }

        function validate_password($password) {

            if (strlen($password) < 8) {

                return "La contraseña debe tener al menos 8 caracteres.";

            }
        
            if (!preg_match('/[0-9]/', $password)) {

                return "La contraseña debe contener al menos un número.";

            }
        
            if (!preg_match('/[\W_]/', $password)) {

                return "La contraseña debe contener al menos un carácter especial.";

            }

            if (!preg_match('/^[a-zA-Z0-9_\-@.]+$/', $password)) {

                return "La contraseña contiene caracteres inválidos.";

            }

            return true;

        }

        $username = sanitize_username($_POST['username']);
        $validate_password = validate_password($_POST['password']);
        $role_id = $_POST['role'];

        if (!$username) {

            $error_message = "El nombre de usuario contiene caracteres inválidos.";
            
        } else {

            if ($validate_password !== true) {

                $error_message = $validate_password; 
    
            } else {
    
                $password = $_POST['password'];
    
            }

        }
        
        

        if (empty($error_message)) {

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

    <?php

    if (!empty($error_message)) {

        echo "<p style='color:red;'>$error_message</p>";

    }

    ?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        <p>La contraseña debe tener al menos 8 caracteres, incluyendo al menos un número y un carácter especial.</p>
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