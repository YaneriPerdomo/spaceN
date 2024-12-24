<?php
function showLessons($accessLevel)
{
try {
    
    include './../../../php/connectionBD.php';

    
    $id_usuario = $_SESSION["id_user"];
    $SqlLessons = "SELECT  id_leccion , completado from estado_lecciones WHERE id_usuario = :id_usuario ";

    $queryLessons = $pdo->prepare($SqlLessons);
    $queryLessons->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
    $queryLessons->execute();
    $lessons = $queryLessons->fetchAll(PDO::FETCH_ASSOC);
    function validationURL($status){
        return $dataEnter = match ($status) {
            'bloqueado' => "data-enter='false'",
            'completado' => "data-enter='true'",
            'en_espera' => "data-enter='true'",
        };
    }
    function validationIcon($status){
        return $dataEnter = match ($status) {
            'bloqueado' => "bi bi-lock fs-1",
            'completado' => "bi bi-check fs-1",
            'en_espera' => "bi bi-hourglass-top fs-1",
        };
    }

    switch ($accessLevel) {
        case '1':
            $lessonsInformation = [
                "modulo" => ["Módulo 1: Fundamentos Numéricos",],
                "tema" => ["Tema 1: Conceptos básicos", "Tema 2: Introducción a los números"],
                "titleLesson" => [
                    "Asociación de cantidad",
                    "  Comparación de cantidades",
                    " Reconocimiento de números 1",
                    " Reconocimiento de números 2"
                ],
                "moreDetails" => [
                    "Ejercicios de contar objetos de diferentes tipos",
                    "Actividades para identificar 'más', 'menos' e 'igual'",
                    "Ejercicios de identificación visual",
                    "Ejercicios de identificación auditiva"
                ],
            ];
            break;
        case '2':
            $lessonsInformation = [
                "modulo" => ["Módulo 1: Ampliando el Concepto de Número",],
                "tema" => ["Tema 1: Conteo", "Tema 2: Operaciones basicas"],
                "titleLesson" => ["Conteo hacia adelante", "Conteo con <br>objetos", "Suma y resta con objetos", "Problemas <br>sencillos"],
                "moreDetails" => [
                    "Ejercicios de contar desde un numero inicial",
                    "Actividades para comprender las cantidades con objetos",
                    "Ejercicios manipulativos para visualizar las operaciones",
                    "Resolución de problemas contextualizados"
                ],
            ];
            break;
            case '3':
                $lessonsInformation = [
                    "modulo" => ["Módulo 1:  	Desarrollo de Habilidades Numéricas",],
                    "tema" => ["Tema 1: Operaciones avanzadas:", "Tema 2: Fracciones"],
                    "titleLesson" => ["Multiplicación y división", "Problemas más complejos", "Concepto de fracción", "Comparación de fracciones"],
                    "moreDetails" => [
                        "Introducción a los conceptos básicos",
                        "Resolución de problemas que involucran múltiples operaciones",
                        "Representación gráfica y manipulativa",
                        "Ejercicios para identificar fracciones equivalentes y ordenarlas"
                    ],
                ];
                break;
        default:
            break;
    }

    function validationFilter($status){
        return $status == "bloqueado" ? "filterGrayscale" : "";
    }
    $arreglo_indexado = array_column($lessons, "completado");

    echo "
    <article class='moduleOne'>
        <strong class='fs-3'>" . $lessonsInformation["modulo"][0] . "</strong>
        <section class='theContent'>
            <section class='temaOneInformation'>
                <span><b>" . $lessonsInformation["tema"][0] . " </b></span>
                <div class='d-flex flex-direction-row gap-4 lessons'>
                    <div class='one p-1 my-3 " . validationFilter($arreglo_indexado[0]) . "'>
                        <a draggable='false' href='./moduleOne/topicOne/lesson1.php?statu=" . $arreglo_indexado[0] . " ' " . validationURL($arreglo_indexado[0]) . " 
                            title='" . $lessonsInformation["moreDetails"][0] . " '>
                            <div class='img'>
                                <i class='" . validationIcon($arreglo_indexado[0]) . "'></i>
                            </div>
                            <div class='titleLesson mt-2'>
                                <small draggable='false'>" . $lessonsInformation["titleLesson"][0] . " </small>
                            </div>
                        </a>
                    </div>
                    <div class='two p-1 my-3 " . validationFilter($arreglo_indexado[1]) . "'>
                        <a draggable='false' href='./moduleOne/topicOne/lesson2.php?statu=" . $arreglo_indexado[1] . " ' " . validationURL($arreglo_indexado[1]) . " 
                            title='" . $lessonsInformation["moreDetails"][1] . " '>
                            <div class='img'>
                                <i class='" . validationIcon($arreglo_indexado[1]) . "'></i>
                            </div>
                            <div class='titleLesson mt-2'>
                                <small draggable='false'>" . $lessonsInformation["titleLesson"][1] . " </small>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class='temaTwoInformation'>
                <span><b>" . $lessonsInformation["tema"][1] . " </b></span>
                <div class='d-flex flex-direction-row gap-4 lessons'>
                    <div class='one p-1 my-3 " . validationFilter($arreglo_indexado[2]) . "'>
                        <a draggable='false' href='./moduleOne/topicTwo/lesson1.php?statu=" . $arreglo_indexado[2] . " ' " . validationURL($arreglo_indexado[2]) . " 
                            title='" . $lessonsInformation["moreDetails"][2] . " '>
                            <div class='img'>
                                <i class='" . validationIcon($arreglo_indexado[2]) . "'></i>
                            </div>
                            <div class='titleLesson mt-2'>
                                <small draggable='false'>" . $lessonsInformation["titleLesson"][2] . "</small>
                            </div>
                        </a>
                    </div>
                    <div class='two p-1 my-3 " . validationFilter($arreglo_indexado[3]) . "'>
                        <a draggable='false' href='./moduleOne/topicTwo/lesson2.php?statu=" . $arreglo_indexado[3] . " ' " . validationURL($arreglo_indexado[3]) . " 
                            title='" . $lessonsInformation["moreDetails"][3] . " '>
                            <div class='img'>
                                <i class='" . validationIcon($arreglo_indexado[3]) . "'></i>
                            </div>
                            <div class='titleLesson mt-2'>
                                <small draggable='false'>" . $lessonsInformation["titleLesson"][3] . "</small>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </section>
    </article>
    ";

} catch (PDOException $ex) {
    echo "Error en la base de datos: " . $ex->getMessage();
}finally{
        $pdo = null;
}
}
?>