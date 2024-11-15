<!DOCTYPE html>
<html lang="ea">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    :root {
        --colorHF: #9470f7;
        --colorBlack: rgb(47, 47, 47)
    }

    header {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
        background: var(--colorHF);
    }

    body {
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        background-size: contain;
        background-repeat: repeat;
    }

    main {
        flex-grow: 2;
    }

    .userPerfil>button {
        border: none;
        background: var(--colorHF)
    }

    .userImg,

    .LogoImg {
        width: 70px;
        clip-path: circle(34% at 50% 50%);
    }

    a {
        margin: 0.5rem 0rem;
        display: block;
        color: var(--colorBlack);
        text-decoration: none;
    }

    footer {
        background: rgb(48, 48, 48);
        width: 100vw;
    }

    .historyChilds {
        height: 100%;
        overflow-y: scroll !important;
        overflow-x: hidden;
        padding: 1rem;
    }

    .burgerMenu {
        width: 40px;
        height: 39px;
        background: none;
    }

    .offCanvasSpaceN {
        border: none;
        background: none;
        padding: 0rem;
    }

    .dataTable {
        display: block;
        width: 100%;
        margin: 1em 0;
    }

    .dataTable thead,
    .dataTable tbody,
    .dataTable thead tr,
    .dataTable th {
        display: block;
    }

    .dataTable thead {
        float: left;
    }

    .dataTable tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }

    .dataTable td,
    .dataTable th {
        padding: .625em;
        line-height: 1.5em;
        border-bottom: 1px dashed #ccc;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .dataTable th {
        text-align: left;
        background: rgba(0, 0, 0, 0.14);
        border-bottom: 1px dashed #aaa;
    }

    .dataTable tbody tr {
        display: table-cell;
    }

    .dataTable tbody td {
        display: block;
    }

    .dataTable tr:nth-child(odd) {
        background: rgba(0, 0, 0, 0.07);
    }

    @media screen and (min-width: 50em) {

        .dataTable {
            display: table;
        }

        .dataTable thead {
            display: table-header-group;
            float: none;
        }

        .dataTable tbody {
            display: table-row-group;
        }

        .dataTable thead tr,
        .dataTable tbody tr {
            display: table-row;
        }

        .dataTable th,
        .dataTable tbody td {
            display: table-cell;
        }

        .dataTable td,
        .dataTable th {
            width: auto;
        }

    }

    .searchChilds {
        flex-grow: 2;
        align-content: center;
        align-items: center;
        justify-content: center;
        display: flex;

    }

    .showAndAddChild {
        align-content: space-between;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }

    main>div {
        width: 100vw;
    }

    .operations>a {
        display: inline
    }
</style>

<body>

    <header>
        <a class="btn btn-primary offCanvasSpaceN" data-bs-toggle="offcanvas" href="#offCanvasSpaceN" role="button"
            aria-controls="offCanvasSpaceN">
            <img src="../../img/burgerMenu.png" class="img-fluid burgerMenu" alt="">
        </a>
        <section class="logo">
            <figure>
                <img src="" alt="">
            </figure>
        </section>
        <section class="searchChilds">
            <span>Busqueda</span>
            <button type="button" class=" " data-bs-toggle="modal" data-bs-target="#searchChilds">
                <input type="search" name="" id="" placeholder="Buscar niños">
            </button>
        </section>
        <section class="userPerfil">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"><img src="../../img/for/representative.png" class="img-fluid userImg"
                    alt="">
            </button>
        </section>
    </header>

    <main>
        <div class="row h-100">
            <div class="col-3 h-100">
                <section class="historyChilds">
                    <span>Recientes</span><br>
                    <hr>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button></button>
                        <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Borrar</a></li>
                        </ul>
                    </div>
                    <a href="#allHistoryChilds"> Ver todas</a>
                </section>

            </div>
            <div class="col-9">
                <section class="childs">
                    <br>
                    <h1>Panel administrativo</h1>
                    <div class="showAndAddChild">
                        <div>
                            <span>Mostrar</span>
                            <select name="" id="">
                                <option value="5">5</option>
                                <option value="10">10</option>
                            </select>
                            <span>Registros</span>
                        </div>
                        <div>
                            <a href="#addChild">Agregar niño</a>
                        </div>
                    </div>
                </section>
                <section class="table">
                    <table class="dataTable">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Aprendizaje</th>
                                <th>Estado</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Moises3</a></td>
                                <td>Moises</td>
                                <td>Bastos</td>
                                <td>10</td>
                                <td>
                                    Pre-numerico
                                </td>
                                <td>Activo</td>
                                <td class="operations">
                                    <button>Eliminar</button>
                                    <a href="#modify"><button>Editar</button></a><br>
                                    <a href="#progressChild"><button>Progreso</button></a>
                                    <button data-bs-toggle="modal" data-bs-target="#sendNotificationChild">Enviar
                                        notificacion</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav class="Page navigation">
                        <ul class="pagination">
                            <li>Enterior</li>
                            <li>1/2</li>
                            <li>Siguiente</li>
                        </ul>
                    </nav>
                </section>
            </div>
        </div>
    </main>
    <footer class="py-2">
        <div>
            <div class="mt-3 text-center">
                <p class="text-white">© 2024 Espacio N | Todos los derechos reservados | Política de privacidad | Aviso
                    legal | Política de cookies | Contacto</p>
            </div>
        </div>
    </footer>
</body>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvasSpaceN" aria-labelledby="offCanvasSpaceN">
    <div class="offcanvas-header">
        <div class="d-flex">
            <div class="d-flex">
                <img src="../../img/for/representative.png" class="img-fluid LogoImg" alt="">
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr style="margin:0.1rem">
    <div class="offcanvas-body">
        <a href="#Dashbord">
            <i class="bi bi-house"></i>
            Casa
        </a>
        <a href="#activity">
            <i class="bi bi-arrow-clockwise"></i>
            Actividad
        </a>
        <a href="#reports">
            <i class="bi bi-filetype-pdf"></i>
            Reportes
        </a>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="d-flex">
            <div class="d-flex">
                <img src="../../img/for/representative.png" class="img-fluid userImg" alt="">
                <div class="d-flex flex-column">
                    <span><strong>Yane3</strong></span>
                    <span class="text-secondary">Yaneri Perdomo</span>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr style="margin:0.1rem">
    <div class="offcanvas-body">
        <a href="#profile">
            <i class="bi bi-person"></i>
            Tu Perfil
        </a>
        <a href="#help">
            <i class="bi bi-question-circle"></i>
            Ayuda
        </a>
        <a href="#signOut">
            <i class="bi bi-box-arrow-right"></i>
            Desconectar
        </a>

    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Detalles de la actividad del niño</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span>Emily3 completó la lección número 2</span><br>
                <small><data value="">20/20/2025</data></small><br>
                <small> <time datetime="">10:20p.m</time></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="sendNotificationChild" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel"><b>Envio de notificacion</b></h1>
                    <small>Puedes enviarle una notificación para "nombre de usuario del niño"</small>
                </div>
            </div>
            <div class="modal-body">
                <select class="w-100">
                    <option value="lesson_completed">✅ ¡Felicidades! Has completado una lección mas. </option>
                    <option value="stars_gained"> ¡Genial! Has ganado más estrellas. ✨</option>
                    <option value="stage1_passed"> ¡Lo lograste! Has superado la etapa 1. </option>
                    <option value="stage2_passed"> ¡Sigue así! Has pasado a la etapa 2. </option>
                    <option value="learning_completed"> ¡Enhorabuena! Has completado todo el aprendizaje. </option>
                    <option value="ranking_up">⬆️ ¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima. </option>
                    <option value="ranking_entered"> ¡Bienvenid@! Has entrado en la tabla de clasificación. </option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="searchChilds" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <i class="bi bi-search"></i>
                <input type="search" name="" placeholder="Buscar usuario" id="">
                <select>
                    <option value="" selected>Todos</option>
                    <option value="">Pre-numérico</option>
                    <option value="">Numérico emergente</option>
                    <option value="">Numérico en Desarrollo</option>
                </select>
                <button>Buscar</button>
            </div>
            <div class="modal-body">
                <span>Emily3 completó la lección número 2</span><br>
                <small><data value="">20/20/2025</data></small><br>
                <small> <time datetime="">10:20p.m</time></small>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</html>