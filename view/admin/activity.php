<?php
    include './../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="ea">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/admin/components/header.css">
    <link rel="stylesheet" href="../../css/admin/components/semanticTag.css">
    <link rel="stylesheet" href="../../css/admin/components/row.css">
    <link rel="stylesheet" href="../../css/admin/components/offcanvas.css">
    <link rel="stylesheet" href="../../css/admin/helpReportsActivity.css">
</head>
 
<body>
    <?php include "./../include/admin/headerHelp.php" ?>
    <main class="">
        <div class="content">
            <h1><b>Recientes</b></h1>
            <p>
            La aplicación web <em>"Eres capaz"</em> te muestra actualizaciones en vivo 
            de las actividades que tus niños pueden realizar en la plataforma de aprendizaje.
            </p>
        </div>
    </main>
    <?php include "./../include/admin/footer.php" ?>
</body>
<?php include "./../include/admin/offcanvasAplication.php" ?>
<?php include "./../include/admin/offcanvasUser.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>



</html>