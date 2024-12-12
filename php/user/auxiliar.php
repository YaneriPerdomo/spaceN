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
                     <i class="bi bi-gem fs-1"></i>
                 </div>
                 <div class="time">
                     <div>
                         <span class="fs-3">{$arrayAssociative['tiempo']}</span>
                     </div>
                     <i class="bi-stopwatch-fill fs-1"></i>
                 </div>
                 <div class="porcentage">
                     <div>
                         <span class="fs-3">{$arrayAssociative['porcentaje']}%</span>
                     </div>
                     <i class="bi-bar-chart fs-1"></i>
                 </div>
             </div>        
     HTML;

        return $html;

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

}


?>