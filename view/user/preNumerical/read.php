<?php
include './../../../php/validations/authorizedChild.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprende | Espacio N </title>
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
    <link rel="stylesheet" href="../../../css/bootstrap/bootstrapMin.css">
    <link rel="stylesheet" href="../../../css/user/read.css">
    <style>
        @media screen and (max-width: 992px) {

            .read {
                flex-direction: column-reverse;
                margin: 0 !important; 
            }

            .row {
                height: auto !important;
                gap: 1rem;
            }

            .lessons{
                justify-content: center;
            }
        }


    </style>
</head>

<body>

    <?php include './../../include/user/header.php' ?>

    <main>
        <div class="row h-100 read">
            <div class="col-3 d-lg-block d-none h-100 ">
                <section class="historyChilds">
                    <h5>Recientes</h5>
                    <hr>
                    <?php
                    include "../../../php/user/showHistory.php";
                    showHistorys(true);
                    ?>
                </section>
            </div>
            <div class="col-lg-6 col-12 classification-module-style">
                <div>
                    <?php
                    include "../../../php/user/showEstatusLessons.php";
                    showLessons(1);
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-12 classification-module-style">
                <div>
                    <h4 class="clasificaciones">Clasificaciones actuales </h4>
                    <hr>
                    <?php
                    include "../../../php/user/showTableCRead.php";
                    showTableRead(1);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>
    <script src="./../../../js/helpers/unlockLinks.js"> </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

<script>
    window.addEventListener('resize', e => {
        if (window.innerWidth < 768) {
            let $read = document.querySelector(".col-3");
            $read.outerHTML = '';
        } else {
            // Apply desktop styles
            document.getElementById('myImage').style.display = 'block';
        }
    });
</script>

</html>