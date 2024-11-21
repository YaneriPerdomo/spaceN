<?php
session_start();

$host = "localhost"; // Servidor de la base de datos
$port = 3306; // Database port
$dbname = "eres_capaz"; // Nombre de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "";

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["id_usuario"]; // Suponiendo que tienes un campo oculto para el ID del usuario
    $user =  $_POST["user"];
    $cargo = $_POST["professionalPosition"];
    $name = $_POST["name"];
    $lastName = $_POST["lastname"];
    $mail = $_POST["mail"];
    $center = $_POST["center"];
    // Construir la consulta UPDATE para la tabla usuarios
    $sqlUpdateUsuario = "UPDATE usuarios
                        SET usuario = '$user'
                        WHERE id_usuario = $userId";

    // Construir la consulta UPDATE para la tabla profesionales
    $sqlUpdateProfesional = "UPDATE profesionales
                            SET 
                                id_cargo = '$cargo',
                                nombre = '$name',
                                apellido = '$lastName',
                                correo_electronico = '$mail',
                                centro_educativo_profesional = '$center'
                            WHERE id_usuario = $userId";

    // Ejecutar las consultas
    if ($conn->query($sqlUpdateUsuario) === TRUE && $conn->query($sqlUpdateProfesional) === TRUE) {
        echo "Datos actualizados correctamente.";
        
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

$conn->close();
?>