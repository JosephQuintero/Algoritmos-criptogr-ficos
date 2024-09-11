<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input[type="submit"] {
            background-color: #9b59b6;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #7a3e99;
        }
    </style>
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
