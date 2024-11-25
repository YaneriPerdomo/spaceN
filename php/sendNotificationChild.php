<?php
session_start();

    include './connectionBD.php';

    $id_child = $_POST["id_child"];
    $id_profesional = $_SESSION["id_admin"];
    $messenger = $_POST["messenger"];

    $sqlNotificacion = "INSERT INTO notificaciones (id_nino, id_profesional, mensaje,fecha_hora_envio, estado) 
    VALUES (
    :id_child, 
    :id_profesionaL, 
    :messenger,
    NOW(),
    'pendiente'
    )";

    $stmt = $pdo->prepare($sqlNotificacion);
    $stmt->bindParam('id_child',$id_child,PDO::PARAM_INT);
    $stmt->bindParam('id_profesional',$id_profesional,PDO::PARAM_INT);
    $stmt->bindParam('messenger',$messenger,PDO::PARAM_STR);

    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo "notifiacion enviada";
    }

?>