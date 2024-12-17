<?php
function showLessons()
{

    include './../../../php/connectionBD.php';

    $id_usuario = $_SESSION["id_user"];
    $SqlLessons = "SELECT  id_leccion , completado from estado_lecciones WHERE id_usuario = :id_usuario";
    $queryLessons = $pdo->prepare($SqlLessons);
    $queryLessons->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
    $queryLessons->execute();
    $lessons = $queryLessons->fetchAll(PDO::FETCH_ASSOC);
    function validationURL($status)
    {
        return $dataEnter = match ($status) {
            'bloqueado' => "data-enter='false'",
            'completado' => "data-enter='true'",
            'en_espera' => "data-enter='true'",
        };
    }
    function validationIcon($status)
    {
        return $dataEnter = match ($status) {
            'bloqueado' => "bi bi-lock fs-1",
            'completado' => "bi bi-check fs-1",
            'en_espera' => "bi bi-hourglass-top fs-1",
        };
    }

    function validationFilter($status)
    {
        return $status == "bloqueado" ? "filterGrayscale" : "";
    }
    $arreglo_indexado = array_column($lessons, "completado");

    echo "  <article class='moduleOne'>
<strong class='fs-3'>Módulo 1: Fundamentos Numéricos</strong>
<section class='theContent'>
    <section class='temaOneInformation'>
        <span><b>Tema 1: Conceptos básicos:</b> </span>
        <div class='d-flex flex-direction-row gap-4 lessons'>
            <div class='one p-1 my-3 " . validationFilter($arreglo_indexado[0]) . "'>
                <a  draggable='false' href='./moduleOne/topicOne/lesson1.php?statu=". $arreglo_indexado[0]." ' " . validationURL($arreglo_indexado[0]) . "
                    title='Asociación de cantidad con objetos: ejercicios de contar objetos de diferentes tipos y tamaños.'>
                    <div class='img'>
                        <i class='" . validationIcon($arreglo_indexado[0]) . "'></i>
                    </div>
                    <div class='titleLesson mt-2'>
                        <small draggable='false'>Asociación de cantidad </small>
                    </div>

                </a>
            </div>
            <div class='two p-1 my-3 " . validationFilter($arreglo_indexado[1]) . "'>
                <a draggable='false' href='./moduleOne/topicOne/lesson2.php?statu=". $arreglo_indexado[1]." ' " . validationURL($arreglo_indexado[1]) . "
                    title='Comparación de cantidades: actividades para identificar 'más', 'menos' e 'igual'.'>
                    <div class='img'>
                        <i class='" . validationIcon($arreglo_indexado[1]) . "'></i>
                    </div>
                    <div class='titleLesson mt-2'>
                        <small draggable='false'>Comparación de <br>cantidades</small>
                    </div>

                </a>
            </div>
        </div>
    </section>
    <section class='temaTwoInformation'>
        <span><b>Tema 2: Introducción a los números:</b> </span>
        <div class='d-flex flex-direction-row gap-4 lessons'>
            <div class='one p-1 my-3 " . validationFilter($arreglo_indexado[2]) . "'>
                <a draggable='false' href='./moduleOne/topicTwo/lesson1.php?statu=". $arreglo_indexado[2]." ' " . validationURL($arreglo_indexado[2]) . "
                    title='Reconocimiento de números: ejercicios de identificación visual y auditiva.'>
                    <div class='img'>
                        <i class='" . validationIcon($arreglo_indexado[2]) . "'></i>
                    </div>
                    <div class='titleLesson mt-2'>
                        <small draggable='false'>Reconocimiento <br>de números 1</small>
                    </div>

                </a>
            </div>
            <div class='two p-1 my-3 " . validationFilter($arreglo_indexado[3]) . "'>
                <a draggable='false' href='./moduleOne/topicTwo/lesson3.php?statu=". $arreglo_indexado[3]." ' " . validationURL($arreglo_indexado[3]) . "
                    title='Escritura de números: actividades para practicar la escritura de números.'>
                    <div class='img'>
                        <i class='" . validationIcon($arreglo_indexado[3]) . "'></i>
                    </div>
                    <div class='titleLesson mt-2'>
                    <small draggable='false'>Reconocimiento <br> de números 2</small>
                    </div>

                </a>
            </div>
        </div>
    </section>
</section>
</article>";


    $pdo = null;
}
?>