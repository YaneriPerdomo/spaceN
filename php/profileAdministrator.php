<?php

include "./connectionBD.php";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = trim($_POST["user"]);
        $name = trim($_POST["name"]);
        $lastName = trim($_POST["lastname"]);
        $mail = trim($_POST["mail"]);
        $professionalPosition = $_POST["professionalPosition"];
        $center = trim($_POST["center"]);
        $password = trim($_POST["password"]);
    
        $sqlFindUser = "SELECT usuario FROM usuarios WHERE usuario = :user";
        $queryFindUser = $pdo->prepare($sqlFindUser);
        $queryFindUser->bindParam('user', $user, PDO::PARAM_STR);
        $queryFindUser->execute();
        if($queryFindUser->rowCount() > 0){
            echo "<script> 
                    alert('Lo sentimos, el nombre de usuario \"$user\" ya está en uso.')
                    window.location.href = './../view/createAccount.php';
                 </script>";
            exit();
        } 
        
        $sqlMail = "SELECT correo_electronico FROM profesionales WHERE correo_electronico = :mail";
        $queryMail = $pdo->prepare($sqlMail);
        $queryMail->bindParam('mail', $mail, PDO::PARAM_STR);
        $queryMail->execute();
        if($queryMail->rowCount() > 0){
            echo "<script> 
                    alert('Lo sentimos, la dirección de correo electrónico \"$mail\" ya está en uso.')
                    window.location.href = './../view/createAccount.php';
                 </script>";
            exit();
        } 
        
        $pdo->beginTransaction();
        $sqlAddUser = "INSERT INTO usuarios (id_rol, usuario, clave, estado, permisos, 
            fecha_hora_creacion) VALUES ( 1,  :user,  :clue,  1,  1,  NOW())";
        $stmt = $pdo->prepare($sqlAddUser);
        $stmt->bindParam('user',$user, PDO::PARAM_STR);
        $stmt->bindParam('clue',$password, PDO::PARAM_STR);
        $stmt->execute();
    
        $last_id = $pdo->lastInsertId();
        $sqlAddPro = "INSERT INTO profesionales (id_usuario, id_cargo, nombre, apellido, correo_electronico, 
            centro_educativo) VALUES ( :id_usuario, :id_cargo, :nombre, :lastname,:mail, :center)";
    
        $stmt2 = $pdo->prepare($sqlAddPro);
        $stmt2->bindParam('id_usuario',$last_id, PDO::PARAM_INT);
        $stmt2->bindParam('id_cargo',$professionalPosition, PDO::PARAM_INT);
        $stmt2->bindParam('nombre',$name, PDO::PARAM_STR);
        $stmt2->bindParam('lastname',$lastName, PDO::PARAM_STR);
        $stmt2->bindParam('mail', $mail, PDO::PARAM_STR);
        $stmt2->bindParam('center', $center, PDO::PARAM_STR);
        $stmt2->execute();
    
        if($stmt->rowCount() > 0 || $stmt2->rowCount() > 0){
            echo "<script> window.location.href = './../view/login.php';</script>";
            $pdo->commit();
        }
    }    
} catch (PDOException $ex) {
    echo $ex->getMessage();
    $pdo->rollBack();

}finally{
    $pdo = null;
}


?>