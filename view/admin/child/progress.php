<?php
  include './../../../php/validations/authorizedUser.php';

function showInformationChild (){

include '../../../php/connectionBD.php';

// Verificamos si hubo algún error al conectar a la base de datos
if ($pdo->errorCode() != 0) {
    // Si hay un error, mostramos un mensaje y detenemos la ejecución
    die("Error de conexión a la base de datos: " . $pdo->errorInfo()[2]);
}  
try {
    
    $id_child = $_GET["id"];
    $sqlChild = 'SELECT * from ninos WHERE id_nino=:id_child';
    $stmt01 = $pdo->prepare($sqlChild);
    $stmt01->bindParam(':id_child',$id_child, PDO::PARAM_INT);
    $stmt01->execute();
    $row = $stmt01->fetch( PDO::FETCH_ASSOC);

    $id_user = $row["id_usuario"];
    $sqlUser = 'SELECT * from usuarios WHERE id_usuario=:id_user';
    $stmt02 = $pdo->prepare($sqlUser);
    $stmt02->bindParam(':id_user',$id_user, PDO::PARAM_INT);
    $stmt02->execute();
    $row02 = $stmt02->fetch(PDO::FETCH_ASSOC);

    switch ($row["id_categoria_actividades"]) {
        case '1':
            $accessLevel =  'Pre numerico';
            break;
        case '2':
            $accessLevel =   'Numerico emergente';
            break;
        case '3':
            $accessLevel =   'Desarrollo numerico';
            break;
        default:
            echo '';
            break;
    }
    list($ano, $mes, $dia) = explode("-", $row02["fecha_hora_creacion"]);
    $accountCreationDate = "$dia-$mes-$ano";

    switch ($row["id_genero"]) {
        case '1':
            $gender = "../../../img/childs/boy.png";
            break;
        case '2':
            $gender = "../../../img/childs/girl.png";
        break;        
        default:
            # code...
            break;
    }
    echo "<div class=''>";
    echo "<h2 class='user m-0'> ". $row02["usuario"]. "</h1>";
    echo "<div class='informationUser'>";
    echo "<span class='titleComplete'> ". $row["nombre"]. " ". $row["apellido"] ."</span><br>";
    echo "<span> Nivel de acceso: ".   $accessLevel . " </span>";
    echo "<br>";
    echo "<span> Ultimo acceso: ". $row["ultimo_acceso"] . " </span>";
    echo "<br>";
    echo " </div>
                </div>";
    echo "<div class=''>";
    echo "<label for='' data-checked='true'>
            <img src='". $gender."' alt=''>
          </label>";
    echo "</div>";
} catch (PDOException $ex) {
    echo 'Sucedio un error: ' . $ex;
}
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
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../css/user/profile.css">
</head>


<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main class='align-items-start'>
        <div class="content">
            <div class="d-flex align-items-center     justify-content-between">
                <?php 
                    showInformationChild();
                ?>
            </div>

            <div>
                <h4 class=" myProgress">PROGRESO</h4>
                <div class="row ContainerProgress">
                    <div class="col-4">
                        <div class="container">
                            <div class="card">
                                <div class="box">
                                    <div class="percent">
                                        <svg>
                                            <circle cx="70" cy="70" r="70"></circle>
                                            <circle cx="70" cy="70" r="70"
                                                style="stroke-dashoffset: calc(440 - (440 * 20) / 100);"></circle>
                                            <div class="num">
                                                <h2>0<span>%</span></h2>
                                            </div>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-8'>
                        <div class="row">
                            <div class='col-4'>
                                <div class="d-flex gap-2 dem">
                                    <div>
                                        <i class="bi bi-gem fs-1"></i><br>
                                    </div>
                                    <div class="detallsGems">
                                        <span>300</span>
                                        <span>Diamantes</span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-4 '>
                                <div class="d-flex gap-2 lessons">
                                    <div>
                                        <i class="bi bi-person-video3 fs-1"></i>
                                    </div>
                                    <div class="detallsLessons">
                                        6/6
                                        <span>Lecciones</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <section>
                            <h4 class="titleMyAbilities">Capacidades </h2>
                                <div class='d-flex gap-2 containerMyAbilities'>
                                    <div class="one">
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span class="p-1">Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                    <div class="">
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span>Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                    <div>
                                        <div>
                                            <i class="bi bi-list-ol fs-1"></i>
                                        </div>
                                        <span>Denominacion de numeros</span><br>
                                        <span>Bien</span>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <div>
                    </div>
                </div><hr>
                <div class="my-3 text-center"><button class="btn btn-secondary  text-decoration-none">
                    Imprimir <b>PDF</b>
                </button></div>
            </div>

    </main>
    <?php include "./../../include/footer.php" ?>
</body>
<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<script src="./../../../js/helpers/bootstrap.js"></script>


</html>