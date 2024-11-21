<?php
session_start();

// Incluimos el archivo de conexión a la base de datos
require './connectionBD.php';

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje y detenemos la ejecución
    die("Error de conexión a la base de datos: " . $pdo->errorInfo()[2]);
}

// Verificamos si se ha enviado un formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos enviados desde el formulario
    $userId = $_SESSION["id_usuario"]; 
    $user = $_POST["user"];
    $cargo = $_POST["professionalPosition"];
    $name = $_POST["name"];
    $lastName = $_POST["lastname"];
    $mail = $_POST["mail"];
    $center = $_POST["center"];

    // Preparamos la consulta para actualizar la tabla "usuarios"
    $sqlUpdateUsuario = "UPDATE usuarios SET usuario = :user WHERE id_usuario = :userId"; //Consulta Mysql
    $stmt = $pdo->prepare($sqlUpdateUsuario); //Preparacion
    $stmt->bindParam(':user', $user, PDO::PARAM_STR); //Vinculamos el parametro usuario
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT); //Vinculamos el parametro id
    $stmt->execute(); //La Ejecutamos

    // Preparamos la consulta para actualizar la tabla "profesionales"
    $sqlUpdateProfesional = "UPDATE profesionales SET 
                                id_cargo = :cargo,
                                nombre = :nombre,
                                apellido = :lastname,
                                correo_electronico = :mail,
                                centro_educativo_profesional = :center
                            WHERE id_usuario = :userId"; //Consulta mysql
    $stmt2 = $pdo->prepare($sqlUpdateProfesional); //Preparacion
    //Vinculamos los parametros necesarios de la consulta
    $stmt2->bindParam(':cargo', $cargo, PDO::PARAM_INT); 
    $stmt2->bindParam(':nombre', $name, PDO::PARAM_INT); 
    $stmt2->bindParam(':lastname', $lastName, PDO::PARAM_INT); 
    $stmt2->bindParam(':mail', $mail, PDO::PARAM_INT); 
    $stmt2->bindParam(':center', $center, PDO::PARAM_INT); 
    $stmt2->bindParam(':userId', $userId, PDO::PARAM_INT);  
    $stmt2->execute(); //La ejecutamos

    // Verificamos si ambas actualizaciones se realizaron correctamente
    if ($stmt->rowCount() > 0 && $stmt2->rowCount() > 0) {
        echo 'Los datos se actualizaron correctamente.';
    } else {
        echo 'Hubo un error al actualizar los datos.';
    }

    // Cerramos la conexión a la base de datos
    $pdo = null;
}

?>