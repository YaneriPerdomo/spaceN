<?php
    function showTableRead($accessLevel){
        include './../../../php/connectionBD.php';

        try {

            $typeAccess = $accessLevel;
            $id = $_SESSION["id_user"];
            $sqlShowTableC = "SELECT usuario, total_diamantes,  usuarios.id_usuario as id_usuario_nino
                                 FROM progresos JOIN 
                                usuarios ON progresos.id_usuario = usuarios.id_usuario 
                                WHERE id_nivel_acceso = :Access AND total_diamantes != 0 LIMIT 5 ";

            $query = $pdo->prepare($sqlShowTableC);
            $query->bindParam("Access", $typeAccess, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){      
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
                $mejores .= ' <tr class="contentTableC fs-5 spaceTableC">
                            
                            <td> ' . $statu . ' ' . $value["usuario"] . '</td>
                           <td>' . $value["total_diamantes"] . '</td>
                            </tr> ';


            }
            echo '<section class="tableC">
                        <table class="results w-100">
                                                        <tbody >
                                                             ' . $mejores . '
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                </section>';

            }else{
                echo "No se han encontrado mejores usuarios";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $pdo = null;

        }

    }
?>