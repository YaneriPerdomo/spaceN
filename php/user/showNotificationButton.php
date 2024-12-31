<?php
 include './../../php/connectionBD.php';

 session_start();

if ($pdo->errorCode() != 0) {
    echo "Error de conexión: " . $pdo->errorInfo()[2];
    return; 
}


$id_Child = $_SESSION["id_Child"];
    $inicio = $_POST["inicio"];

// Obtener el total de mensajes
$sqlCountHistorial = "SELECT count(mensaje) AS mensajes FROM notificaciones WHERE id_nino = :id";
$queryCount = $pdo->prepare($sqlCountHistorial);
$queryCount->bindParam('id', $id_Child, PDO::PARAM_INT);
$queryCount->execute();
$resultsCount = $queryCount->fetch(PDO::FETCH_ASSOC); // Obtener solo el primer resultado
$totalMensajes = $resultsCount['mensajes'];

// Obtener los siguientes 2 mensajes
$sqlHistorial = "SELECT id_notificacion, mensaje, fecha_hora_envio from notificaciones WHERE id_nino = :id  ORDER by fecha_hora_envio DESC LIMIT 4 OFFSET :offs ";
$query = $pdo->prepare($sqlHistorial);
$query->bindParam('id', $id_Child, PDO::PARAM_INT);
$query->bindParam('offs', $inicio, PDO::PARAM_INT);
$query->execute();



if ($query->rowCount() > 0) {
    $resultadosJSON = json_encode($query->fetchAll(PDO::FETCH_ASSOC));
    // Enviar el encabezado y los datos
    header('Content-Type: application/json');
    echo $resultadosJSON;
} else {
    $error = array('statu' => true);
    $resultJson = json_encode($error);
    header('Content-Type: application/json');
    echo $resultJson;
}


?>