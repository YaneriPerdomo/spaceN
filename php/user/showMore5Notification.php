<?php
session_start();

    
include './../connectionBD.php';

if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje con el detalle del error
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    // Aquí podrías agregar lógica adicional para manejar el error, como redirigir a una página de error o enviar un correo electrónico al administrador.
}

try {
    $id_Child = $_SESSION["id_Child"];
    $inicio = $_GET["inicio"];
    $sqlNotificacion = "SELECT id_notificacion, mensaje, fecha_hora_envio from notificaciones WHERE 
    id_nino = :id limit :inicio , 2";
    $query = $pdo->prepare($sqlNotificacion);
    $query->bindParam('id',$id_Child,PDO::PARAM_INT);
    $query->bindParam('inicio',$inicio,PDO::PARAM_INT);

    $query->execute();
    if($query->rowCount() > 0){

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as  $value) {
            echo "
                    <div class='d-flex'>
                    <div>
                        <img src='../../../img/for/representative.png'>
                    </div>
                    <div style='  flex-grow: 1;'>
                        <strong> Administrador </strong><br>
                        <p class='m-0'>
                            ". $value["mensaje"] ."
                        </p>
                        <small  style='color: #6f6f6f;'> ". $value["fecha_hora_envio"]. " </small>
                    </div>
                    <div>
                        <a href='./../../../php/user/deleteNotification.php?id=". $value["id_notificacion"] ."'>
                            <i class='bi bi-x-lg'></i>
                        </a>
                    </div>
                    </div>
            ";
        }
    }
    else{
        echo 'Por los momentos no hay notificaciones';
    }

} catch (PDOException $ex) {
    echo "Sucedio un error: " . $ex->getMessage();
}

$pdo = null;
?>