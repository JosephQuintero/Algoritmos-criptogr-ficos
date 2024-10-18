<?php 

    $mysqli = new mysqli("localhost", "root", "Spidy241099", "registro_usuarios", "8000"); #Alonso BD
    #$mysqli = new mysqli("localhost", "root", "", "registro_usuarios", "3306"); #Joseph BD

    if($mysqli->connect_error){

        die("Error en la conexion" . $mysqli->connect_error);

    }

?>