<?php

require './connectionBD.php';

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje y detenemos la ejecución
    die("Error de conexión a la base de datos: " . $pdo->errorInfo()[2]);
}

// Verificamos si se ha enviado un formulario (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = $_POST["id_user"];
    $user = $_POST["user"];
    $name = $_POST["name"];
    $lastName = $_POST["lastname"];
    $date = $_POST["date"];
    $accessLevel = $_POST["accessLevel"];
    $gender = $_POST["gender"];

    $sqlUser = "UPDATE usuarios SET usuario = :user WHERE id_usuario = :id_user ";
    $stmt = $pdo->prepare($sqlUser);
    $stmt->bindParam('user', $user, PDO::PARAM_STR);
    $stmt->bindParam('id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $sqlChild = "UPDATE ninos SET 
                    id_genero = :id_genero, 
                    id_categoria_actividades = :id_accessLevel, 
                    nombre = :nombre,
                    apellido = :lastname,
                    fecha_nacimiento = :dateBirth
                    WHERE id_usuario = :id_user";
    $stmt2 = $pdo->prepare($sqlChild);
    $stmt2->bindParam(':id_genero', $gender, PDO::PARAM_INT);
    $stmt2->bindParam('id_accessLevel', $accessLevel, PDO::PARAM_INT);
    $stmt2->bindParam('nombre', $name, PDO::PARAM_STR);
    $stmt2->bindParam('lastname',$lastName, PDO::PARAM_STR);
    $stmt2->bindParam('dateBirth' , $date, PDO::PARAM_STR);
    $stmt2->bindParam('id_user', $id_user, PDO::PARAM_INT);

    $stmt2->execute();
    if ($stmt->rowCount() > 0 || $stmt2->rowCount() > 0) {
        echo "usuario actualizado";
    }
}


?>