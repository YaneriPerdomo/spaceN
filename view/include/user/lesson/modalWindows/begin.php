<div class="begin welcome">
                <section class="logo">
                    <img src="../../../../../img/for/teaching.png" class="img-fluid" alt="">
                </section>
                <div class="progressA mb-4">
                    <div class="detallsProgressA">
                        <h1 class="text-center">Progreso Actual</h1>
                        <?php
                        include '../../../../../php/user/auxiliar.php';
                        echo getLessonData($_SESSION["id_user"], 1);
                        ?>
                    </div>
                </div>
                <button class="btnPlay">COMENZAR</button><br>
                <a href="../../read.php" class="text-white">Salir</a>
                <div class="guide OpenModalGuide" title="Guia">
                    <button class=""><i class="bi bi-journal-bookmark-fill fs-3 OpenModalGuide"></i></button>
                </div>
                <div class="clouds">
                    <img src="../../../../../img/nube.png" class="img-fluid" alt="">
                </div>
                <div class="loading">
                    <progress></progress>
                    <strong class="text-white">Cargando...</strong>
                </div>
            </div>
