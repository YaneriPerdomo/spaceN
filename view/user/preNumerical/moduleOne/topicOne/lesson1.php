<?php

include './../../../../../php/validations/authorizedChild.php';
include './../../../../../php/connectionBD.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lección 3 | Eres capaz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://pie-meister.github.io/PieMeister-with-Progress.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../../../css/reset.css">
    <link rel="stylesheet" href="../../../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../../../css/components/header.css">
    <link rel="stylesheet" href="../../../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../../../css/components/table.css">
    <link rel="stylesheet" href="../../../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../../../../css/components/row.css">
    <link rel="stylesheet" href="../../../../../css/user/lesson.css">
</head>

<body>

    <?php
    include '../../../../include/user/lesson/header.php'
        ?>

    <main>
        <div class="containerPlay">
            <section>
                <div class="activityContainer">
                    <div class="Back">
                        <button class=" ">
                            <i class="modalWindowBack bi bi-arrow-left-square-fill fs-1"></i>
                        </button>
                    </div>
                    <div class="aim" style="flex-grow:2">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex detalls">
                                <figure class="m-0">
                                    <img src="../../../../../img/childs/boy.png" class="img-fluid imgEresCapaz" alt="">
                                </figure>
                                <div class="objetivo">
                                    <p class="m-0">Selecciona el número que verás en el recuadro</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gem">
                        <div>
                            <span class="fs-3">0</span>
                        </div>
                        <i class="bi bi-gem fs-2"></i>
                    </div>
                    <div class="time">
                        <div>
                            <span class="fs-3" id="time">00:00:00</span>
                        </div>
                        <i class="bi bi-stopwatch-fill fs-2"></i>
                    </div>
                </div>
                </script>
            </section>
            <main class="play">
                <div class="row w-100 h-100">
                    <div class="col-12 align-items-center justify-content-center d-flex">
                        <div class="containerPlayer align-items-center justify-content-center" data-num="3">
                            <div class="showNumber">
                                <strong>
                                    <span>?</span>
                                    <span>?</span>
                                    <span>?</span>
                                </strong>
                            </div>
                            <div class="ButtonsNum">
                                <button><</button>
                                <button>=</button>
                                <button>></button>
                            </div>
                        </div><br>
                    </div>
                </div>
            </main>
            <?php
            include '../../../../include/user/lesson/modalWindows/begin.php';
            include '../../../../include/user/lesson/modalWindows/FromOneToThree.php';
            include '../../../../include/user/lesson/modalWindows/back.php';
            include '../../../../include/user/lesson/modalWindows/guide.php';
            include '../../../../include/user/lesson/modalWindows/containerResultsLesson.php';
            ?>
        </div>
    </main>

    <?php
    include '../../../../include/user/lesson/sounds.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <?php
    include '../../../../include/footer.php';
    include '../../../../include/user/lesson/offcanvasAplication.php';
    include '../../../../include/user/lesson/offcanvasUser.php';
    ?>

<script src="../../../../../js/user/preNumeric/topicOne/lesson02.js" 
        type="module">
    </script>
</body>

</html>