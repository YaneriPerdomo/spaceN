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
    <link rel="stylesheet" href="../css/components/purpleButton.css">
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
            background: #8f6cf2;
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

       
        #carouselExampleCaptions{
            width: 90%;
        }
    </style>
</head>

<body>
    <main class="h-100">
        <div class="row m-0 h-100 gap-0">
        <div class="col-6 imgs">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/backgroundPurple.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Panel de control para profesionales</b></h5>
                                <p>Los profesionales pueden crear cuentas personalizadas para sus hijos, establecer
                                    metas de aprendizaje y monitorear su progreso.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="../img/backgroundPurple.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Informes detallados de progreso</b></h5>
                                <p>Genera informes personalizados que muestran el desempeño del niño a lo largo del
                                    tiempo, identificando fortalezas y áreas de mejora.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="../img/backgroundPurple.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Experiencia de aprendizaje personalizada</b></h5>
                                <p>Ajusta la dificultad de las lecciones para adaptarse al ritmo de aprendizaje de cada
                                    niño.</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="../img/backgroundPurple.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Privacidad y seguridad</b></h5>
                                <p>Protegemos la información de los niños y cumplimos con los más altos estándares de
                                    seguridad.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6 login">
                <section class="containerLogin">
                    <form action="../php/login.php" method="post" class="formLogin">
                        <br><br>

                        <div class="text-center">
                            <b class="fs-3"><span style="color:var(--colorHF)">Inicia</span> 
                            <span style="color:var(--colorOrange)">sesion</span>
                        </b><br>
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
                            <input type="password" name="password" class="form-control" placeholder="...🤫"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <input type="submit" class="purpleButton" value="Acceder"></input><br>

                        <br><br>
                        <div class="createC text-center">
                            <span>¿Aun no tienes cuenta? <a href="./createAccount.php"
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