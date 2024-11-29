<?php
    include './../../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/admin/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/admin/components/header.css">
    <link rel="stylesheet" href="../../../css/admin/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">
</head>


<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main class="">
        <div class="row h-100">
            <?php include "./../../include/admin/user/configurationProfile.php" ?>
            <div class="col-9">
                <div class="content">
                <form action="./../../../php/admin/user.php" method="post">
                <input type="hidden" name="valueFunction" value="changesPassword">
                    <legend>Cambiar contraseña</legend>
                    <label for="">Contraseña actual</label><br>
                    <input type="password" name="oldPassword" id=""><br>
                    <label for="">Contrasena nueva</label><br>
                    <input type="password" name="newPassword" id=""><br>
                    <label for="">Confirmar contrasena nueva</label><br>
                    <input type="password" name="passwordAgain" id=""><br>
                    <input type="submit" value="Cambiar">
                </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "./../../include/admin/footer.php" ?>
</body>

<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>




</html>