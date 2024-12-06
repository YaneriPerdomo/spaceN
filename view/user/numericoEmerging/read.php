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
    <link rel="stylesheet" href="../../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../../css/components/row.css">


<style>
    .lessons > div a {
        text-align: center;
    }
</style>
</head>

<body>

    <?php include './../../include/user/header.php' ?>

    <main>
        <div class="row h-100">
            <div class="col-3 h-100">
                <section class="historyChilds">
                    <span>Recientes</span><br>
                    <hr>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <a href="#allHistoryChilds"> Ver todas</a>
                </section>
            </div>
            <div class="col-9">
                <div>
                    <article class="moduloOne">
                        <strong class="fs-3">Módulo 2: Ampliando el Concepto de Número</strong><br>
                            <section class="temaOneInformation">
                                <span>Tema 1: Conteo:   </span>
                                <div class="d-flex flex-direction-row gap-4 lessons">
                                    <div class="one">
                                    <a href="" title="Conteo hacia adelante y hacia atrás: ejercicios de contar en voz alta y con objetos.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Conteo hacia adelante y <br> hacia atrás</small>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="two">
                                    <a href="" title="Conteo de decenas: actividades para comprender el concepto de decena.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Comparación de <br>cantidades</small>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thre">
                                    <a href="" title="Seriación: ordenar objetos según tamaño, color o forma.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Seriación para ordenar <br> objetos</small><br>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </section>
                            <section class="temaOneInformation">
                                <span>Tema 2: Introducción a los números:  </span>
                                <div class="d-flex flex-direction-row gap-4 lessons">
                                    <div class="one">
                                        <a href="" title="Reconocimiento de números del 1 al 10: ejercicios de identificación visual y auditiva.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Reconocimiento de <br> números  del 1 al 10</small>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="two">
                                    <a href="" title="Escritura de números: actividades para practicar la escritura de números.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Escritura de <br> números</small>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="thre">
                                    <a href="" title="Correspondencia número-cantidad: relacionar un número con la cantidad correspondiente de objetos.">
                                            <div class="img">
                                                <i class="bi bi-hourglass-top fs-1"></i>
                                            </div>
                                            <div class="status">
                                                <span class="fs-5">En espera</span><br>
                                                <small>Correspondencia <br> número-cantidad</small>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-direction-row gap-1">
                                                <span>Porcentaje:0%</span>
                                                <span>Diamantes:0</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </section>
                    </article>
                </div>
            </div>
        </div>
    </main>

    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>