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
        .lessons>div a {
            text-align: center;
        }

        .moduleOne>strong {
            display: block;
            background: #906df2;
            color: white;
            border-radius: 1rem 1rem 0rem 0rem;
            padding: 0.6rem 1rem;
        }

        .col-9>div {
            padding: 0rem
        }

        [class*="tema"]>span {
            display: block;
            background: #ff7d45;
            color: white;
            padding: 0.6rem 1rem;
        }

        .lessons {
            padding: 0.6rem 1rem;
        }

        .col-9>div {
            border: solid 1px #e8d8ff;
        }

        .img {
            background: #7a5bd2;
            padding: 0.3rem;
            border-radius: 100%;
            border-radius: 100%;
            outline-color: #7a5bd2;
            outline-offset: 0.2rem;
            outline-style: solid;
            outline-width: 5px;
            color: white;
            width: 75px;
        }

        .lessons>div>a {
            color: rgb(47, 47, 47);
            width: 130px;
            height: 100px;
        }

        .filterGrayscale {
            outline-style: none !important;
            filter: grayscale(100%);
        }

        .lessons>div>a {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
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
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button> <br>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div>
                    <a href="#allHistoryChilds"> Ver todas</a>
                </section>
            </div>
            <div class="col-9">
                <div>
                    <?php
                    include "../../../php/user/showEstatusLessons.php";
                    showLessons();
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>
    <script>
        document.addEventListener("click", (e) => {
            const clickedElement = e.target.closest("[data-enter]");
            if (clickedElement && clickedElement.getAttribute("data-enter") === "false") {
                console.info(e.target);
                e.preventDefault();
            }
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

</html>