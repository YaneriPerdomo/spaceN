<?php
function showHistorys($showPageLearn = false)
{
    include './../../php/connectionBD.php';

    if ($pdo->errorCode() != 0) {
        echo "Error de conexión: " . $pdo->errorInfo()[2];
    }
    try {
        $showPageLearn == true ? $sqlHistorial = "SELECT id_historial, mensaje, fecha_hora from historiales WHERE id_profesional = :id ORDER BY fecha_hora DESC LIMIT 3 "
            : $sqlHistorial = "SELECT id_historial, mensaje, fecha_hora from historiales WHERE id_profesional = :id ";

        $id_profesional = $_SESSION["id_profesional"];
        $query = $pdo->prepare($sqlHistorial);
        $query->bindParam('id', $id_profesional, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($query->rowCount() > 0) {

            if ($showPageLearn == true) {
                $count = 0;
                foreach ($results as $value) {
                    $count++;
                    echo "<div class='d-flex'>
                <div class='d-flex  flex-column'>
                            <p class='m-0'>" . $value["mensaje"] . "</p>
                            <small  style='color: #6f6f6f;'> " . $value["fecha_hora"] . " </small>
                </div>
                 <button type='button' class='deleteH dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown'
                                aria-expanded='false'>
                                <span class='visually-hidden'>Toggle Dropdown</span>
                            </button>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='./../../php/admin/deleteHistory.php?id=" . $value["id_historial"] . "'><i class='bi bi-trash'></i> Borrar</a></li>
                            </ul>
                
                </div><hr>";
                    if ($count > 3) {
                        echo "<small> <a href='./history.php'> Ver todas</a></small>";
                    }

                }
            } else {
                foreach ($results as $value) {
                    echo "<div class='d-flex gap-1'>
                        <div style='  flex-grow: 1;'>
                            <p class='m-0'>
                                " . $value["mensaje"] . "
                            </p>
                            <small  style='color: #6f6f6f;'> " . $value["fecha_hora"] . " </small>
                        </div>
                        <div>
                            <a href='./../../php/admin/deleteHistory.php?id=" . $value["id_historial"] . "' class='deteleHistory'>
                                <i class='bi bi-x-lg'></i>
                            </a>
                        </div>
                    </div>
                <hr>";
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