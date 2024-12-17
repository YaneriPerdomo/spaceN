<?php
include './../../../php/validations/authorizedChild.php';
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
    <link rel="stylesheet" href="../../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../../css/components/row.css">
    <link rel="stylesheet" href="../../../css/bootstrap/bootstrapMin.css">
    <link rel="stylesheet" href="../../../css/user/read.css">
    <style>
       
      
    </style>
</head>

<body>

    <?php include './../../include/user/header.php' ?>

    <main>
        <div class="row h-100">
            <div class="col-3 h-100">
                <section class="historyChilds">
                    <h5>Recientes</h5><hr>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button> <br>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div><br>
                    <div class="btn-group">
                        <button type="button" class="btn"><button type="button" class=" " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>
                    </div>
                    <a href="#allHistoryChilds"> Ver todas</a>
                </section>
            </div>
            <div class="col-6">
                <div>
                    <?php
                    include "../../../php/user/showEstatusLessons.php";
                    showLessons();
                    ?>
                </div>
            </div>
            <div class="col-3">
                <div>
                    <h4 class="clasificaciones">Clasificaciones actuales </h4>
                    <hr>
                    <?php
                    include './../../../php/connectionBD.php';

                    try {

                        $typeAccess = 1;
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

                    } catch (PDOException $ex) {
                        echo $ex->getMessage();
                    }

                    $pdo = null;

                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include './../../include/footer.php' ?>
    <?php include './../../include/user/offcanvasUser.php' ?>
    <?php include './../../include/user/offcanvasAplication.php' ?>
    <script src="./../../../js/user/unlockLinks.js"> </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

</html>