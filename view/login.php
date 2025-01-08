<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesion | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/components/purpleButton.css">
    <link rel="stylesheet" href="../css/components/semanticTag.css">
    <link rel="stylesheet" href="../css/components/headerMain.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/indexLoginCreate.css">
    <link rel="stylesheet" href="../css/components/validation.css">
    <link rel="stylesheet" href="../css/components/offcanvas.css">
    <link rel="icon" type="image/x-icon" href="./../img/logo/logo-icono.ico">
</head>

<body>
    <?php include './include/headerLoginCreateMore.php'; ?>

    <main class="">
        <div class="login">
            <section class="containerLogin">
                <form action="../php/login.php" method="post" class="formLogin ">
                    <div class="text-center mb-3">
                        <b class="fs-3"><span style="color:var(--colorHF)">Inicia</span>
                            <span style="color:var(--colorOrange)">sesion</span>
                        </b>
                        <br>
                        <div class="validations fw-bold">
                            <span></span>
                        </div>
                    </div>
                    <label for="user" class="">Usuario<span>*</span></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                        <input type="text" name="user" class="form-control" placeholder="Hola...✋"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus="true">
                    </div>
                    <label for="">Contraseña<span>*</span></label><br>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-key"></i></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="...🤫"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <input type="submit" class="purpleButton" value="Acceder">
                    <div class="createC text-center">
                        <span>¿Aun no tienes cuenta? <a href="./createAccount.php"
                                class="text-decoration-none linkCreateAccount">Registrarte<i
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
    include  './include/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="./../js/validations/login.js" type="module"></script>

</body>

</html>