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

</head>

<body>
    <?php include './../../include/user/header.php' ?>

    <main class='align-items-start'>
        <div class="content">
            <h1>Historial</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit accusantium et natus necessitatibus,
                deleniti cum? Sequi delectus consequuntur doloremque deleniti magnam reprehenderit saepe, impedit rerum
                consequatur possimus! Atque, dolores expedita.</p>
            <hr>
            <?php
                    include './../../../php/user/showHistory.php';
                    showHistorys();
                ?>
           
        </div>
    </main>

    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>

</body>
<script src="./../../../js/helpers/bootstrap.js"></script>
<script src="../../../js/user/showHistorysUser.js" type="module"></script>

</html>