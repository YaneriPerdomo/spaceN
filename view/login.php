<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacio N | Pagina principal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/admin/components/purpleButton.css">
    <style>
        :root {
            --colorOrange: #fc7c45;
        }

        body {
            height: 100vh;
        }

        main>.col-6:first-child {
            background-color: var(--colorHF);
        }

        main>div>div {
            width: 50vw;
        }

        .row {
            justify-content: center;
        }

        .login {
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: start;
        }

        body {
            background-image: url(../img/background-main.png);
            background-size: contain;
            background-repeat: repeat;
        }

        .imgs {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            height: 100%;
            background: rgba(255, 255, 255, 1);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f2f2f2;
        }

        .containerLogin {
            position: relative;
            padding: 1rem;
            background: white;
            border-radius: 1rem;
            border-radius: 1rem;
            border: solid 1px #e8d8ff;
        }

        form {
            max-width: 350px;
        }

        [type='submit'] {
            width: 100%;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        label>span {
            color: #ff5d5d;
        }

        .createC>span {
            /* color: #6f6f6f */
        }

        .style {
            position: absolute;
            top: 30px;
            right: -9px;
            height: 130px;
            border-radius: 0.2rem;
            background: green;
            width: 10px;
            background-image:
                linear-gradient(360deg, #a868f4 25%, #701bb7 25% 50%, #8b32d5 50% 75%, #8b60ea 75% 100%);
        }

        .linkCreateAccount {
            color: var(--colorHF);
            font-weight: bold;
        }

        .carousel-item>img {
            border: solid 1rem white;
            transform: perspective(1rem) rotateZ(2deg);
        }
    </style>
</head>

<body>
    <main class="h-100">
        <div class="row m-0 h-100 gap-0">
            <div class="col-6 imgs">
                <section>
                </section>
            </div>
            <div class="col-6 login">
                <section class="containerLogin">
                    <form action="../php/login.php" method="post" class="formLogin">
                        <br><br>

                        <div class="text-center">
                            <legend class="text-center" style="color:var(--colorHF)"><b>¡Prepárate para</b>
                                <b style="color:var(--colorOrange)"> una aventura matemática!</b>
                            </legend>
                            <b class="fs-3">Inicia sesion</b><br>
                        </div>
                        <label for="user">Usuario<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="user" class="form-control" placeholder="Hola...✋"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <label for="">Contraseña<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Somos tu y yo 🤫"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <input type="submit" class="purpleButton" value="Acceder"></input><br>

                        <br><br>
                        <div class="createC text-center">
                            <span>¿Aun no tienes cuenta? <a href="#createAccount"
                                    class="text-decoration-none linkCreateAccount">Registrarte<i
                                        class="bi bi-arrow-right"></i></a></span>

                        </div>
                        <br><br>
                    </form>
                    <div class="style">

                    </div>
                </section>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>