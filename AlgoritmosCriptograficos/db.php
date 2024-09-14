<?php 

    $mysqli = new mysqli("localhost", "root", "Spidy241099", "registro_usuarios", "8000");

    if($mysqli->connect_error){

        die("Error en la conexion" . $mysqli->connect_error);

    }

?>