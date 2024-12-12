<?php
$data = json_decode(file_get_contents('php://input'), true);
//json_decode La función que convierte el JSON en un valor de PHP.
//file_get_contents lee todos  los datos   del cuerpo de la solicitud.

$id_lesson = $data['id_lesson'];
$gems = $data['gems'];
$time = $data['time'];
$porcentage = $data['porcentage'];


$hours = substr($time, 0, 2);
$minutes = substr($time, 2, 2);
$seconds = substr($time, 4, 2);

// Formatear la cadena
$formattedTime = "$hours:$minutes:$seconds";
echo $formattedTime;

?>