<?php
session_start();

// Incluimos el archivo de conexión a la base de datos
require './connectionBD.php';

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}

// Verificamos si se ha enviado un formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los valores enviados desde el formulario
    $oldPassword = $_POST["oldPassword"]; // Contraseña anterior del usuario
    $newPassword = $_POST["newPassword"]; // Nueva contraseña del usuario
    $passwordAgain = $_POST["passwordAgain"]; // Confirmación de la nueva contraseña
    $id = $_SESSION["id_usuario"]; // ID del usuario logueado (obtenido de la sesión)

    // Preparamos la consulta SQL para actualizar la contraseña del usuario
    $sql = "UPDATE usuarios SET clave = :newPassword WHERE id_usuario = :id";

    // Preparamos la sentencia SQL para evitar inyecciones SQL
    $stmt = $pdo->prepare($sql);

    // Vinculamos los parámetros de la consulta a las variables PHP
    $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR); // La nueva contraseña es un string
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // El ID del usuario es un entero

    // Ejecutamos la consulta
    $stmt->execute();

    // Verificamos si se actualizaron filas
    if ($stmt->rowCount() > 0) {
        echo 'La contraseña se actualizó correctamente.';
    } else {
        echo 'No se pudo actualizar la contraseña.';
        // Aquí podrías agregar lógica adicional para manejar el caso en que no se actualizó la contraseña, como mostrar un mensaje de error más específico o registrar el error en un log.
    }

    // Cerramos la conexión a la base de datos
    $pdo = null; // Liberamos los recursos asociados a la conexión
}
?>