<?php

// Incluimos el archivo de conexión a la base de datos
require './connectionBD.php';

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se ha enviado un formulario (método POST)

    $id = $_SESSION["id_admin"]; // Obtenemos el ID del usuario de la sesión

    // Preparamos la consulta SQL para desactivar la cuenta del usuario
    $sql = "UPDATE usuarios SET estado = 0 WHERE id_usuario = :id";

    // Preparamos la sentencia SQL para evitar inyecciones SQL
    $stmt = $pdo->prepare($sql);

    // Vinculamos el parámetro :id a la variable $id (el ID del usuario)
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // El ID es un entero

    // Ejecutamos la consulta
    $stmt->execute();

    // Verificamos si se actualizó alguna fila
    if ($stmt->rowCount() > 0) {
        // Si se actualizó una fila, significa que la cuenta se desactivó correctamente
        echo "<script>alert('Cuenta eliminada'); window.location.href = '../view/login.php';</script>";
    } else {
        // Si no se actualizó ninguna fila, algo salió mal
        echo 'No se pudo eliminar tu contraseña.';
    }

    // Cerramos la conexión a la base de datos
    $pdo = null; // Liberamos los recursos asociados a la conexión
}
?>