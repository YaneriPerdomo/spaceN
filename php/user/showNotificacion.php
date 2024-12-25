<?php

    
include './../../../php/connectionBD.php';


try {
    $id_Child = $_SESSION["id_Child"];

    $sqlNotificacion = "SELECT id_notificacion, mensaje, fecha_hora_envio FROM notificaciones WHERE 
    id_nino = :id ORDER BY fecha_hora_envio DESC";
    $query = $pdo->prepare($sqlNotificacion);
    $query->bindParam('id',$id_Child,PDO::PARAM_INT);
    $query->execute();

    if($query->rowCount() > 0){
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $sqlUpdate = "UPDATE notificaciones SET estado = 'leido' WHERE id_nino = :idChild";
        $queryUpdateN = $pdo->prepare($sqlUpdate);
        $queryUpdateN->bindParam('idChild', $id_Child , PDO::PARAM_INT);
        $queryUpdateN->execute();
        foreach ($results as $value) {
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
                <hr>
            ";
        }
    }
    else{
        echo 'Por los momentos no hay notificaciones';
    }

} catch (PDOException $ex) {
    echo "Sucedio un error en la base de datos: " . $ex->getMessage();
}finally{
    $pdo = null;
}

?>