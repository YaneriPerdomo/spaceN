<?php
include './../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="ea">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
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
            <h1><b>Reportes</b></h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat corporis eveniet, exercitationem iusto
                quam dolore harum dolores numquam autem quae facilis natus fuga ratione libero alias consectetur
                laboriosam commodi nesciunt.</p>
            <hr>
            <div class='w-100 h-100 d-flex justify-content-center align-content-center'>
                <form action="../../php/admin/reports.php" method="post">
                    <p>
                        <label for="1">
                            <input type="radio" id="1" name="accessLevel" value="1"> 
                            Pre numerico
                        </label><br>
                        <label for="2"><input type="radio" id="2" name="accessLevel" value="2"> 
                            numerico_emergente
                        </label><br>
                        <label for="3">
                            <input type="radio" id="3" name="accessLevel" value="3">
                            Desarrollo Numerico
                        </label><br>
                    </p>

                    <input type="submit" value="Generar reportes">
                </form>
            </div>
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