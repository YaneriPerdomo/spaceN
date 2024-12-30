<?php
function showHistorys($showPageLearn = false)
{
    include './../../../php/connectionBD.php';

    if ($pdo->errorCode() != 0) {
        echo "Error de conexión: " . $pdo->errorInfo()[2];
    }
    try {
        $showPageLearn == true ? $sqlHistorial = "SELECT mensaje, fecha_hora from historiales WHERE id_nino = :id ORDER BY fecha_hora DESC LIMIT 3 " : $sqlHistorial = "SELECT mensaje, fecha_hora from historiales WHERE id_nino = :id ";

        $id_child = $_SESSION["id_Child"];
        $query = $pdo->prepare($sqlHistorial);
        $query->bindParam('id', $id_child, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            $count = 0;
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $value) {
                $count++;
                echo "<div class='d-flex  flex-column'>
                        <p class='m-0'>" . $value["mensaje"] . "</p>
                        <small  style='color: #6f6f6f;'> " . $value["fecha_hora"] . " </small>
            </div> <hr>";            
            }
            if($showPageLearn == true){
                if($count >= 3 ){
                    echo "<small> <a href='./history.php'> Ver todas</a></small>";
                }
            }
        } else {
            echo "<div> No se han encontrado historiales registrados </div>";
        }

    } catch (PDOException $ex) {
        echo $ex;
    }

    $pdo = null;
}
?>