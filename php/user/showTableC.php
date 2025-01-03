<?php

include './../validations/authorizedChild.php';
include './../connectionBD.php';

try {

    $typeAccess = $_POST["typeAccess"];
    $id = $_SESSION["id_user"];
    $sqlShowTableC = "SELECT usuario, total_diamantes,  usuarios.id_usuario as id_usuario_nino FROM progresos JOIN  
                        usuarios ON progresos.id_usuario = usuarios.id_usuario  WHERE id_nivel_acceso = :Access
                        AND total_diamantes != 0 ORDER BY total_diamantes DESC LIMIT 5";

    $query = $pdo->prepare($sqlShowTableC);
    $query->bindParam("Access", $typeAccess, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $bests = "";
    $coronasIcon = [
        '<i class="bi bi-award" style="color: rgb(239, 185, 67);;"></i>', 
        '<i class="bi bi-award" style="color:rgb(62, 151, 203);"></i>',
        '<i class="bi bi-award" style="color:rgb(162, 70, 243);"></i>', 
        '<i class="bi bi-award"></i> rgb(72, 72, 72)', 
        '<i class="bi bi-award"></i> rgb(72,72,72)', 
    ];

    foreach ($result as $key => $value) {
        $bests .= '<tr class="contentTableC fs-5">       
                    <td> ' . $coronasIcon[$key] . ' ' . $value["usuario"] . '</td>
                    <td>' . $value["total_diamantes"] . '</td>
                  </tr>';
    }

    $sqlUserGems = "SELECT total_diamantes, id_usuario FROM progresos WHERE id_usuario = :id ";
    $queryUserGems = $pdo->prepare($sqlUserGems);
    $queryUserGems->bindParam("id", $_SESSION["id_user"], PDO::PARAM_INT);
    $queryUserGems->execute();
    $resultUserGems = $queryUserGems->fetch(PDO::FETCH_ASSOC);


    echo '<section class="tableC">
            <h4>Clasificaciones actuales </h4>
                <table class="results w-100">
                    <tbody >
                        ' . $bests . '
                    </tbody>
                </table>
                    <br><br>
                    <table class="you w-100">
                    <tbody style="padding:0.6rem" >
                        <br>
                        <tr class="contentTableC fs-5">
                            <td><i class="bi bi-emoji-smile"></i> ' . $_SESSION["user"] . '</td>
                            <td>' . $resultUserGems["total_diamantes"] . '</td>
                        </tr>
                    </tbody>
                </table>
        </section>';
} catch (PDOException $ex) {
    echo 'Error a la base de datos:' . $ex->getMessage();
}finally{
    $pdo = null;
}

?>