<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea una cuenta | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/components/purpleButton.css">
    <link rel="stylesheet" href="../css/components/semanticTag.css">
    <link rel="stylesheet" href="../css/components/headerMain.css">
    <link rel="stylesheet" href="../css/indexLoginCreate.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/components/validation.css">
    <link rel="stylesheet" href="../css/components/offcanvas.css">
    <link rel="icon" type="image/x-icon" href="./../img/logo/logo-icono.ico">
</head>

<body>
    <?php include './include/headerLoginCreateMore.php'; ?>
    <main class="">
        <div class="login">
            <section class="containerLogin">
                <form action="./../php/createAccount.php" class="" method="POST">
                    <div class="text-center">
                        <b class="fs-3">
                            <span style="color:var(--colorHF)">Crea una</span>
                            <span style="color:var(--colorOrange)">cuenta</span>
                        </b>
                        <div class="validations fw-bold">
                            <span class="one"></span>
                            <span class="two"></span>
                            <span class="thren"></span>
                        </div>
                        <br>
                    </div>
                    <div class="row ">
                        <div class="col-sm-6 col-12">
                            <b>Datos personales:</b><br>
                            <label for="user">Nombre<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                            </div>
                            <label for="user">Apellido<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" name="lastname" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="user">Correo electronico<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="mail" name="mail" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="user">Cargo profesional<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <select name="professionalPosition" class="form-control">
                                    <option value="1">Docente</option>
                                    <option value="2">Terapeuta</option>
                                </select>
                            </div>
                            <label for="user">Nombre del centro escolar o profesional<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="bi bi-building"></i></span>
                                <input type="text" name="center" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <b> Datos de la cuenta: </b><br>
                            <label for="user">Usuario<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" name="user" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                            </div>

                            <label for="user">Contraseña<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-key"></i></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label for="user">Confirmar contraseña<span>*</span></label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-key"></i></i>
                                </span>
                                <input type="password" name="passwordAgain" class="form-control" placeholder="Hola...✋"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>


                    <input type="submit" value="Registrate" class="purpleButton">
                    <div class="createC text-center">
                        <span>¿Tienes una cuenta? <a href="./login.php"
                                class="text-decoration-none linkCreateAccount">Inicia sesion<i
                                    class="bi bi-arrow-right"></i></a></span>
                    </div>
                </form>
                <div class="style">
                </div>
            </section>
        </div>
    </main>
    <?php
    include "./include/offcanvasLoginCreateMore.php";

    ?>

    <?php include('./include/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="./../js/validations/createAccountProfessional.js" type="module"></script>
</body>

</html>