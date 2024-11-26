<?php 

    
session_start();

// Incluimos el archivo donde se establece la conexión a la base de datos
include "./connectionBD.php";

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_childC = $_POST["id_childC"];
    $id_childU = $_POST["id_childU"];
    $sqlDeleteChild = "DELETE FROM ninos WHERE `ninos`.`id_nino` = :id_usuario";
    $stmt = $pdo->prepare($sqlDeleteChild);
    $stmt->bindParam(':id_usuario', $id_childC, PDO::PARAM_INT);
    $stmt->execute();

    $sqlDeleteChildN = "DELETE FROM notificaciones WHERE `id_nino` = :id_usuario";
    $stmt3 = $pdo->prepare($sqlDeleteChildN);
    $stmt3->bindParam(':id_usuario', $id_childC, PDO::PARAM_INT);
    $stmt3->execute();

    $sqlDeleteUser = "DELETE FROM usuarios WHERE `usuarios`.`id_usuario` = :id_usuario";
    $stmt2 = $pdo->prepare($sqlDeleteUser);
    $stmt2->bindParam(':id_usuario', $id_childU, PDO::PARAM_INT);
    $stmt2->execute();

    if(($stmt->rowCount() > 0 && $stmt2->rowCount() > 0) || $stmt3->rowCount() > 0){
        echo "nino eliminado";
    }

    $pdo = null;
}
?>