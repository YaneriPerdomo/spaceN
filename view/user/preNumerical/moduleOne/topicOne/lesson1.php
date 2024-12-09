<?php

include './../../../../../php/validations/authorizedChild.php';
include './../../../../../php/connectionBD.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lección 1 | Eres capaz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://pie-meister.github.io/PieMeister-with-Progress.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../../../css/reset.css">
    <link rel="stylesheet" href="../../../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../../../css/components/header.css">
    <link rel="stylesheet" href="../../../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../../../../css/components/row.css">


    <style>
        .activityContainer {
            display: flex;
            align-items: center;
            margin: 0.5rem 1rem;
            gap: 3rem;
        }

        .progress {
            flex-grow: 2;
        }

        .gem,
        .time,
        .porcentage {
            display: flex;
            flex-direction: row-reverse;
            gap: 0.5rem;
            align-items: center;
            background: rgb(47, 47, 47);
            border-radius: 0.5rem;
            color: white;

        }



        .modalWindowBack {
            background: none;
            border: none;
            color: #6f6f6f;
        }

        .bi-gem {
            background: rgb(23 154 215);
            background: var(--colorHF);
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: white;
        }

        .bi-bar-chart {
            background: rgb(23 154 215);
            background: #ff7d45;
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: white;
        }

        .bi-stopwatch-fill {
            background: rgb(23 154 215);
            background: var(--colorHF);
            background: #3f8ddf;
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: white;
        }

        .gem>div>span,
        .time>div>span,
        .porcentage>div>span {
            padding-right: 1rem;
        }

        .progress {
            width: 1rem;
            height: 80%;
            background: rgb(47, 47, 47);

            position: relative;
        }


        .row {
            padding: 0rem 1rem;
        }

        body {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100vh;
            background-size: contain;
            background-repeat: repeat;
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: normal;
            font-weight: 400;
        }

        main {
            flex-grow: 2;
        }

        main > div{
            max-width: 1000px;
  min-width: 100px;
  max-height: 700px;
  min-height: 600px;
        }

        .col-11 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .containerBack,
        .containerGuide,
        .containerResultsLesson {
            width: 100vw;
            height: 100vh;
            position: absolute;
            display: flex;
            justify-content: center;
            background: green;
            align-items: center;
            background: rgb(0, 0, 0, 0.5);
        }


        .content {
            max-width: 500px;
            background: white;
            min-width: 200px;
            border-radius: 1rem !important;
        }

        .modalTitleBack {
            background-color: #ff4b4b;
            margin: 0rem;
            padding: 1rem;
            color: white;
        }


        .modalTitleGuide {
            background-color: #ff7d45;
            margin: 0rem;
            padding: 1rem;
            color: white;
        }

        .openModal {
            animation: openModal 1s;
        }

        @keyframes openModal {
            0% {
                transform: translateY(-15%);
                opacity: 0;
                transition: opacity 0.5s ease-in-out;

            }

            100% {
                transform: translateY(0%);
                opacity: 1;
            }
        }

        .Back>button {
            border: none;
        }

        .imgEresCapaz {
            max-width: 90px;
        }

        .objetivo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .YesBack {
            background: #ff4b4b;
            color: white;
            border: 0rem;
        }

        .containerBack>div>div>div>p {
            padding: 0.5rem;
            margin: 0rem;
        }


        .modal-footer {
            padding: 1rem;
        }

        .CancelBack {
            border: 0rem;
            color: white;
            background-color: #3f8ddf !important;
        }

        .CancelBack:hover {
            transition: all 0.5s;
            background: #1d5c9f !important;
            color: white !important;

        }

        .detalls {
            background: rgb(47, 47, 47);
            color: white;
            border-radius: 0.5rem;
            width: clamp(20px, 100% , 1000px);
        }

        .begin {
            position: absolute;
            height: 100%;
            width: 100%;
            background: white;
        }

        .begin {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: url(../../../../../img/background-main.png);
            background-size: contain;
            background-repeat: repeat;
        }

        .flexComun {
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .imgWelcome {
            width: 40px;
        }

        .guide {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgb(47, 47, 47);
            padding: 0.3rem;
            border-radius: 100%;
            border-radius: 0.5rem;
            outline-color: rgb(47, 47, 47);
            outline-offset: 0.2rem;
            outline-style: solid;
            outline-width: 5px;
            color: white;
        }

        .guide>button {
            background: none;
            border: none;
            color: white;
        }

        h1 {
            color: white;
            font-weight: bold;
        }

        .btnPlay {
            cursor: pointer;
            background: white;
        }

        .clouds {
            position: absolute;
            bottom: 0;
        }

        .linkBack {
            text-decoration: none;
            cursor: pointer;
        }


        .animationDeleteLabel {
            transition: animation 0.5s;
            animation: deleleLabel 1.5s;
        }

        @keyframes deleleLabel {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0);
            }
        }

        @keyframes backInLeft {
            0% {
                opacity: 0;
            }

            5% {
                transform: scale(0.1);

            }

            50% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                transform: scale(1);
            }
        }

        .backInLeft {
            animation: backInLeft 1s ease-in-out;
        }

        /*Juego */

        .ButtonsNum>div>button {
            background: var(--colorHF);
            padding: 0.3rem;
            border-radius: 100%;
            border-radius: 0.5rem;
            outline-color: var(--colorHF);
            outline-offset: 0.2rem;
            outline-style: solid;
            outline-width: 5px;
            color: white;
            border: 0rem;
            min-width: 40px !important;
            min-height: 40px;

        }

        .ButtonsNum>div>button:hover {
            background: #815ee1;
  padding: 0.3rem;
  border-radius: 100%;
  border-radius: 0.5rem;
  outline-color: #815ee1;
  outline-offset: 0.2rem;
  outline-style: solid;
  outline-width: 5px;
  color: white;
  border: 0rem;
  min-width: 40px !important;
  min-height: 40px;
  transition: background 0.5s, outline-color 0.5s;
}

        .ButtonsNum {
            display: flex;
            gap: 10rem
        }

        .containerPlay{
            border-radius: 1rem;
  border: solid 1px #e8d8ff;
        }

        .ButtonsNum>div {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }


    </style>
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
                            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam veniam
                                inventore odio</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gem">
                <div>
                    <span class="fs-2">0</span>
                </div>
                <i class="bi bi-gem fs-2"></i>
            </div>
            <div class="time">
                <div>
                    <span class="fs-2">00:00</span>
                </div>
                <i class="bi bi-stopwatch-fill fs-2"></i>
            </div>
        </div>
    </section>
    <main>
        <div class="row w-100 h-100">
            <div class="col-1 ">
                <div class="progress">
                    <div class="porcentage"></div>
                </div>
            </div>
            <div class="col-11">
                <div class="containerPlayer align-items-center justify-content-center" data-next="2">
                    <div class="ButtonsNum">
                        <div class="" class="one">
                            <button data-check="false">?</button>
                            <button data-check="false">?</button>
                            <button data-check="false">?</button>
                        </div>
                        <div class="two">
                            <button data-check="false">?</button>
                            <button data-check="false">?</button>
                            <button data-check="false">?</button>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>
    </main>


    <div class="begin welcome" style="display:none">
        <section class="logo">
            <img src="../../../../../img/for/teaching.png" class="img-fluid" alt="">
        </section>
        <?php
        include '../../../../../php/user/auxiliar.php';
        echo getLessonData($_SESSION["id_user"], 1);
        ?>
        <button class="btnPlay">COMENZAR</button><br>
        <a href="../../read.php" class="linkBack">Regresar</a>
        <div class="guide OpenModalGuide" title="Guia">
            <button class=""><i class="bi bi-journal-bookmark-fill fs-3 OpenModalGuide"></i></button>
        </div>
        <div class="clouds">
            <img src="../../../../../img/nube.png" class="img-fluid" alt="">
        </div>
    </div>
    <div class="messengerUserContainer" style="display:none">
        <div class="messengerInformation animate__backInDown">
            <button><i class="bi bi-patch-question-fill"></i></button>
        </div>
    </div>

    <div class="containerBack" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h2 class="modal-title modalTitleBack fs-5" id="exampleModalLabel"><b>¿Estás seguro de que quieres
                            salir de la lección?</b></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        <a href="../../read.php">Si quiero salir</a>
                        Aut vel provident saepe maxime eius quas labore libero asperiores aspernatur.
                    </p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                <button class="btn CancelBack ">No, seguir</button>
            </div>
            <form action="./../../php/admin/child.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="gem" value="">
                    <input type="hidden" name="falle">
                    <input type="hidden" name="speed">
                    <input type="hidden" name="percentage">
                    <input type="hidden" name="valueFunction" value="delete">
                </div>

            </form>
        </div>
    </div>

    <div class="containerResultsLesson" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h2 class="modal-title modalTitleResultsLesson fs-5" id="exampleModalLabel"><b>
                            !Felicidades has completado la leccion!</b></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aut vel provident saepe maxime eius quas labore libero asperiores aspernatur.
                    </p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                <form action="../../../../../php/user/unlockUpdateLesson.php" method="post" id="informationLesson">
                    <div class="modal-body">
                        <input type="text" name="statu" value="">
                        <input type="text" name="id_leccion">
                        <input type="text" name="gems" value="">
                        <input type="text" name="failed">
                        <input type="text" name="porcentage">
                        <input type="text" name="time">
                        <input type="submit" value="Siguiente">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>

        // Obtener parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('statu');


        let $statu = document.querySelector('[name="statu"]');
        $statu.value = id;

    </script>
    <div class="lesson" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h2 class="modal-title modalTitleBack fs-5" id="exampleModalLabel"><b>¿Estás seguro de que quieres
                            salir de la lección?</b></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        <a href="../../read.php">Si quiero salir</a>
                        Aut vel provident saepe maxime eius quas labore libero asperiores aspernatur.
                    </p>
                </div>
            </div>
            <form action="./../../php/admin/child.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="gem" value="">
                    <input type="hidden" name="falle">
                    <input type="hidden" name="speed">
                    <input type="hidden" name="percentage">
                    <input type="hidden" name="valueFunction" value="delete">
                </div>
                <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                    <button class="btn CancelBack ">No, seguir</button>
                </div>
            </form>
        </div>
    </div>

    <div class="containerGuide" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h2 class="modal-title modalTitleGuide fs-5" id="exampleModalLabel"><b>¿Estás seguro de que quieres
                            salir de la lección?</b></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        <a href="../../read.php">Si quiero salir</a>
                        Aut vel provident saepe maxime eius quas labore libero asperiores aspernatur.
                    </p>
                </div>
            </div>
            <form action="./../../php/admin/child.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="gem" value="">
                    <input type="hidden" name="falle">
                    <input type="hidden" name="speed">
                    <input type="hidden" name="percentage">
                    <input type="hidden" name="valueFunction" value="delete">
                </div>
                <div class="modal-footer d-flex justify-content-center gap-4 align-items-center">
                    <button class="btn CancelBack ">No, seguir</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <?php 
         
            include '../../../../include/footer.php';
            include '../../../../include/user/lesson/offcanvasAplication.php';   
            include '../../../../include/user/lesson/offcanvasUser.php';   

    ?>
    <script>
        let $modalWindowBack = document.querySelector(".modalWindowBack");
        let $containerBack = document.querySelector(".containerBack");
        let $body = document.querySelector("body");
        let $buttonOpenModalGuide = document.querySelector(".OpenModalGuide")
        let $containerGuideModal = document.querySelector(".containerGuide")
        let $begin = document.querySelector(".begin");
        let $GuidaContent = document.querySelector(".containerGuide > .content")

        document.addEventListener("click", e => {

            const $buttonPlay = e.target.closest(".btnPlay");

            if (e.target.matches(".OpenModalGuide")) {
                $containerGuideModal.removeAttribute("style")
                $GuidaContent.classList.add("backInLeft")
            }

            if (e.target.matches(".modalWindowBack")) {
                $containerBack.removeAttribute("style");
                $containerBack.classList.add("openModal")

            }

            if (e.target.matches(".CancelBack")) {
                $containerBack.style.display = "none";
            }
            if ($buttonPlay) {
                $begin.classList.add("animationDeleteLabel");
                setTimeout(() => {
                    $body.removeChild($body.children[2])
                }, 1000);
            }

        })
    </script>
</body>

</html>