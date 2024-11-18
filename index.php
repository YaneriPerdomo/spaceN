<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espacio N | Pagina principal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --yellowColor: rgb(255, 208, 67);
            --ColorPageMain: #845eff;
        }

        body {
            display: flex;
            flex-direction: column;
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
            color: white;
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

        .frontPage {
            background-image: url(./img/background-main.png);
            background-size: contain;
            background-repeat: repeat;
            width: 100vw;
            height: 100%;
            height: 82vh;
        }

        .frontPage,
        .for,
        .characteristics {
            padding: 2rem;
        }


        .characteristics>div>div>img {
            filter: drop-shadow(-2rem -1.5rem var(--ColorPageMain));
        }

        .characteristics>div {
            display: flex;
            justify-content: center;
            gap: 4rem;
        }

        .characteristics>div>div {
            flex-basis: 33%;
        }

        .animatedImages {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center;
            padding: 1rem;
        }

        .articles {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        footer {
            background: rgb(48, 48, 48);
            width: 100vw;
        }

        .ButtonTopScroll {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            background-color: var(--ColorPageMain);
            width: 60px;
            height: 60px;
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 0.5rem;
            vertical-align: middle;
            text-decoration: none;
            text-align: center;
            transition: 0.2s ease-out;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            color: #FFF;
             cursor: pointer;
            transition: all 1s ease-out;
            color: white;

        }

        .hidden{
            visibility: hidden;
  opacity: 0;

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
        <div class="row  frontPage">
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
            <div class="col-md-6 animatedImages col-12 h-100">
                <section>
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
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </section>
            </div>
        </div>
        <section class="characteristics">
            <h2>H2</h2><br><br>
            <div class="">
                <div class="">
                    <h3>Padre</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt hic ipsum aperiam iusto
                        voluptates? Enim, commodi perspiciatis totam eum ex ea in repudiandae consectetur animi,
                        eligendi quas magnam maxime aperiam.</p>
                    <button><a href="">Comenzar</a></button>
                </div>
                <div class="">
                    <img src="./img/for/teaching.png" class="img-fluid" alt="">
                </div>
                <div class="">
                    <img src="./img/for/teaching.png" class="img-fluid" alt="">
                </div>
            </div>
        </section>
        <h2>Article</h2>
        <section class="articles">
            <article>
                <div class="card mb-3" style="max-width: 900px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./img/for/teaching.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="card mb-3" style="max-width: 900px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./img/for/teaching.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <div class="ButtonTopScroll scroll_top_btn hidden"><i class="bi bi-arrow-up"></i></div>

    <?php include "./view/include/admin/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <script>
        function scrollYy() {
            document.addEventListener("scroll", (e) => {
                let ButtonTopScroll = document.querySelector(".ButtonTopScroll");
                if (scrollY > 300) {
                    ButtonTopScroll.classList.remove("hidden");
                }
                else {
                    ButtonTopScroll.classList.add("hidden");
                }
                ButtonTopScroll.addEventListener("click", (e) => {
                    window.scrollTo({
                        behavior: "smooth",
                        top: 0,
                    });
                });
            });
        }
        scrollYy()
    </script>
    <script>

        let $dataPage = document.querySelector("[data-page]") //Este es el boton para hacer el concepto SPA
        let $main = document.querySelector("main")
        let $titlePage = document.querySelector("title")

        window.addEventListener("hashchange", e => { router() })

        document.addEventListener("DOMContentLoaded", e => { router() })

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