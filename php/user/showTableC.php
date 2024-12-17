<?php

include './../validations/authorizedChild.php';
include './../connectionBD.php';

try {

    $typeAccess = $_POST["typeAccess"];
    $id = $_SESSION["id_user"];
    $sqlShowTableC = "SELECT usuario, total_diamantes,  usuarios.id_usuario as id_usuario_nino
                         FROM progresos JOIN 
                        usuarios ON progresos.id_usuario = usuarios.id_usuario 
                        WHERE id_categoria_actividades = :Access LIMIT 5 ";

    $query = $pdo->prepare($sqlShowTableC);
    $query->bindParam("Access", $typeAccess, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $mejores = "";
    $count = 0;
    foreach ($result as $value) {
        $count++;
        switch ($count) {
            case 1:
                $statu = '<i class="bi bi-award" style="color: rgb(239, 185, 67);;"></i>';
                break;
            case 2:
                $statu = '<i class="bi bi-award" style="color:rgb(62, 151, 203);"></i>';
                break;
            case 3:
                $statu = '<i class="bi bi-award" style="color:rgb(162, 70, 243);"></i>';
                break;
            case 4:
                $statu = '<i class="bi bi-award"></i> rgb(72, 72, 72);';
                break;
            case 5:
                $statu = '<i class="bi bi-award"></i> rgb(72,72,72);';
                break;
            default:
                # code...
                break;
        }
        $mejores .= ' <tr class="contentTableC fs-5">
                    
                    <td> ' . $statu . ' ' . $value["usuario"] . '</td>
                   <td>' . $value["total_diamantes"] . '</td>
                 </tr>';


    }

    $user = "";
    foreach ($result as $value) {
        if ($value["id_usuario_nino"] == $id) {
            $user = '<tr class="contentTableC fs-5">
                        <td><i class="bi bi-emoji-smile"></i> ' . $value["usuario"] . '</td>
                        <td>' . $value["total_diamantes"] . '</td>
                    </tr>';
            break;
        }
    }

    echo '<section class="tableC">
                                            <h4>Clasificaciones actuales </h4>
                                            <table class="results w-100">
                                                <tbody >
                                                     ' . $mejores . '
                                                </tbody>
                                            </table>
                                            <br><br>
                                            <table class="you w-100">
                                                <tbody style="padding:0.6rem" >
                                                    <tr>
                                                        ' . $user . '
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </section>';

} catch (PDOException $ex) {
    echo $ex->getMessage();
}

$pdo = null;

?>