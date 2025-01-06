<?php
function showProgressUser()
{
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
        ;


        $ability = match ($_SESSION["accessLevel"]) {
            1 => '
        <h4 class="titleMyAbilities">Mi capacidad </h4>
        <div class="d-flex gap-2 containerMyAbilities">
            <div class="one">
                <div>
                    <i class="bi bi-list-ol fs-1"></i>
                </div>
                <span class="p-1">Pensamiento Numérico Inicial</span>
                <span class="resultMyAbilities">' . htmlspecialchars($showStatuC) . '</span> 
            </div>
        </div>
    ',
            2 => '
        <h4 class="titleMyAbilities">Mi capacidad </h4>
        <div class="d-flex gap-2 containerMyAbilities">
            <div class="one">
                <div>
                    <i class="bi bi-list-ol fs-1"></i>
                </div>
                <span class="p-1">Descifrando la comprensión numérica</span>
                <span class="resultMyAbilities">' . htmlspecialchars($showStatuC) . '</span> 
            </div>
        </div>
    ',
            3 => '
        <h4 class="titleMyAbilities">Mi capacidad </h4>
        <div class="d-flex gap-2 containerMyAbilities">
            <div class="one">
                <div>
                    <i class="bi bi-list-ol fs-1"></i>
                </div>
                <span class="p-1">Resolución de problemas numéricos</span>
                <span class="resultMyAbilities">' . htmlspecialchars($showStatuC) . '</span> 
            </div>
        </div>
    ',
        };




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
           <div class="col-sm-4 col-12">
               <div class="container">
                   <div class="card">
                       <div class="box">
                           <div class="percent">
                               <svg>
                                   <circle cx="70" cy="70" r="70"></circle>
                                   <circle cx="70" cy="70" r="70"
                                       style="
                                         : calc(440 - (440 * ' . $arreyAssociative["porcentaje"] . ') / 100);
                                        -webkit-stroke-dashoffset: calc(440 - (440 * ' . $arreyAssociative["porcentaje"] . ') / 100);
                                        -moz-stroke-dashoffset: calc(440 - (440 * ' . $arreyAssociative["porcentaje"] . ') / 100);
                                        "></circle>
                                   <div class="num">
                                       <h2>' . $arreyAssociative["porcentaje"] . '<span> %</span></h2>
                                   </div>
                               </svg>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-sm-8 col-12">
               <div class="row  justify-content-sm-start justify-content-around">
                   <div class="col-4 ">
                       <div class="d-flex gap-2 dem flex-wrap gemT">
                           <div>
                               <i class="bi bi-gem fs-1"></i><br>
                           </div>
                           <div class="detallsGems">
                              ' . $countgem . '
                           </div>
                       </div>
                   </div>
                   <div class="col-4 ">
                       <div class="d-flex gap-2 lessons flex-nowrap ">
                           <div>
                               <i class="bi bi-person-video3 fs-1"></i>
                           </div>
                           <div class="detallsLessons">
                               <span>' . $lecciones_completadas["lecciones_completadas"] . '/4 </span> <br>
                               <span>Lecciones</span>
                           </div>
                       </div>
                   </div>
               </div>
               <hr>
               <section class="d-sm-block d-flex align-items-center flex-column">
                   ' . $ability . '
               </section>
              
           </div>
           <div>
           
           </div>
           
           </div>
             <hr><br>';
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
?>