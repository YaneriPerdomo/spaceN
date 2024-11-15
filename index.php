<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacio N | Pagina principal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --yellowColor: rgb(255, 208, 67);
        }

        body {
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
            background-image: url(./img/background-main.png);
            background-size: contain;
            background-repeat: repeat;
        }

        main {
            flex-grow: 2;
        }

        .moreDetails,
        .for {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: inherit;
            color:white;
        }

        .carousel-item>img {
            border: white 8px solid
        }

        .carousel-caption {
            padding: 0.5rem;
            color: rgb(48, 48, 48);
            border: none;
            background: var(--yellowColor);
        }


        .buttonE {
            max-width: 200px;
            min-width: 250px;
            padding: 0.5rem;
            color: rgb(48, 48, 48);
            border: none;
            border-radius: 5rem;
            background: var(--yellowColor);
        }

        .logo {
            position: fixed;
            padding: 0.5rem;
        }

        .containerLogin {
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .formLogin {
            background: white;
            max-width: 300px;
            padding: 1rem;
        }
    </style>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#main">Espacio N</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li>Contacto</li>

                    </ul>
                    <form class="d-flex" role="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-xxl h-100">
            <div class="row h-100 frontPage">
                <div class="col-md-6 col-12 h-100">
                    <section class="moreDetails">
                        <h2><b>¡Descubre un mundo de posibilidades matemáticas! </b></h2>
                        <p>Convierte el aprendizaje en una aventura para niños con discalculia de 7 a 12 años,
                            ayudándolos a superar desafíos y desarrollar sus habilidades matemáticas. Con ejercicios
                            interactivos adaptados a cada niño, fomentamos la confianza y <em>el amor por los
                                números.</em></p>
                        <a href="#login" class="text-decoration-none"><button class="buttonE " data-page="login">
                                <b>Login</b>
                            </button>
                        </a>
                    </section>
                </div>
                <div class="col-md-6  col-12 h-100">
                    <section class="for">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./img/for/representative.png" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Para representantes</h5>
                                        <p>A través de juegos interactivos, fomenta el desarrollo de habilidades
                                            matemáticas esenciales, mejorando la confianza y el rendimiento académico de
                                            tus niños.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/for/teaching.png" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Para Docentes.</h5>
                                        <p>Ofrece a tus estudiantes una forma más divertida de mejorar sus habilidades
                                            matemáticas.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/for/therapist.png" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Para terapeutas.</h5>
                                        <p>Para que tus pacientes infantiles con discalculia experiencias de aprendizaje
                                            personalizadas y atractivas.</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </main>
    <footer class="w-100 ">
        <div class="mt-3 text-center">
            <img src="./img/nube.png" class="img-fluid" alt="">
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <script>

        let $dataPage = document.querySelector("[data-page]") //Este es el boton para hacer el concepto SPA
        let $main = document.querySelector("main")
        let $titlePage =document.querySelector("title")
        document.addEventListener("click", e => {
            if (e.target.matches("[data-page]")) {

            }
        })
        window.addEventListener("hashchange", e => { router() })

        document.addEventListener("DOMContentLoaded", e => {router()})

        function router() {
            let { hash } = location;
            switch (hash) {
                case "":
                    alert("estamos en el main")
                    break;
                case "#login":
                    $titlePage.innerHTML = "Espacio N | Inicia sesion"
                    fetch(`./view/login.php`)
                        .then(res => res.ok ? res.text() : Promise.reject(error))
                        .then((html) => {
                            $main.innerHTML = html;
                            console.info(html)
                        }).catch((error) => { alert("hola") })
                    break;
                case "#main":
                    $titlePage.innerHTML = "Espacio N | Pagina Principal"
                    fetch(`./view/main.php`)
                        .then(res => res.ok ? res.text() : Promise.reject(error))
                        .then((html) => {
                            $main.innerHTML = html;
                            console.info(html)
                        }).catch((error) => { alert("hola") })
                    break;
                    case "#createAccount":
                    $titlePage.innerHTML = "Espacio N | Create una cuenta"
                    fetch(`./view/createAccount.php`)
                        .then(res => res.ok ? res.text() : Promise.reject(error))
                        .then((html) => {
                            $main.innerHTML = html;
                            console.info(html)
                        }).catch((error) => { alert("hola") })
                    break;
                    case "#Dashboard":
                    $titlePage.innerHTML = "Espacio N | Create una cuenta"
                    fetch(`./view/admin/Dashboard.php`)
                        .then(res => res.ok ? res.text() : Promise.reject(error))
                        .then((html) => {
                            $main.innerHTML = html;
                            console.info(html)
                        }).catch((error) => { alert("hola") })
                    break;
                default:

                    break;
            }
        }

    </script>
</body>

</html>