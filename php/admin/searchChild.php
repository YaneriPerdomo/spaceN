<?php

// Inicia una sesión para almacenar datos del usuario durante la solicitud.
session_start();

// Incluye el archivo que contiene la conexión a la base de datos
// (asegúrate de que 'connectionBD.php' esté en el directorio '../').
include "../connectionBD.php";

// Verifica si hubo algún error al conectar a la base de datos.
if ($pdo->errorCode() != 0) {
    // Si hay un error, muestra un mensaje detallado y detiene la ejecución.
    echo "Error de conexión a la base de datos: " . $pdo->errorInfo()[2];
    exit(); // Detener la ejecución para evitar más errores
}

// Obtiene el término de búsqueda enviado por el usuario a través de la URL.
$searchTerm = $_POST['search'];

// Obtiene el ID del profesional de la sesión actual.
$id = $_SESSION["id_profesional"];

// Prepara la consulta SQL para buscar niños por nombre y ID del profesional.
// Los signos de interrogación (?) son marcadores de posición para los valores que se vincularán más adelante.
$sqlSeach = "SELECT usuario, nombre, apellido,  id_nivel_acceso FROM `ninos`
INNER JOIN usuarios ON ninos.id_usuario = usuarios.id_usuario
WHERE `nombre` LIKE ?  AND `id_profesional` = ?";
$query = $pdo->prepare($sqlSeach);

// Prepara el término de búsqueda para incluir comodines (%) para buscar coincidencias parciales.
$searchTermWithWildcards = '%' . $searchTerm . '%';

// Vincula el término de búsqueda con el primer marcador de posición de la consulta
// y el ID del profesional con el segundo marcador de posición.
$query->bindParam(1, $searchTermWithWildcards, PDO::PARAM_STR);
$query->bindParam(2, $id, PDO::PARAM_INT);

// Ejecuta la consulta preparada.
$query->execute();

// Si la ejecución de la consulta fue exitosa...
if ($query->execute()) {
    // Obtiene todos los resultados de la consulta en un array asociativo.
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // Si se encontraron resultados...
    if ($query->rowCount() > 0) {
 
        echo "<section class='table'>
                        <table class='dataTable' style='  text-align: left;'>
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre </th>
                                    <th> Apellido </th>
                                    <th>Aprendizaje</th>
                                </tr>
                            </thead>";
        // Itera sobre cada resultado y muestra el nombre y apellido del niño.
        foreach ($result as $value) {
            switch ($value["id_nivel_acceso"]) {
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
            echo "<td> " . $value["usuario"] . " </td>";
            echo "<td> " . $value["nombre"] . "</td>";
            echo "<td> " . $value["apellido"] . "</td>";
            echo "<td>" . $showA . "</td>";
            echo "</tr>";
        }
    } else {
        // Si no se encontraron resultados, muestra un mensaje.
        echo "<div style='  text-align: center;'>No se encontraron registros</div>";
    } 
    echo " </table> </section>";

} else {
    // Si hubo un error en la ejecución de la consulta, muestra un mensaje detallado.
    echo "Error en la consulta: " . $query->errorInfo()[2];
}

// Cierra la conexión a la base de datos.
$pdo = null;

?>