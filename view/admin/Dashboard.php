<?php

session_start();

// Verificamos si el usuario está autenticado (ejemplo: si existe una variable de sesión 'usuario_logueado')
if (!isset($_SESSION['id_admin'])) {
    // Si no está autenticado, redireccionamos a la página de login
    header('Location: ./../../index.php');
    exit();
}



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

    .configurationProfile>div {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .personalInformation>.information>.imgUser>img {
        background: #ff4343;
        height: 150px;
        min-width: 200px;
        max-width: 500px;
        clip-path: circle(40% at 50% 50%);
    }

    .information {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .information>div>label {
        margin-bottom: 0.3rem;
    }

    .containerSendNotification , .containerDeleteChild{
        width: 100vw;
        height: 100vh;
        position: absolute;
        display: flex;
        justify-content: center;
        background: green;
        align-items: center;
        background: rgb(0, 0, 0, 0.5);
    }

    .containerSendNotification>.content, .containerDeleteChild > .content {
        max-width: 500px;
        padding: 1rem;
        background: white;
        min-width: 200px;
    }

    .openModal {
        animation: openModal 0.5s;
    }

    @keyframes openModal {
        0% {
            transform: translateY(-15%);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;

        }

        100% {
            transform: translateY(0%);
            opacity: 1;
        }
    }

    .cancelModal {
        opacity: 0;
        /* transform: translateY(100%); */
        transition: all 0.3s ease-in-out;
    }

    [type="search"]:focus{
        filter: drop-shadow(0.0rem 0.0rem 0.2rem var(--colorHF)) !important;
     }
</style>

<body>

    <?php include './../include/admin/header.php' ?>
    <main class="">
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
                            <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="search" class="form-control" placeholder="Buscar..." aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>

                        </div>
                        <div>
                            <a href="./child/add.php">Agregar niño</a>
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
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <?php

                        function showChilds()
                        {
                            // Incluimos el archivo de conexión a la base de datos
                            include '../../php/connectionBD.php';
                            $id_admin = $_SESSION["id_profesional"];
                            // Preparamos la consulta SQL para obtener información de los niños
                            // Se realiza una unión entre las tablas 'ninos' y 'usuarios' para obtener más datos
                            // Se filtra por el id_profesional para obtener los niños de un profesional específico (en este caso, el de ID 7)
                            $sqlSelect = 'SELECT id_nino, ninos.id_usuario as id_usuario_nino, usuario, nombre, apellido, id_categoria_actividades, fecha_nacimiento FROM ninos 
                            INNER JOIN usuarios ON ninos.id_usuario = usuarios.id_usuario WHERE id_profesional = :id';

                            // Preparamos la sentencia SQL para evitar inyección SQL
                            $stmt = $pdo->prepare($sqlSelect);
                            $stmt->bindParam('id', $id_admin , PDO::PARAM_INT);
                            // Ejecutamos la consulta
                            $stmt->execute();

                            // Verificamos si se encontraron resultados
                            if ($stmt->rowCount() > 0) {
                                // Si hay resultados, los obtenemos en un array asociativo
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Iteramos sobre cada fila del resultado
                                foreach ($result as $row) {
                                    // Obtenemos la categoría de actividad y la asignamos a una variable
                        
                                    switch ($row["id_categoria_actividades"]) {
                                        case 1:
                                            $showA = "Pre Numerico";
                                            break;
                                        case 2:
                                            $showA = "Numerico Emergente";
                                            break;
                                        case 3:
                                            $showA = "Desarrollo Numerico";
                                            break;
                                        default:
                                            $showA = "Categoría desconocida";
                                    }

                                    $fecha_nacimiento = $row["fecha_nacimiento"];
                                    $fecha_actual = date("Y-m-d"); // Obtener la fecha actual completa
                                    // Convertir ambas fechas a timestamps
                                    $timestamp_nacimiento = strtotime($fecha_nacimiento);
                                    $timestamp_actual = strtotime($fecha_actual);
                                    // Calcular la diferencia en segundos
                                    $diferencia_segundos = $timestamp_actual - $timestamp_nacimiento;
                                    // Convertir la diferencia de segundos a años (aproximado)
                                    $edad_en_anos = floor($diferencia_segundos / (60 * 60 * 24 * 365.25));
                                    // Generamos una fila en una tabla HTML con los datos del niño
                                    echo "<tr class='show'>";
                                    echo "<td >" . $row['usuario'] . "</td>";
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['apellido'] . "</td>";
                                    echo "<td>" . $edad_en_anos . "</td>";
                                    echo "<td>" . $showA . "</td>";
                                    echo "<td class='operations'>";
                                    echo "<button class='OpenDeleteChild' data-idc='" . $row['id_nino'] . "' data-idu='" . $row['id_usuario_nino'] . "'><i class='bi bi-trash'></i></button>";
                                    echo "<a href='child/modify.php?id=" . $row['id_nino'] . "'><button><i class='bi bi-person-lines-fill'></i></button></a>";
                                    echo "<button><i class='bi bi-bar-chart'></i></button></a>";
                                    echo "<button class='OpenSendNotificationChild' data-idS='" . $row['id_nino'] . "' > <i class='bi bi-send-plus'></i></button> ";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                // Si no hay resultados, mostramos un mensaje
                                echo "<br>";
                                echo "<p>No hay registros disponibles en este momento.</p>";
                            }
                        }
                        showChilds();
                        ?>

                    </table>
                </section>
            </div>
        </div>
    </main>
    <?php include './../include/admin/footer.php' ?>

    <div class="containerDeleteChild" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel"><b>Envio de notificacion</b></h1>
                    <small>Puedes enviarle una notificación para <small class="nameChildS"></small></small>
                </div>
            </div>
            <form action="./../../php/DeleteChild.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_childC" value="">
                    <input type="hidden" name="id_childU">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary CancelModalDelet">Cancelar</button>
                    <button type="submit" class="btn btn-success">Eliminar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="containerSendNotification" style="display:none">
        <div class="modal-content content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel"><b>Envio de notificacion</b></h1>
                    <small>Puedes enviarle una notificación para <small class="nameChildS"></small></small>
                </div>
            </div>
            <form action="./../../php/sendNotificationChild.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_child" class="id_child" value="">
                    <input type="hidden" name="id_profesional" value="<?php echo $_SESSION["id_profesional"] ?> ">
                    <select name="messenger" class="w-100">
                        <option selected value="¡Felicidades! Has completado una leccion mas.">¡Felicidades! Has
                            completado una lección mas. </option>
                        <option value="¡Genial! Has ganado mas estrellas."> ¡Genial! Has ganado más estrellas. ✨
                        </option>
                        <option value="¡Lo lograste! Has superado la etapa 1."> ¡Lo lograste! Has superado la etapa 1.
                        </option>
                        <option value="¡Sigue asi! Has pasado a la etapa 2."> ¡Sigue así! Has pasado a la etapa 2.
                        </option>
                        <option value="¡Enhorabuena! Has completado todo el aprendizaje."> ¡Enhorabuena! Has completado
                            todo el aprendizaje. </option>
                        <option value="¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.">
                            ¡Ascendiste en la tabla de clasificación! Estás más cerca de la cima.
                        </option>
                        <option value="ranking_entered"> ¡Bienvenid@! Has entrado en la tabla de clasificación.
                        </option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary CanceSendN">Cancelar</button>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>


<?php include "../include/admin/offcanvasAplication.php" ?>
<?php include "../include/admin/offcanvasUser.php" ?>
<?php include "../include/admin/detailsActivity.php" ?>
<?php include "../include/admin/sendNotificationChild.php" ?>
<?php include "../include/admin/searchChilds.php" ?>



<script>
    let $containerDeleteChild = document.querySelector(".containerDeleteChild");
    let $containerSendNotification = document.querySelector(".containerSendNotification");
    let $contentSend = document.querySelector(".containerSendNotification > .content");
    let $contentDelete =document.querySelector(".containerDeleteChild > .content");
    let $htmlIdChild = document.querySelector('.id_child');
    let $idChildDelete =document.querySelector("[name='id_childC']")
    let $nameChildS = document.querySelector(".nameChildS");
    let $idChildD =document.querySelector(`[name="id_childU"]`)
    document.addEventListener("click", e => {

        if (e.target.matches(".CanceSendN")) {
            $containerSendNotification.style.display = "none";
        }
        if(e.target.matches(".OpenDeleteChild")){
            $containerDeleteChild.removeAttribute("style");
            $contentDelete.classList.add("openModal");
            $idChildDelete.value = e.target.getAttribute("data-idc");
            $idChildD.value = e.target.getAttribute("data-idu");
        }

        if(e.target.matches(".CancelModalDelet")){
            $containerDeleteChild.style.display = "none";
        }

        if (e.target.matches(".OpenSendNotificationChild")) {
            $containerSendNotification.removeAttribute("style");
            $contentSend.classList.add("openModal")
            $nameChildS.innerHTML = e.target.getAttribute("data-nameS")
            $htmlIdChild.value = e.target.getAttribute("data-idS");
        }
        if (e.target.matches(`.sendNotificationChild`)) {
            setTimeout(() => {
                alert("hol")
                console.log(`hola ${e.target.getAttribute("data-id")}`);
                $htmlIdChild.value = `${e.target.getAttribute("data-id")}`;
            }, 1000);
        }

    })

</script>

<script src="./../../js/helpers/searchChilds.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</html>