<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/components/purpleButton.css">
    <link rel="stylesheet" href="./css/components/headerMain.css">
    <link rel="stylesheet" href="./css/components/semanticTag.css">
    <link rel="stylesheet" href="./css/components/offcanvas.css">
    <link rel="stylesheet" href="./css/components/header.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/indexLoginCreate.css">
    <link rel="icon" type="image/x-icon" href="./img/logo/logo-icono.ico">
</head>

<body>

    <?php include './view/include/header.php' ?>
    <main>
        <div class="row h-100 presentationIndex m-0   ">
            <div class="col-lg-6 col-12 information">
                <section>
                    <h1 class="title" style="color:var(--colorHF)"><strong>Espacio <span style="  color: var(--colorOrange);">N</span></strong></h1>
                    <h2><b>¡Descubre un mundo de posibilidades matemáticas!</b></h2>
                    <p>Ofrecemos un panel de control para profesionales, informes detallados de progreso, experiencia de aprendizaje personalizada y muchos más.</p>
                    <button class="purpleButton" style="  min-width: 200px; font-weight: bold;">
                        <a href="./view/login.php" class="text-white text-decoration-none ">Acceder</a>
                    </button>
                </section>
            </div>
            <div class="col-lg-6 col-12">
                <figure>
                    <img src="./img/presentation-index.png" class="animate__jackInTheBox img-fluid" alt="">
                </figure>
            </div>
        </div>
        <br><br>
    </main>

    <?php include "./view/include/footer.php";
          include "./view/include/offcanvas.php";
    ?>

</body>
<script src="./js/helpers/bootstrap.js"></script>
</html>