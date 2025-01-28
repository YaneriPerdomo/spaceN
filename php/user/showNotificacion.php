<?php
include './../../../php/connectionBD.php';
if ($pdo->errorCode() != 0) {
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    return;
}

$id_Child = $_SESSION["id_Child"];
$inicio = 0;

// Obtener el total de mensajes
$sqlCountHistorial = "SELECT count(mensaje) AS mensajes FROM notificaciones WHERE id_nino = :id";
$queryCount = $pdo->prepare($sqlCountHistorial);
$queryCount->bindParam('id', $id_Child, PDO::PARAM_INT);
$queryCount->execute();
$resultsCount = $queryCount->fetch(PDO::FETCH_ASSOC); // Obtener solo el primer resultado
$totalMensajes = $resultsCount['mensajes'];

$sqlUpdate = "UPDATE notificaciones SET estado = 'leido' WHERE id_nino = :idChild";
$queryUpdateN = $pdo->prepare($sqlUpdate);
$queryUpdateN->bindParam('idChild', $id_Child , PDO::PARAM_INT);
$queryUpdateN->execute();

// Obtener los siguientes 2 mensajes
$sqlHistorial = "SELECT id_notificacion, mensaje, fecha_hora_envio from notificaciones WHERE id_nino = :id ORDER by fecha_hora_envio DESC LIMIT 4   ";
$query = $pdo->prepare($sqlHistorial);
$query->bindParam('id', $id_Child, PDO::PARAM_INT);
$query->execute();

if ($query->rowCount() > 0) {
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo " <div class='results' data-limit='4'>";
    foreach ($results as $value) {
        echo "
              <div class='d-flex'>
        <div>
            <img src='../../../img/admin/childs-and-teacher.png' style='width: 100px;'>
        </div>
        <div style='  flex-grow: 1;'>
            <strong> Administrador </strong><br>
            <p class='m-0'>
                " . $value["mensaje"] . "
            </p>
            <small  style='color: #6f6f6f;'> " . $value["fecha_hora_envio"] . " </small>
        </div>
        <div>
            <a href='./../../../php/user/deleteNotification.php?id=" . $value["id_notificacion"] . "'>
                <i class='bi bi-x-lg'></i>
            </a>
        </div>
    </div>
<hr>";
    }
    echo '</div>';
    // Verificar si hay más mensajes para mostrar
    if ($inicio + 4 < $totalMensajes) {
        echo "<small class='show'> <a href=''> Mostrar más </a></small>";
    }
} else {

    echo "<div> No se han encontrado historiales registrados </div>";
}
?>