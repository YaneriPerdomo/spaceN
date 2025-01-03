<?php
session_start();
require_once './../../dompdf/autoload.inc.php';

// Incluimos el archivo donde se establece la conexión a la base de datos
include "../connectionBD.php";

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}

$function = $_POST["valueFunction"];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        switch ($function) {
            case 'update':
                // Obtenemos los datos enviados desde el formulario
                $userId = $_SESSION["id_admin"];
                $user = $_POST["user"];
                $cargo = $_POST["professionalPosition"];
                $name = $_POST["name"];
                $lastName = $_POST["lastname"];
                $mail = $_POST["mail"];
                $center = $_POST["center"];

                $sqlOriginalData = "SELECT usuarios.usuario, profesionales.id_cargo, 
                profesionales.nombre, profesionales.apellido, profesionales.correo_electronico, profesionales.centro_educativo
                FROM profesionales INNER JOIN usuarios ON profesionales.id_usuario = usuarios.id_usuario 
                WHERE usuarios.id_usuario = :id_user";
                $queryOriginalData = $pdo->prepare($sqlOriginalData);
                $queryOriginalData->bindParam(':id_user', $userId, PDO::PARAM_INT);
                $queryOriginalData->execute();
                $originalData = $queryOriginalData->fetch(PDO::FETCH_ASSOC);


                $isModified = false;
                if (
                    $user == $originalData['usuario'] &&
                    $cargo == $originalData['id_cargo'] &&
                    $name == $originalData['nombre'] &&
                    $lastName == $originalData['apellido'] &&
                    $mail == $originalData['correo_electronico'] &&
                    $center == $originalData['centro_educativo']
                ) {
                    return Header("Location:./../../view/admin/user/profile.php");
                }
 

                if ($user != $_SESSION["usuario"]) {
                    $sqlFindUser = "SELECT usuario FROM usuarios WHERE usuario = :user AND id_usuario != :id_user; ";
                    $queryFindUser = $pdo->prepare($sqlFindUser);
                    $queryFindUser->bindParam('user', $user, PDO::PARAM_STR);
                    $queryFindUser->bindParam('id_user', $userId, PDO::PARAM_INT);                    
                    $queryFindUser->execute();
                    if ($queryFindUser->rowCount() > 0) {
                        echo "<script> 
                                    alert('Lo sentimos, el nombre de usuario \"$user\" ya está en uso.')
                                    window.location.href = './../../view/admin/user/profile.php';
                             </script>";
                        exit();
                    }
                }

                if ($mail != $_SESSION['correo']) {
                    $sqlMail = "SELECT correo_electronico FROM profesionales WHERE correo_electronico = :mail AND id_usuario != :id_user";
                    $queryMail = $pdo->prepare($sqlMail);
                    $queryMail->bindParam('mail', $mail, PDO::PARAM_STR);
                    $queryMail->bindParam('id_user', $userId, PDO::PARAM_STR);

                    $queryMail->execute();
                    if ($queryMail->rowCount() > 0) {
                        echo "<script> 
                            alert('Lo sentimos, la dirección de correo electrónico \"$mail\" ya está en uso.')
                            window.location.href = './../../view/admin/user/profile.php';
                         </script>";
                        exit();
                    }
                }

                $pdo->beginTransaction();
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
                    centro_educativo = :center
                    WHERE id_usuario = :userId";

                $stmt2 = $pdo->prepare($sqlUpdateProfesional); //Preparamos la consulta
                // Vinculamos los parámetros con los tipos de datos correctos
                $stmt2->bindParam(':cargo', $cargo, PDO::PARAM_INT);
                $stmt2->bindParam(':nombre', $name, PDO::PARAM_STR);
                $stmt2->bindParam(':lastname', $lastName, PDO::PARAM_STR);
                $stmt2->bindParam(':mail', $mail, PDO::PARAM_STR);
                $stmt2->bindParam(':center', $center, PDO::PARAM_STR);
                $stmt2->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt2->execute(); //Ejecutamos la consulta

                $pdo->commit();
                echo "<script>alert('Datos actualizados'); window.location.href = './../../view/admin/user/profile.php';</script>";
                $_SESSION["usuario"] = $user;
                $_SESSION["nombre"] = $name;
                $_SESSION["apellido"] = $lastName;
                $_SESSION["id_cargo"] = $cargo;
                $_SESSION['correo'] = $mail;
                $_SESSION['centro'] = $center;

                break;
            case 'changesPassword':
                // Obtenemos los valores enviados desde el formulario
                $oldPassword = $_POST["oldPassword"]; // Contraseña anterior del usuario
                $newPassword = $_POST["newPassword"]; // Nueva contraseña del usuario
                $passwordAgain = $_POST["passwordAgain"]; // Confirmación de la nueva contraseña
                $id = $_SESSION["id_admin"]; // ID del usuario logueado (obtenido de la sesión)

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
                    echo "<script>alert('La contraseña se actualizó correctamente'); window.location.href = './../../view/admin/user/changesPassword.php';</script>";
                } else {
                    echo 'No se pudo actualizar la contraseña.';
                    // Aquí podrías agregar lógica adicional para manejar el caso en que no se actualizó la contraseña, como mostrar un mensaje de error más específico o registrar el error en un log.
                }
                break;
            case 'deleteAccount':
                // Verificamos si se ha enviado un formulario (método POST)

                $id = $_SESSION["id_admin"]; // Obtenemos el ID del usuario de la sesión

                // Preparamos la consulta SQL para desactivar la cuenta del usuario
                $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT); // El ID es un entero
                $stmt->execute();

                $sqlProfesional = "DELETE FROM usuarios WHERE id_profesional = :id";
                $stmtProfesional = $pdo->prepare($sql);
                $stmtProfesional->bindParam(':id', $id, PDO::PARAM_INT); // El ID es un entero
                $stmtProfesional->execute();



                // Verificamos si se actualizó alguna fila
                if ($stmt->rowCount() > 0) {
                    // Si se actualizó una fila, significa que la cuenta se desactivó correctamente
                    echo "<script>alert('Cuenta eliminada'); window.location.href = '../view/login.php';</script>";
                } else {
                    // Si no se actualizó ninguna fila, algo salió mal
                    echo 'No se pudo eliminar tu contraseña.';
                }
                break;
            default:
                # code...
                break;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $pdo = null;
}
?>