<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas frecuentes | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/components/purpleButton.css">
    <link rel="stylesheet" href="../css/components/headerMain.css">
    <link rel="stylesheet" href="../css/components/semanticTag.css">
    <link rel="stylesheet" href="../css/components/offcanvas.css">
    <link rel="stylesheet" href="../css/components/header.css">
    <link rel="stylesheet" href="../css/components/content.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/indexLoginCreate.css">
    <link rel="icon" type="image/x-icon" href="./../img/logo/logo-icono.ico">
</head>

<body>

    <?php include './include/headerLoginCreateMore.php' ?>
    <main>
        <section class="content">
            <h1><b>Preguntas frecuentes</b></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quae quo animi autem iure quod error
                possimus minima nemo architecto officia aliquam repellat accusamus assumenda, rem, perferendis veritatis
                neque impedit!</p>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus doloribus amet at facilis,
                            quibusdam animi dolore magni consectetur dolorem est eos aliquam! Reiciendis, ipsum soluta
                            blanditiis consectetur quis ea hic!
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo officiis doloribus sunt
                            tempora magni? Impedit at repellat perferendis nesciunt, totam excepturi aliquid? At
                            pariatur veritatis fugit placeat doloribus illum nisi.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus doloribus amet at facilis,
                            quibusdam animi dolore magni consectetur dolorem est eos aliquam! Reiciendis, ipsum soluta
                            blanditiis consectetur quis ea hic!
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo officiis doloribus sunt
                            tempora magni? Impedit at repellat perferendis nesciunt, totam excepturi aliquid? At
                            pariatur veritatis fugit placeat doloribus illum nisi.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "./include/footer.php";
    include "./include/offcanvasLoginCreateMore.php";
    ?>



</body>
<script src="./../js/helpers/bootstrap.js"></script>

</html>