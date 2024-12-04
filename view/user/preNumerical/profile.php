<?php

include './../../../php/validations/authorizedChild.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | :3</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../css/user/profile.css">

</head>

<body>

    <?php include './../../include/user/header.php' ?>

    <main class='align-items-start'>
        <div class="content">
            <div class="d-flex align-items-center     justify-content-between">
                <div class="">
                    <h2 class="user m-0"><?php echo $_SESSION['user'] ?? '' ?></h1>
                        <div class="informationUser">
                            <span
                                class="titleComplete"><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?? '' ?></span><br>
                            <span>Nivel de acceso: <?php
                            switch ($_SESSION["accessLevel"]) {
                                case '1':
                                    echo 'Pre numerico';
                                    break;
                                case '2':
                                    echo 'Numerico emergente';
                                    break;
                                case '3':
                                    echo 'Desarrollo numerico';
                                    break;
                                default:
                                    echo '';
                                    break;
                            }
                            ?>
                            </span><br>
                            <span>Fecha de creacion: <?php
                            list($ano, $mes, $dia) = explode("-", $_SESSION["accountCreationDate"]);
                            echo "$dia-$mes-$ano" ?></span><br>
                        </div>
                </div>
                <div class="">
                    <label for="" data-checked="true">
                        <input type="radio" id="" name="gender" value="1" ckecked>
                        <img src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png';
                        echo $gender ?>" alt="" class="checked">
                    </label>
                </div>
            </div>

            <div>
                <h4 class=" myProgress">MI PROGRESO</h4>
                <div class="row ContainerProgress">
                    <div class="col-4">
                        <div class="container">
                            <div class="card">
                                <div class="box">
                                    <div class="percent">
                                        <svg>
                                            <circle cx="70" cy="70" r="70"></circle>
                                            <circle cx="70" cy="70" r="70"
                                                style="stroke-dashoffset: calc(440 - (440 * 20) / 100);"></circle>
                                            <div class="num">
                                                <h2>0<span>%</span></h2>
                                            </div>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-8'>
                        <div class="row">
                            <div class='col-4'>
                                <div class="d-flex gap-2 dem">
                                    <div>
                                        <i class="bi bi-gem fs-1"></i><br>
                                    </div>
                                    <div class="detallsGems">
                                        <span>300</span>
                                        <span>Diamantes</span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-4 '>
                                <div class="d-flex gap-2 lessons">
                                    <div>
                                        <i class="bi bi-person-video3 fs-1"></i>
                                    </div>
                                    <div class="detallsLessons">
                                        6/6
                                        <span>Lecciones</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <section>
                            <h4 class="titleMyAbilities">Mis capacidades </h2>
                                <div class='d-flex gap-2 containerMyAbilities'>
                                    <div class="one">
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span class="p-1">Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                    <div class="">
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span>Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                    <div>
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span>Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <div>
                    </div>
                </div>
            </div>

    </main>

    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>

</body>
<script src="./../../../js/helpers/bootstrap.js"></script>

</html>