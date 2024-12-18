<?php
include './../validations/authorizedChild.php';
include './../connectionBD.php';
if (isset($statu)) {
    echo "No se ha reconocido el estado de la lección";
    exit();
}

$idUser = $_SESSION["id_user"];
$idLesson = $_POST["id_lesson"];
$statu = $_POST["statu"];
$porcentaje = $_POST["porcentage"];
$gems = $_POST["gems"];
$time = $_POST["time"];
$failed = $_POST["failed"];
$tema = $_POST["tema"];
$leccion = $_POST["lesson"];
$modulo = $_POST["modulo"];

try {

    switch ($statu) {
        case 'en_espera':


            $sqlHistorial = "INSERT INTO historiales (id_nino, id_profesional, mensaje, fecha_hora)
        VALUES (:id_child, :id_profesional, :mensaje, NOW() )";


            $mensaje = $_SESSION['user'] . " ha completado la lección: '" . $leccion . "', sobre el tema '" . $tema . "'";
            $queryHistorial = $pdo->prepare($sqlHistorial);
            $queryHistorial->bindParam('id_child', $_SESSION["id_Child"], PDO::PARAM_INT);
            $queryHistorial->bindParam('id_profesional', $_SESSION["id_profesional"], PDO::PARAM_INT);
            $queryHistorial->bindParam('mensaje', $mensaje, PDO::PARAM_STR);
            $queryHistorial->execute();


            $sqlComplete = "UPDATE estado_lecciones SET completado='completado' WHERE id_usuario = :id_user AND id_leccion = :id_lesson";
            $query01 = $pdo->prepare($sqlComplete);
            $query01->bindParam('id_user', $idUser, PDO::PARAM_INT);
            $query01->bindParam('id_lesson', $idLesson, PDO::PARAM_INT);
            $query01->execute();
            $sqlWait = "UPDATE estado_lecciones
    SET
    porcentaje = :porcentage,
    diamantes_obtenidos = :gems,
    tiempo = :timeV,
    fallida = :failed
     WHERE id_usuario = :id_user AND id_leccion = :id_lesson
    ";
            $queryWait = $pdo->prepare(query: $sqlWait);
            $queryWait->bindParam('id_user', $idUser, PDO::PARAM_INT);
            $queryWait->bindParam('id_lesson', $idLesson, PDO::PARAM_INT);
            $queryWait->bindParam('porcentage', $porcentaje, PDO::PARAM_INT);
            $queryWait->bindParam('gems', $gems, PDO::PARAM_INT);
            $queryWait->bindParam('timeV', $time, PDO::PARAM_STR);
            $queryWait->bindParam('failed', $failed, PDO::PARAM_INT);
            $queryWait->execute();
            $nextLesson = $idLesson + 1;

           
            if ($nextLesson <= 4) {
                $sqlNext = "UPDATE estado_lecciones
        SET 
        completado = 'en_espera'
         WHERE id_usuario = :id_user AND id_leccion = :id_lesson
        ";
                $queryNext = $pdo->prepare($sqlNext);
                $queryNext->bindParam('id_user', $idUser, PDO::PARAM_INT);
                $queryNext->bindParam('id_lesson', $nextLesson, PDO::PARAM_INT);
                $queryNext->execute();

                $sqlSelectProgressNow = "SELECT porcentaje, total_diamantes from 
progresos WHERE id_usuario =:id_user";
                $querySelectProgressNow = $pdo->prepare($sqlSelectProgressNow);
                $querySelectProgressNow->bindParam("id_user", $idUser, PDO::PARAM_INT);
                $querySelectProgressNow->execute();
                $resultSelect = $querySelectProgressNow->fetch(PDO::FETCH_ASSOC);
                $porcentajeTotal = $resultSelect["porcentaje"] + 25;
                $totalDiamantes = $resultSelect["total_diamantes"] + $gems;
                $sqlUpdateProgress = "UPDATE progresos SET 
porcentaje = :porcentageTotal,
total_diamantes = :gemsT
WHERE id_usuario = :id_user
";
                $queryUpdateProgress = $pdo->prepare($sqlUpdateProgress);
                $queryUpdateProgress->bindParam("porcentageTotal", $porcentajeTotal, PDO::PARAM_INT);
                $queryUpdateProgress->bindParam("gemsT", $totalDiamantes, PDO::PARAM_INT);
                $queryUpdateProgress->bindParam("id_user", $idUser, PDO::PARAM_INT);
                $queryUpdateProgress->execute();

                if ($queryWait->rowCount() > 0 && $queryNext->rowCount() > 0 && $queryUpdateProgress->rowCount() > 0) {
                    echo "ya no espera Has completado esta leccion";
                } else {
                    echo "oh no , ha ocurrido un error";
                }
            } else {
                
            $sqlHistorial = "INSERT INTO historiales (id_nino, id_profesional, mensaje, fecha_hora)
            VALUES (:id_child, :id_profesional, :mensaje, NOW() )";
    
                $mensaje2 = $_SESSION['user'] . " ha finalizado el modulo: '" . $modulo. "";
                $queryHistorial2 = $pdo->prepare($sqlHistorial);
                $queryHistorial2->bindParam('id_child', $_SESSION["id_Child"], PDO::PARAM_INT);
                $queryHistorial2->bindParam('id_profesional', $_SESSION["id_profesional"], PDO::PARAM_INT);
                $queryHistorial2->bindParam('mensaje', $mensaje2, PDO::PARAM_STR);
                $queryHistorial2->execute();
    
    
                $sqlSelectProgressNow = "SELECT total_diamantes from 
progresos WHERE id_usuario =:id_user";
                $querySelectProgressNow = $pdo->prepare($sqlSelectProgressNow);
                $querySelectProgressNow->bindParam("id_user", $idUser, PDO::PARAM_INT);
                $querySelectProgressNow->execute();
                $resultSelect = $querySelectProgressNow->fetch(PDO::FETCH_ASSOC);
                $totalDiamantes = $resultSelect["total_diamantes"] + $gems;
                $sqlUpdateProgress = "UPDATE progresos SET 
total_diamantes = :gemsT
WHERE id_usuario = :id_user
";
                $queryUpdateProgress = $pdo->prepare($sqlUpdateProgress);
                $queryUpdateProgress->bindParam("gemsT", $totalDiamantes, PDO::PARAM_INT);
                $queryUpdateProgress->bindParam("id_user", $idUser, PDO::PARAM_INT);
                $queryUpdateProgress->execute();

                if ($queryWait->rowCount() > 0 && $queryUpdateProgress->rowCount() > 0) {
                    echo "Has completado esta leccion";
                } else {
                    echo "oh no , ha ocurrido un error";
                }
            }

            break;
        case "completado":


            $sqlHistorial = "INSERT INTO historiales (id_nino, id_profesional, mensaje, fecha_hora)
                VALUES (:id_child, :id_profesional, :mensaje, NOW() )";


            $mensaje = $_SESSION['user'] . " ha completado de nuevo la lección: '" . $leccion . "', sobre el tema '" . $tema . "'";
            $queryHistorial = $pdo->prepare($sqlHistorial);
            $queryHistorial->bindParam('id_child', $_SESSION["id_Child"], PDO::PARAM_INT);
            $queryHistorial->bindParam('id_profesional', $_SESSION["id_profesional"], PDO::PARAM_INT);
            $queryHistorial->bindParam('mensaje', $mensaje, PDO::PARAM_STR);
            $queryHistorial->execute();


            $sqlComplete = "UPDATE estado_lecciones
                SET 
                porcentaje = :porcentage,
                diamantes_obtenidos = :gems,
                tiempo = :timeV,
                fallida = :failed
                 WHERE id_usuario = :id_user AND id_leccion = :id_lesson
                ";
            $queryCompleta = $pdo->prepare($sqlComplete);
            $queryCompleta->bindParam('id_user', $idUser, PDO::PARAM_INT);
            $queryCompleta->bindParam('id_lesson', $idLesson, PDO::PARAM_INT);
            $queryCompleta->bindParam('porcentage', $porcentaje, PDO::PARAM_INT);
            $queryCompleta->bindParam('gems', $gems, PDO::PARAM_INT);
            $queryCompleta->bindParam('timeV', $time, PDO::PARAM_STR);
            $queryCompleta->bindParam('failed', $failed, PDO::PARAM_INT);
            $queryCompleta->execute();

            $sqlSelectProgressNow = "SELECT  total_diamantes from 
            progresos WHERE id_usuario =:id_user";
            $querySelectProgressNow = $pdo->prepare($sqlSelectProgressNow);
            $querySelectProgressNow->bindParam("id_user", $idUser, PDO::PARAM_INT);
            $querySelectProgressNow->execute();
            $resultSelect = $querySelectProgressNow->fetch(PDO::FETCH_ASSOC);
            $totalDiamantes = $resultSelect["total_diamantes"] + $gems;
            $sqlUpdateProgress = "UPDATE progresos SET 
                total_diamantes = :gemsT
                WHERE id_usuario = :id_user
            ";
            $queryUpdateProgress = $pdo->prepare($sqlUpdateProgress);
            $queryUpdateProgress->bindParam("gemsT", $totalDiamantes, PDO::PARAM_INT);
            $queryUpdateProgress->bindParam("id_user", $idUser, PDO::PARAM_INT);
            $queryUpdateProgress->execute();

            if ($queryUpdateProgress->rowCount() > 0 && $queryCompleta->rowCount() > 0) {
                echo "Has completado esta leccion";
            } else {
                echo "oh no , ha ocurrido un error";
            }


            break;

        default:
            # code...
            break;
    }

} catch (PDOException $ex) {
    echo $ex->getMessage();
}

$pdo = null;

?>