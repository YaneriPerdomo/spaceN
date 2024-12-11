<?php

// Incluimos el archivo donde se establece la conexión a la base de datos
include "./connectionBD.php";

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $mail = $_POST["mail"];
    $professionalPosition = $_POST["professionalPosition"];
    $center = $_POST["center"];
    $password = $_POST["password"];

    $sqlCount = 'SELECT count(*) FROM `usuarios`';
    $id = $pdo->prepare($sqlCount);
    $id->execute();
    $idUserAdmin = $id->fetchColumn() + 1; // Incrementamos en 1 para obtener el siguiente ID disponible


    // Primera consulta: Insertar usuario
    $sqlAddUser = "INSERT INTO usuarios (id_usuario, id_rol, usuario, clave, estado, permisos, fecha_hora_creacion)
    VALUES (
        :id_usuario,
        1, 
        :user, 
        :clue, 
        1, 
        1, 
        NOW()
    )";
    $stmt = $pdo->prepare($sqlAddUser);
    $stmt->bindParam('id_usuario',$idUserAdmin, PDO::PARAM_INT);
    $stmt->bindParam('user',$user, PDO::PARAM_STR);
    $stmt->bindParam('clue',$password, PDO::PARAM_STR);
    $stmt->execute();


    // Segunda consulta: Insertar profesional
    $sqlAddPro = "INSERT INTO profesionales (id_usuario, id_cargo, nombre, apellido, correo_electronico, centro_educativo)
        VALUES (
            $idUserAdmin,
            (SELECT id_cargo FROM cargos WHERE id_cargo = '1'), 
            :nombre,
            :lastname,
            :mail,
            :center
        )";

    $stmt2 = $pdo->prepare($sqlAddPro);
    $stmt2->bindParam('nombre',$name, PDO::PARAM_STR);
    $stmt2->bindParam('lastname',$lastName, PDO::PARAM_STR);
    $stmt2->bindParam('mail', $mail, PDO::PARAM_STR);
    $stmt2->bindParam('center', $center, PDO::PARAM_STR);
    $stmt2->execute();

    if($stmt->rowCount() > 0 || $stmt2->rowCount() > 0){
        echo "cuenta ya creada";
    }else{
        echo "cuenta no creada";
    }
    

    $pdo = null;
}

?>