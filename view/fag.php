<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacio N | Pagina principal </title>
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

</head>

<body>

    <?php include './include/headerLoginCreateMore.php' ?>
    <main >
        <section class="content">
             <h1><b>Preguntas frecuentes</b></h1>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quae quo animi autem iure quod error possimus minima nemo architecto officia aliquam repellat accusamus assumenda, rem, perferendis veritatis neque impedit!</p>   
             <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                ¿Por qué no puedo editar mi perfil?
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Recuerda que tu administrador o mejor dicho tu representante o docente pudo crear tu usuario, por lo que solo él puede editar tu perfil.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                ¿Cómo puedo ver mi progreso dentro de mi aprendizaje?
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">¡Es fácil! Depende del dispositivo, pero si lo estás usando en una computadora o tableta a la derecha puedes ver tu progreso para más detalles puedes presionar el botón "revisar" en ese mismo botón se cargará una nueva ventana mostrando tu progreso completo igual a tu progreso en cada etapa que hayas completado. Si lo estás usando en un teléfono móvil, verás tu nombre de usuario en la parte superior derecha, así que tócalo y aparecerá allí.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                ¿Qué es la tabla de clasificación?
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">La tabla de clasificación incluye a los mejores usuarios que han ganado la mayoría de las estrellas cada semana y mes en cada una de las lecciones que hacen.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_4" aria-expanded="false" aria-controls="flush-collapseTwo">
                ¿Cómo elimino mi usuario?
            </button>
            </h2>
            <div id="flush-collapse_4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Recuerda que tu administrador o mejor dicho tu representante o docente pudo crear tu usuario, por lo que solo tendrá esa autorización, de igual manera cada usuario dentro del aprendizaje tiene su período de vigencia.</div>
            </div>
        </div>
        </div>
        </section>
     </main>

    <?php include "./include/footer.php" ;
        include "./include/offcanvasLoginCreateMore.php";
    ?>

    
   
</body>
<script src="./../js/helpers/bootstrap.js"></script>

</html>