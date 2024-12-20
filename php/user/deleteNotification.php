<?php
       
    include './../validations/authorizedChild.php';
    include './../connectionBD.php';
    if ($pdo->errorCode() != 0) {
        echo "Error de conexión: " . $pdo->errorInfo()[2];
    }
    $id_notification = $_GET["id"];
    
    $accessLevel = $_SESSION["accessLevel"]; 
    $accessLevelURL = match ($accessLevel) {
        '1' => 'preNumerical',
        '2' => 'numericoEmerging',
        '3' => 'numericalDevelopment',
    };
    try {
        $sqlDeleteNotification = "DELETE FROM notificaciones WHERE id_notificacion = :idN";
        $query = $pdo->prepare($sqlDeleteNotification);
        $query->bindParam('idN', $id_notification, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() > 0){
            echo "<script>alert('Notificacion eliminada con exito'); window.location.href = './../../view/user/$accessLevelURL/notification.php';</script>";
        }else{
            echo "Ocurrio un error";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    

?>