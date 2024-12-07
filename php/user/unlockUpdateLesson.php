<?php

include './../connectionBD.php';
if (isset($statu)) {
    echo "No se ha reconocido el estado de la lección";
    exit();
}
$idUser = $_POST["id_usuario"];
$idLesson = $_POST["id_leccion"];
$statu = $_GET["statu"];
$porcentaje = $_POST["porcentage"];
$gems = $_POST["gems"];
$time = $_POST["time"];
$failed = $_POST["failed"];
switch ($statu) {
    case 'en_espera':
        $sqlWait = "UPDATE desbloqueos_lecciones
                    SET 
                    completado = 'completado',
                    porcentaje = :porcentage,
                    diamantes_obtenidos = :gems,
                    velocidad = :timeV,
                    fallido = :failed
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
        if ($nextLesson < 4) {
            $sqlNext = "UPDATE desbloqueos_lecciones
                        SET 
                        completado = 'en_espera'
                         WHERE id_usuario = :id_user AND id_leccion = :id_lession
                        ";
            $queryNext = $pdo->prepare($sqlNext);
            $queryNext->bindParam('id_user', $idUser, PDO::PARAM_INT);
            $queryNext->bindParam('id_lesson', $idLesson, PDO::PARAM_INT);
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
                echo "Has completado esta leccion";
            } else {
                echo "oh no , ha ocurrido un error";
            }
        } else {
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
    case "completado":

        $sqlComplete = "UPDATE desbloqueos_lecciones
            SET 
            porcentaje = :porcentage,
            diamantes_obtenidos = :gems,
            velocidad = :timeV,
            fallido = :failed
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

        $nextLesson = $idLesson + 1;
        if ($nextLesson < 4) {
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

            if ($queryWait->rowCount() > 0 && $queryUpdateProgress->rowCount() > 0) {
                echo "Has completado esta leccion";
            } else {
                echo "oh no , ha ocurrido un error";
            }
        } else {
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

    default:
        # code...
        break;
}
$pdo = null;
