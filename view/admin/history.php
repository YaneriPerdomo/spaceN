<?php
include './../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial | Espacio N  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/components/header.css">
    <link rel="stylesheet" href="../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../css/components/row.css">
    <link rel="stylesheet" href="../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../css/admin/helpReportsActivity.css">
    <link rel="stylesheet" href="../../css/components/content.css">

</head>

<body>
    <?php include "./../include/admin/headerHelp.php" ?>
    <main class="">
        <div class="content">
            <h1><b>Recientes</b></h1>
            <p>
                La aplicación web <em>"Eres capaz"</em> te muestra actualizaciones en vivo
                de las actividades que tus niños pueden realizar en la plataforma de aprendizaje.
            </p>
            <hr>
            
            <?php
                 include './../../php/connectionBD.php';
            
                if ($pdo->errorCode() != 0) {
                    echo "Error de conexión: " . $pdo->errorInfo()[2];
                    return; 
                }
            
                $id_profesional = $_SESSION["id_profesional"];
                $inicio = 0;
            
                // Obtener el total de mensajes
                $sqlCountHistorial = "SELECT count(mensaje) AS mensajes FROM historiales WHERE id_profesional = :id";
                $queryCount = $pdo->prepare($sqlCountHistorial);
                $queryCount->bindParam('id', $id_profesional, PDO::PARAM_INT);
                $queryCount->execute();
                $resultsCount = $queryCount->fetch(PDO::FETCH_ASSOC); // Obtener solo el primer resultado
                $totalMensajes = $resultsCount['mensajes'];
            
                // Obtener los siguientes 2 mensajes
                $sqlHistorial = "SELECT id_historial, mensaje, fecha_hora from historiales WHERE id_profesional = :id ORDER by fecha_hora DESC LIMIT 4   ";
                $query = $pdo->prepare($sqlHistorial);
                $query->bindParam('id', $id_profesional, PDO::PARAM_INT);
                $query->execute();
            
                if ($query->rowCount() > 0) {
                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
                    echo " <div class='results' data-limit='4'>";
                    foreach ($results as $value) {
                        echo "
                                <div class='d-flex gap-1'>
                                    <div style='flex-grow: 1;'>
                                        <p class='m-0'>" . $value["mensaje"] . "</p>
                                        <small style='color: #6f6f6f;'>" . $value["fecha_hora"] . "</small>
                                    </div>
                                    <div>
                                        <a href='./../../php/admin/deleteHistory.php?id=" . $value["id_historial"] . "' class='deteleHistory'>
                                            <i class='bi bi-x-lg'></i>
                                        </a>
                                    </div>
                                </div>
                            <hr>";
                    }
                    echo '</div>';
                    // Verificar si hay más mensajes para mostrar
                    if ($inicio + 4 < $totalMensajes) {
                        echo "<small class='show'> <a href=''> Mostrar más </a></small>";
                    }
                }else{
                  
                        echo "<div> No se han encontrado historiales registrados </div>";
                }
            ?>
        
        </div>
    </main>
    <?php include "./../include/footer.php" ?>
</body>
<?php include "./../include/admin/offcanvasAplication.php" ?>
<?php include "./../include/admin/offcanvasUser.php" ?>
<script src="./../../js/helpers/bootstrap.js"></script>
<script src="./../../js/helpers/showHistoryAdmin.js" type="module"></script>

</html>