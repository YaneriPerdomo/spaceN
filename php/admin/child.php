<?php

session_start();

// Incluimos el archivo donde se establece la conexión a la base de datos
include "../connectionBD.php";

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}

$valueFunction = $_POST["valueFunction"];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   try {
    switch ($valueFunction) {
        case 'add':
            // Obtenemos los datos enviados desde el formulario
            $user = trim($_POST["user"]); // Obtiene el nombre de usuario del formulario
            $clue = trim($_POST["password"]); // Obtiene la contraseña del formulario
            $name = trim($_POST["name"]); // Obtiene el nombre del niño
            $lastName = trim($_POST["lastName"]); // Obtiene el apellido del niño
            $date = $_POST["date"]; // Obtiene la fecha de nacimiento del niño
            $accessLevel = $_POST["accessLevel"]; // Obtiene el nivel de acceso
            $gender = $_POST["gender"]; // Obtiene el género del niño
            $idProfesional = $_SESSION["id_profesional"]; // Obtiene el ID del profesional desde la sesión

            $sqlUserValidation = "SELECT usuario FROM usuarios WHERE usuario = :user";
            $queryUserValidation = $pdo->prepare($sqlUserValidation);
            $queryUserValidation->bindParam('user', $user, PDO::PARAM_STR);
            $queryUserValidation->execute();

            if($queryUserValidation->rowCount() > 0){
                echo "<script> alert('¡Nombre de usuario ocupado! Prueba con otro.'); window.location.href = './../../view/admin/child/add.php';</script></script>";
                exit();
            }
            $pdo->beginTransaction();
             $sqlUser = "INSERT INTO usuarios (id_rol, usuario, clave, estado, permisos, fecha_hora_creacion) VALUES (2, :user,:clue,1, 1, NOW())";

             $stmt = $pdo->prepare($sqlUser); //Preparamos la consulta
            $stmt->bindParam('user', $user, PDO::PARAM_STR);
            $stmt->bindParam('clue', $clue, PDO::PARAM_STR);
            $stmt->execute(); //Ejecutamos la consulta

            $last_id = $pdo->lastInsertId();
            $sqlChild = "INSERT INTO ninos (id_genero, id_categoria_actividades, id_usuario , id_profesional, nombre, apellido, fecha_nacimiento)
                                VALUES (:id_genero, :id_accessLevel, :id_user, :id_profesional, :nombre, :lastname,:dateBirth )";
            
            $stmt2 = $pdo->prepare($sqlChild);
            $stmt2->bindParam(':id_genero', $gender, PDO::PARAM_INT);
            $stmt2->bindParam('id_accessLevel', $accessLevel, PDO::PARAM_INT);
            $stmt2->bindParam('id_user', $last_id, PDO::PARAM_INT);
            $stmt2->bindParam('id_profesional', $idProfesional, PDO::PARAM_INT);
            $stmt2->bindParam('nombre', $name, PDO::PARAM_STR);
            $stmt2->bindParam('lastname', $lastName, PDO::PARAM_STR);
            $stmt2->bindParam('dateBirth', $date, PDO::PARAM_STR);
            $stmt2->execute();

            $sqlProgress = "INSERT INTO progresos (id_usuario, id_categoria_actividades) VALUES (:id_user, :id_accessLevel)";
            $queryProgress = $pdo->prepare($sqlProgress);
            $queryProgress->bindParam('id_accessLevel', $accessLevel, PDO::PARAM_INT);
            $queryProgress->bindParam('id_user',$last_id,PDO::PARAM_INT);
            $queryProgress->execute();


            switch ($accessLevel) {
                case '1':
                    $lecciones = [
                        [1, 'en_espera'], 
                        [2, 'bloqueado'], 
                        [3, 'bloqueado'], 
                        [4, 'bloqueado']
                    ];
                    $sqlLesson = "INSERT INTO estado_lecciones (id_usuario, id_leccion, completado) VALUES (:id_user, :id_lesson, :statuLesson)";
                    $queryLesson = $pdo->prepare($sqlLesson);
                    foreach ($lecciones as $key => $value) {
                        $queryLesson->bindParam('id_user',$last_id,PDO::PARAM_INT);
                        $queryLesson->bindParam('id_lesson',$value[0],PDO::PARAM_INT);
                        $queryLesson->bindParam('statuLesson',$value[1],PDO::PARAM_STR);
                        $queryLesson->execute();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }

            if ($stmt->rowCount() > 0 && $stmt2->rowCount() > 0 && $queryProgress->rowCount() > 0) {
                $pdo->commit();
                echo "<script> window.location.href = './../../view/admin/dashboard.php?page=1';</script>";
            }
            break;
        case 'modify':
            $id_user = $_POST["id_user"];
            $user = trim($_POST["user"]);
            $name = trim($_POST["name"]);
            $lastName = trim($_POST["lastName"]);
            $date = $_POST["date"];
            $accessLevel = $_POST["accessLevel"];
            $gender = $_POST["gender"];

            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                throw new Exception("Fecha inválida");
            }
            $pdo->beginTransaction();
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
            $stmt2->bindParam('lastname', $lastName, PDO::PARAM_STR);
            $stmt2->bindParam('dateBirth', $date, PDO::PARAM_STR);
            $stmt2->bindParam('id_user', $id_user, PDO::PARAM_INT);

            $stmt2->execute();
            if ($stmt->rowCount() > 0 || $stmt2->rowCount() > 0) {
                $pdo->commit();
                echo "<script>window.location.href = './../../view/admin/dashboard.php?page=1';</script>";
            } else {
                echo "<script>alert('Eror de actualizacion'); window.location.href = '../../view/admin/dashboard.php';</>";
            }
            // Cerramos la conexión a la base de datos
            break;
        case 'delete':
            $id_childC = $_POST["id_childC"];
            $id_childU = $_POST["id_childU"];
           
            $pdo->beginTransaction();
            $sqlDeleteChildN = "DELETE FROM notificaciones WHERE id_nino = :id";
            $stmt3 = $pdo->prepare($sqlDeleteChildN);
            $stmt3->bindParam('id', $id_childC, PDO::PARAM_INT);
            $stmt3->execute();

            $sqlProgressChild = "DELETE FROM progresos WHERE id_usuario = :id_usuario";
            $stmt5 = $pdo->prepare($sqlProgressChild);
            $stmt5->bindParam('id_usuario', $id_childU, PDO::PARAM_INT);
            $stmt5->execute();

            
            $sqlDesbloqueosLecciones = "DELETE FROM estado_lecciones WHERE id_usuario = :id_usuario";
            $stmt4 = $pdo->prepare($sqlDesbloqueosLecciones);
            $stmt4->bindParam('id_usuario', $id_childU, PDO::PARAM_INT);
            $stmt4->execute();

            $sqlDeleteChild = "DELETE FROM ninos WHERE `id_nino` = :id_usuario";
            $stmt = $pdo->prepare($sqlDeleteChild);
            $stmt->bindParam('id_usuario', $id_childC, PDO::PARAM_INT);
            $stmt->execute();

            $sqlDeleteUser = "DELETE FROM usuarios WHERE `id_usuario` = :id_usuario";
            $stmt2 = $pdo->prepare($sqlDeleteUser);
            $stmt2->bindParam('id_usuario', $id_childU, PDO::PARAM_INT);
            $stmt2->execute();

            if (($stmt->rowCount() > 0 && $stmt2->rowCount() > 0 && $stmt4->rowCount() > 0 && $stmt5->rowCount() > 0 ) 
                || $stmt3->rowCount() > 0) {
                $pdo->commit();
                echo "<script>window.location.href = './../../view/admin/dashboard.php';</script>";

            }else{
                echo 'ocurrio un error';
            }
            break;
        case 'sendNotification':
            $id_child = $_POST["id_child"];
            $id_profesional = $_POST["id_profesional"];
            $messenger = $_POST["messenger"];

            if (empty($id_child) || empty($id_profesional) || empty($messenger)) {
                throw new Exception("Todos los campos son obligatorios.");
            }
            $sqlNotificacion = "INSERT INTO notificaciones (id_nino, id_profesional, mensaje,fecha_hora_envio, estado) VALUES (:id_child, :id_profesional, :messenger,NOW(),'pendiente')";
            $stmt = $pdo->prepare($sqlNotificacion);
            $stmt->bindParam('id_child', $id_child, PDO::PARAM_INT);
            $stmt->bindParam('id_profesional', $id_profesional, PDO::PARAM_INT);
            $stmt->bindParam('messenger', $messenger, PDO::PARAM_STR);
            $stmt->execute();
            echo "<script>alert('Notificacion enviada con exito'); window.location.href = './../../view/admin/dashboard.php?page=1';</script>";
            break;
        default:
            echo 'Problema a llamar a la funcion';
        break;
    }
   } catch (PDOException $ex) {
        $pdo->rollBack();
        echo $ex->getMessage();
   }finally{
    $pdo = null;
   }
}
?>