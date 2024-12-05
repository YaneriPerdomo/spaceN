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
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
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
                        <legend class="p-0 m-1">Cambiar contraseña</legend>
        <p>Actualiza tu contraseña de forma regular para mantener tu cuenta segura. Puedes hacerlo en cualquier momento, con solo unos clics.</p>
                        <hr>
                        <label for="">Contraseña Actual<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-lock"></i>
                            </span>
                            <input type="password" name="oldPassword" class="form-control"
                                placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Contraseña Nueva<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="newPassword" class="form-control"
                                placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div><label for="">Confirmar contraseña<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="passwordAgain" class="form-control"
                                placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div><hr>
                        <input type="submit" value="Cambiar">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "./../../include/footer.php" ?>
</body>

<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>

<script src="./../../../js/helpers/bootstrap.js"></script>




</html>