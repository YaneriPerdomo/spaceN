<?php

// Función para obtener los datos de la lección solicitada y generar el HTML correspondiente

function getLessonData($idUser, $idlesson)
{
    try {
        include '../../../../../php/connectionBD.php';
        $sqlValidationURL = "SELECT completado, porcentaje, diamantes_obtenidos, tiempo 
    FROM estado_lecciones WHERE id_usuario = :id_usuario
    AND id_leccion = :idLesson";
        $query = $pdo->prepare($sqlValidationURL);
        $query->bindParam("id_usuario", $idUser, PDO::PARAM_INT);
        $query->bindParam("idLesson", $idlesson, PDO::PARAM_INT);
        $query->execute();

        $arrayAssociative = $query->fetch(PDO::FETCH_ASSOC);

        $statuURL = $_GET["statu"];

        if ($statuURL !== $arrayAssociative["completado"]) {
            echo "Se ha producido un error debido al cambio de estado en la URL de la lección.";
            exit();
        }

        $html = <<<HTML
              <div class="flexComun gap-3">
                 <div class="gem">
                     <div>
                         <span class="fs-3">{$arrayAssociative['diamantes_obtenidos']}</span>
                     </div>
                     <i class="bi bi-gem fs-2"></i>
                 </div>
                 <div class="time">
                     <div>
                         <span class="fs-3">{$arrayAssociative['tiempo']}</span>
                     </div>
                     <i class="bi-stopwatch-fill fs-2"></i>
                 </div>
                 <div class="porcentage">
                     <div>
                         <span class="fs-3">{$arrayAssociative['porcentaje']}%</span>
                     </div>
                     <i class="bi-bar-chart fs-2"></i>
                 </div>
             </div>        
     HTML;

        return $html;

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

}


//Función para generar un historial de la plataforma teniendo en cuenta el estado de la lección del niño
function addHistory( $statu)
{
    include './../connectionBD.php';
    $sqlHistorial = "INSERT INTO historiales (id_nino, id_profesional, mensaje, fecha_hora)
    VALUES (:id_child, :id_profesional, :mensaje, NOW() )";

    $message = match ($statu) {
        'completed' => $_SESSION['user'] . " ha completado la lección: '" . $leccion . "', sobre el tema '" . $tema . "'",
        'completeTotal' => $_SESSION['user'] . " ha finalizado el módulo: '" . $modulo . "'",
        'awaiting' => $_SESSION['user'] . " ha completado de nuevo la lección: '" . $leccion . "', sobre el tema '" . $tema . "'",
    };

    $queryHistorial = $pdo->prepare($sqlHistorial);
    $queryHistorial->bindParam('id_child', $_SESSION["id_Child"], PDO::PARAM_INT);
    $queryHistorial->bindParam('id_profesional', $_SESSION["id_profesional"], PDO::PARAM_INT);
    $queryHistorial->bindParam('mensaje', $message, PDO::PARAM_STR);
    $queryHistorial->execute();

}

?>