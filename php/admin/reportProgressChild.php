<?php
require_once './../../dompdf/autoload.inc.php';

session_start();

// Incluimos el archivo donde se establece la conexión a la base de datos
include "../connectionBD.php";


$id_child = $_POST["id_nino"];

$sqlChild = 'SELECT  id_nivel_acceso, id_genero,  id_usuario, nombre, apellido, COALESCE(ultimo_acceso, "Aún no ha iniciado sesión en la plataforma") as ultimo_acceso from ninos WHERE id_nino=:id_child';
$stmt01 = $pdo->prepare($sqlChild);
$stmt01->bindParam(':id_child', $id_child, PDO::PARAM_INT);
$stmt01->execute();
$row = $stmt01->fetch(PDO::FETCH_ASSOC);

$id_user = $row["id_usuario"];
$sqlUser = 'SELECT * from usuarios WHERE id_usuario=:id_user';
$stmt02 = $pdo->prepare($sqlUser);
$stmt02->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt02->execute();
$row02 = $stmt02->fetch(PDO::FETCH_ASSOC);

$sqlProgressDetalls = "SELECT porcentaje, total_diamantes FROM progresos WHERE id_usuario = :id_user";
$queryProgress = $pdo->prepare($sqlProgressDetalls);
$queryProgress->bindParam("id_user", $id_user, PDO::PARAM_INT);
$queryProgress->execute();
$row03 = $queryProgress->fetch(PDO::FETCH_ASSOC);

$sqlCapacidades = "SELECT SUM(fallida) as F from estado_lecciones WHERE id_usuario = :id";
$queryCapacidades = $pdo->prepare($sqlCapacidades);
$queryCapacidades->bindParam('id', $id_child, PDO::PARAM_INT);
$queryCapacidades->execute();
$result = $queryCapacidades->fetch(PDO::FETCH_ASSOC);

$sqlCount = "SELECT COUNT(completado) as lecciones_completadas 
FROM estado_lecciones 
WHERE completado = 'completado' 
AND id_usuario = :id_user";

// Preparamos la consulta
$queryCount = $pdo->prepare($sqlCount);

// Vinculamos el parámetro :id_user con el valor de la sesión del usuario
$queryCount->bindParam("id_user", $id_user, PDO::PARAM_INT);

// Ejecutamos la consulta preparada
$queryCount->execute();

// Obtenemos el resultado de la consulta como un array asociativo
$lecciones_completadas = $queryCount->fetch(PDO::FETCH_ASSOC);

switch ($row["id_nivel_acceso"]) {
    case '1':
        $accessLevel = 'Pre numerico';
        break;
    case '2':
        $accessLevel = 'Numerico emergente';
        break;
    case '3':
        $accessLevel = 'Desarrollo numerico';
        break;
    default:
        echo '';
        break;
}
list($ano, $mes, $dia) = explode("-", $row02["fecha_hora_creacion"]);
$accountCreationDate = "$dia-$mes-$ano";

switch ($row["id_genero"]) {
    case '1':
        $gender = "data:image/png;base64," . base64_encode(file_get_contents("../../img/childs/boy.png"));
        break;
    case '2':
        $gender = "data:image/png;base64," . base64_encode(file_get_contents("../../img/childs/girl.png"));
        break;
    default:
        break;
}

$gems = $row03["total_diamantes"];
if ($row03["total_diamantes"] > 0) {
    $countgem = "  <span>$gems </span>
                                <span>Diamantes</span>
                            </span> ";
} else {
    $countgem = "  <span> $gems </span>
                                <span>Diamante</span>
                            </span> ";
}

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

switch ($row["id_nivel_acceso"]) {
    case '1':
        $ability = '
            <section class="ability"> 
                <h4 class="colorBlack"> Su capacidad</h2><br>
               <span> Pensamiento Numerico Inicial </span> <br>
              <span class="resultMyAbilities">' . $showStatuC . '</span>  
            </section>
                ';
        break;
    case '2':
        $ability = '
         <section class="ability"> 
                <h4 > Su capacidad  </h2><br>
               <span> Descifrando la comprensión numérica </span> <br>
              <span class="resultMyAbilities">' . $showStatuC . '</span>   
            </section>
               ';
        break;
    case '3':
        $ability = '
         <section class="ability">
                <h4 >Su capacidad </h2><br>
               <span>Resolución de problemas numéricos </span> <br>
              <span class="resultMyAbilities">' . $showStatuC . '</span>
            </section>
              ';
        break;
}

$currentDate = date('Y-m-d');
//convert png to data
$gemImg = "data:image/jpg;base64," . base64_encode(file_get_contents("../../img/report/gem.png"));
$lessonsCount = "data:image/jpg;base64," . base64_encode(file_get_contents("../../img/report/lessonCount.png"));
// Contenido HTML
$html = '
    <head>
        <style>
   
        .informationG {
        background: #916df4;
        color: white;
        padding: 1rem;
        margin:0rem;
        border-radius: 1rem 1rem 0rem 0rem;
        background: rgb(145, 109, 242);
        background: linear-gradient(0deg, rgba(145, 109, 242, 1) 35%, rgba(139, 103, 238, 1) 84%);
        }

       

        .nivel {
        color: #d5c5ff;
        }

        .ability{
            background:rgb(255, 69, 100);
            color:white;
            border-radius: 0rem 0rem 1rem 1rem;

        }

       

        .myProgress {
            background: #ff7d45;
            display: block;
            padding: 0.6rem 1rem;
            color: white;
            margin: 0;
        }
        .progress {
            margin:0rem
            padding:1rem;
        }

        .flexProgress {
            margin:0rem;
            padding:1rem;
            width:100%;
        }

        h1 {
            margin:0rem
        }

        .content {
            padding: 1rem;
            background:white;
        }

        .flexProgress {
            padding: 0rem 0rem;
            margin:0rem;
        }
        .h3 {
            margin:0rem;
            padding:0rem;
        }

        .imgUser > img {
            width: 100px;
            height:90px;
        }
        .detallsGems > img, .detallsLessons > img {
            width: 85px;
            height: 80px;
        }

        .bgGem {
            padding: 0.6rem 0.9rem;
            background:#2e7bcc;
            color:white;
        }

        .bgLesson {
            padding: 0.6rem 0.9rem;
            background:#cc2e2e;
            margin:0rem;
            color:white;
        }


        h2 {
            padding: 0.6rem 0.9rem;
            color:white;
            margin:0rem;
            background: #2d2d2d;
        }

        .informationG, h3, .detallsGems, .flexProgress, h4 {
            text-align: center;
        }
        body {  
            background: #f2f2f2;
        }

        .colorGris {
             color: #bba2ff;
        }
  </style>
</head>
<body>
    <main style="width: 100%;">
        <div class="content">
            <section class="informationG"> 
                <div class="User"> 
                    <h1> ' . $row02["usuario"] . '</h1>
                    <span class="colorGris"> ' . $row["nombre"] . ' ' . $row["apellido"] . '</span><br>
                    <span class="nivel"> Nivel de acceso: ' . $accessLevel . ' </span><br>
                    <span class="nivel"> Ultimo acceso: ' . $row["ultimo_acceso"] . ' </span>
                </div>
                <div class="imgUser">
                     <img src="' . $gender . '" >
                </div>
            </section>
            <section class="progress">
                <h3 class="myProgress">PROGRESO</h3>
                <div class="flexProgress"> 
                    <div>
                        <h2>
                        ' . $row03["porcentaje"] . ' %
                        </h2>
                    </div>
                    <div>
                        <div class="bgGem">
                                <span class="detallsGems">
                            <img src="' . $gemImg . '"><br>
                            ' . $countgem . ' 
                        </div>
                        <div class="bgLesson">
                            <span class="detallsLessons">
                                <img src="' . $lessonsCount . '"><br>
                                <span>' . $lecciones_completadas["lecciones_completadas"] . '/4</span>    
                                <span>Lecciones</span>
                            </span>
                        </div> 
                    </div>
                    <div class="ability">
                        ' . $ability . '
                    </div>
                    
                   <small class="currentDate">  '. $currentDate.' </small>
                </div>
            </section>
        </div>
    </main>
</body>';

// Crear una instancia de DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options); //Objeto domPdf

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño del papel, orientación, etc.
$dompdf->setPaper('letter');

// Renderizar el PDF
$dompdf->render();

// Descargar el PDF
$name = $row02["usuario"];
$dompdf->stream("My_progreso_$name.pdf", array("Attachment" => 1));

?>