<?php

session_start();

// Incluimos el archivo donde se establece la conexión a la base de datos
include "./connectionBD.php";

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}

// Verificamos si se ha enviado un formulario (método POST)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Obtenemos los datos enviados desde el formulario
    $user = $_POST["user"]; // Obtiene el nombre de usuario del formulario
    $clue = $_POST["password"]; // Obtiene la contraseña del formulario
    $name = $_POST["name"]; // Obtiene el nombre del niño
    $lastName = $_POST["lastName"]; // Obtiene el apellido del niño
    $date = $_POST["date"]; // Obtiene la fecha de nacimiento del niño
    $accessLevel = $_POST["accessLevel"]; // Obtiene el nivel de acceso
    $gender = $_POST["gender"]; // Obtiene el género del niño
    $idProfesional = $_SESSION["id_profesional"]; // Obtiene el ID del profesional desde la sesión

    // Contamos la cantidad de registros existentes en la tabla 'usuarios' para asignar un ID único
    $sqlCount = 'SELECT count(*) FROM `usuarios`';
    $id = $pdo->prepare($sqlCount);
    $id->execute();
    $totalFilas = $id->fetchColumn() + 1; // Incrementamos en 1 para obtener el siguiente ID disponible

    // Preparamos la consulta SQL para insertar un nuevo usuario (el padre o tutor)
    $sqlUser = "INSERT INTO usuarios (id_usuario, id_rol, usuario, clave, estado, permisos, fecha_hora_creacion)
               VALUES (
                   :id_user,  // ID del nuevo usuario (autoincrementable)
                   2,         // ID del rol (2 en este caso)
                   :user,      // Valor del campo 'usuario' (bindParam para prevenir inyección SQL)
                   :clue,      // Valor del campo 'clave' (bindParam para prevenir inyección SQL)
                   1,         // Estado del usuario (1: activo)
                   1,         // Permisos del usuario (1: permisos básicos)
                   NOW()       // Fecha y hora de creación actual
               )";

    // Preparamos la sentencia y vinculamos los parámetros
    $stmt = $pdo->prepare($sqlUser); //Preparamos la consulta
    $stmt->bindParam('id_user', $totalFilas, PDO::PARAM_INT); //Vinculamos el parametro id_usuario en la consultada preparada
    $stmt->bindParam('user', $user, PDO::PARAM_STR);
    $stmt->bindParam('clue', $clue, PDO::PARAM_STR);
    $stmt->execute(); //Ejecutamos la consulta

    // Preparamos la consulta SQL para insertar un nuevo niño
    $sqlChild = "INSERT INTO ninos (id_genero, id_categoria_actividades, id_usuario , id_profesional, 
                                nombre, apellido, fecha_nacimiento)
                VALUES (
                    :id_genero, 
                    :id_accessLevel, 
                    :id_user, 
                    :id_profesional, 
                    :nombre,
                    :lastname,
                    :dateBirth
                )";
    $stmt2 = $pdo->prepare($sqlChild);
    $stmt2->bindParam(':id_genero', $gender, PDO::PARAM_INT);
    $stmt2->bindParam('id_accessLevel', $accessLevel, PDO::PARAM_INT);
    $stmt2->bindParam('id_user', $totalFilas, PDO::PARAM_INT);
    $stmt2->bindParam('id_profesional',$idProfesional, PDO::PARAM_INT);
    $stmt2->bindParam('nombre', $name, PDO::PARAM_STR);
    $stmt2->bindParam('lastname',$lastName, PDO::PARAM_STR);
    $stmt2->bindParam('dateBirth' , $date, PDO::PARAM_STR);

    $stmt2->execute();

    // Verificamos si se insertó correctamente al menos un registro
    if ($stmt->rowCount() > 0 && $stmt2->rowCount() > 0) {
        echo "¡Registro completado con éxito!";
    }
    $pdo = null;
}


?>