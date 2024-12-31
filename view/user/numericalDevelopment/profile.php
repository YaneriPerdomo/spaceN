<?php
    
    include './../../../php/validations/authorizedChild.php';

    
function showProgressUser(){
    include './../../../php/connectionBD.php';
try {
    
$sql = "SELECT COUNT(completado) as lecciones_completadas 
FROM estado_lecciones 
WHERE completado = 'completado' 
AND id_usuario = :id_user";

// Preparamos la consulta
$query = $pdo->prepare($sql);

// Vinculamos el parámetro :id_user con el valor de la sesión del usuario
$query->bindParam("id_user", $_SESSION["id_user"], PDO::PARAM_INT);

// Ejecutamos la consulta preparada
$query->execute();

// Obtenemos el resultado de la consulta como un array asociativo
$lecciones_completadas = $query->fetch(PDO::FETCH_ASSOC);

// Mostramos el número de lecciones completadas

$sqlProgressDetalls = "SELECT porcentaje, total_diamantes FROM progresos WHERE id_usuario = :id_user";
$queryProgress = $pdo->prepare($sqlProgressDetalls);

$queryProgress->bindParam("id_user", $_SESSION["id_user"], PDO::PARAM_INT);

$queryProgress->execute();
$arreyAssociative = $queryProgress->fetch(PDO::FETCH_ASSOC);
$sqlCapacidades = "SELECT SUM(fallida) as F from estado_lecciones WHERE id_usuario = :id";
$queryCapacidades = $pdo->prepare($sqlCapacidades);
$queryCapacidades->bindParam('id', $_SESSION["id_user"], PDO::PARAM_INT);
$queryCapacidades->execute();
$result = $queryCapacidades->fetch(PDO::FETCH_ASSOC);

 $estados = [
    null => "Aún no tenemos datos",
    0 => 'EXCELENTE',
    16 => 'BIEN',
    41 => 'HAY QUE MEJORAR',
    'default' => 'MUY MALO'
];

$showStatuC = 'default';


foreach ($estados as $rango => $estado) {
    if ($result['F'] <= $rango) {
        $showStatuC = $estado;
        break;
    }
}


$gems = $arreyAssociative["total_diamantes"];
if ($arreyAssociative["total_diamantes"] > 0) {
    $countgem = "  <span>$gems </span><br>
                        <span>Diamantes</span>
                    </span> ";
} else {
    $countgem = "  <span> $gems </span><br>
                        <span>Diamante</span><br>
                    </span> ";
}

echo '  <div class="row ContainerProgress">
           <div class="col-4">
               <div class="container">
                   <div class="card">
                       <div class="box">
                           <div class="percent">
                               <svg>
                                   <circle cx="70" cy="70" r="70"></circle>
                                   <circle cx="70" cy="70" r="70"
                                       style="
                                         : calc(440 - (440 * '. $arreyAssociative["porcentaje"]. ') / 100);
                                        -webkit-stroke-dashoffset: calc(440 - (440 * '. $arreyAssociative["porcentaje"]. ') / 100);
                                        -moz-stroke-dashoffset: calc(440 - (440 * '. $arreyAssociative["porcentaje"]. ') / 100);
                                        "></circle>
                                   <div class="num">
                                       <h2>'. $arreyAssociative["porcentaje"]. '<span> %</span></h2>
                                   </div>
                               </svg>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-8">
               <div class="row">
                   <div class="col-4">
                       <div class="d-flex gap-2 dem">
                           <div>
                               <i class="bi bi-gem fs-1"></i><br>
                           </div>
                           <div class="detallsGems">
                              '. $countgem.'
                           </div>
                       </div>
                   </div>
                   <div class="col-4 ">
                       <div class="d-flex gap-2 lessons">
                           <div>
                               <i class="bi bi-person-video3 fs-1"></i>
                           </div>
                           <div class="detallsLessons">
                               <span>' . $lecciones_completadas["lecciones_completadas"] .'/4 </span>
                               <span>Lecciones</span>
                           </div>
                       </div>
                   </div>
               </div>
               <hr>
               <section>
                   <h4 class="titleMyAbilities">Mi capacidad </h2>
                       <div class="d-flex gap-2 containerMyAbilities">
                           <div class="one">
                               <div>
                                   <i class="bi bi-list-ol fs-1"></i>
                               </div>
                               <span class="p-1">Pensamiento Numérico Inicial</span>
                               <span class="resultMyAbilities">'. $showStatuC. '</span>
                           </div>
                       </div>
               </section>
           </div>
           <div>
           </div>
       </div>';
} catch (PDOException $th) {
    echo $th->getMessage();
}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | :3</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../css/user/profile.css">
    <link rel="stylesheet" href="../../../css/components/content.css">

    <style>
        .one{
            max-width: 170px;
            min-width: 120px;
        }

        .resultMyAbilities{
            color: white;
            font-weight: bold;
            display: inherit;
            background: #ff7d45;
            border-radius: 0rem 0rem 1rem 1rem;
            margin-top: 0.3rem;
        }
    </style>

</head>

<body>

    <?php include './../../include/user/header.php' ?>

    <main class='align-items-start'>
        <div class="content">
            <div class="d-flex align-items-center     justify-content-between">
                <div class="">
                    <h2 class="user m-0"><?php echo $_SESSION['user'] ?? '' ?></h1>
                        <div class="informationUser">
                            <span
                                class="titleComplete"><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?? '' ?></span><br>
                            <span>Nivel de acceso: <?php
                            switch ($_SESSION["accessLevel"]) {
                                case '1':
                                    echo 'Pre numerico';
                                    break;
                                case '2':
                                    echo 'Numerico emergente';
                                    break;
                                case '3':
                                    echo 'Desarrollo numerico';
                                    break;
                                default:
                                    echo '';
                                    break;
                            }
                            ?>
                            </span><br>
                            <span>Fecha de creacion: <?php
                            list($ano, $mes, $dia) = explode("-", $_SESSION["accountCreationDate"]);
                            echo "$dia-$mes-$ano" ?></span><br>
                        </div>
                </div>
                <div class="">
                    <label for="" data-checked="true">
                        <input type="radio" id="" name="gender" value="1" ckecked>
                        <img  src="<?php $_SESSION["gender"] == "1" ? $gender = '../../../img/childs/boy.png' : $gender = '../../../img/childs/girl.png';
                        echo $gender ?>" alt="" class="checked border-0">
                    </label>
                </div>
            </div>

            <div>
                <h4 class=" myProgress">MI PROGRESO</h4>
                 <?php 
                 showProgressUser();
                 ?>
            </div>

    </main>

    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>

</body>
<script src="./../../../js/helpers/bootstrap.js"></script>

</html>