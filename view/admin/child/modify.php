<?php
include './../../../php/validations/authorizedUser.php';
function showChild()
{
    include '../../../php/connectionBD.php';

    // Verificamos si hubo algún error al conectar a la base de datos
    if ($pdo->errorCode() != 0) {
        // Si hay un error, mostramos un mensaje y detenemos la ejecución
        die("Error de conexión a la base de datos: " . $pdo->errorInfo()[2]);
    }

    $id_child = $_GET["id"];

    try {
        $sqlShow = "SELECT ninos.id_nino, usuarios.id_usuario AS usuarios_id_usuario, usuarios.usuario, ninos.id_genero, ninos.nombre, ninos.apellido, ninos.id_nivel_acceso, ninos.fecha_nacimiento FROM ninos INNER JOIN 
        usuarios ON ninos.id_usuario = usuarios.id_usuario  
        WHERE ninos.id_nino = :id_child;";

        $stmt = $pdo->prepare($sqlShow);
        $stmt->bindParam('id_child', $id_child, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC); // arreglo asociativo


        switch ($row["id_genero"]) {
            case 1:
                $gender = "<p class='d-flex gap-2 selectionGender'>
                                <label for='M'>
                                    <input type='radio' name='gender' id='M' value='1' checked> 
                                    <img src='../../../img/childs/boy.png' alt='' class='checked'>
                                </label>
                                <label for='F'>
                                    <input type='radio' id='F' name='gender' value='2'> 
                                    <img src='../../../img/childs/girl.png' alt='' class=''>
                                </label>
                            </p>";
                break;
            case 2:
                $gender = "<p class='d-flex gap-2 selectionGender'>
                                <label for='M'>
                                    <input type='radio' name='gender' id='M' value='1' > 
                                    <img src='../../../img/childs/boy.png' alt='' class=''>
                                </label>
                                <label for='F'>
                                    <input type='radio' id='F' name='gender' value='2' checked> 
                                    <img src='../../../img/childs/girl.png' alt='' class='checked'>
                                </label>
                            </p>"
                ;
                break;
        }
        switch ($row["id_nivel_acceso"]) {
            case 1:
                $accessLevel = "<select name='accessLevel' class='form-control'><br>
                                    <option value='1' selected>Pre numerico</option>
                                    <option value='2'>Numerico emergente</option>
                                    <option value='3'>Desarrollo numerico</option>
                                </select><br>";
                break;
            case 2:
                $accessLevel = "<select name='accessLevel' class='form-control'><br>
                                    <option value='1'>Pre numerico</option>
                                    <option value='2' selected>Numerico emergente</option>
                                    <option value='3'>Desarrollo numerico</option>
                                </select><br>";
                break;
            case 3:
                $accessLevel = "<select name='accessLevel' class='form-control'><br>
                                    <option value='1'>Pre numerico</option>
                                    <option value='2' >Numerico emergente</option>
                                    <option value='3' selected>Desarrollo numerico</option>
                                </select><br>";
                break;
            default:
                break;
        }
        ;
        echo "<div class='row'>";
        echo "<div class='col-lg-4 col-12'>";
        echo "<label for='' class='colorPurple'>Datos personales:</label><br>";
        echo "</div>";
        echo "<div class='col-lg-8 col-12'>";
        echo "<input type='hidden' name='id_user' value = '" . $row["usuarios_id_usuario"] . "'>";
        echo "<input type='hidden' name='id_child' value = '" . $id_child . "'>";
        echo "<label for=''>Nombre<span>*</span></label><br>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='basic-addon1'><i class='bi bi-person'></i></span>";
        echo "<input type='text' name='name' class='form-control' placeholder='¿Como se llama tu niño/a? 🤔' aria-label='Username' aria-describedby='basic-addon1'  value='" . $row["nombre"] . "'>";
        echo " </div>";
        echo "<label for=''>Apellido<span>*</span></label><br>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='basic-addon1'><i class='bi bi-person'></i></span>";
        echo "<input type='text' name='lastname' class='form-control' placeholder='¿Y cual es su apellido? 🤔' aria-label='Username' aria-describedby='basic-addon1'  value='" . $row["apellido"] . "'>";
        echo "</div>";
        echo "<label for=''>Fecha de nacimiento <span>*</span></label><br>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='basic-addon1'><i class='bi bi-calendar3-event'></i></span>";
        echo "<input type='date' name='date' required onblur='validateBirthDate()' class='form-control' aria-label='Username' value = '" . date('Y-m-d', strtotime($row["fecha_nacimiento"])) . "' aria-describedby='basic-addon1'>";
        echo "</div>";
        echo "<label for=''>Genero<span>*</span></label><br>";
        echo $gender;
        echo "</div></div><hr>";
        echo "<div class='row'>";
        echo "<div class='col-lg-4 col-12'>";
        echo "<label for='' class='colorPurple'>Datos para la plataforma:</label><br>";
        echo "</div>";
        echo "<div class='col-lg-8 col-12'>";
        echo "<label for=''>Nombre de usuario<span>*</span></label><br>";
        echo "<small>Debe tener entre 6 y 10 caracteres. </small>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='basic-addon1'>";
        echo "<i class='bi bi-person-workspace'></i></i>";
        echo "</span>";
        echo "<input type='text' name='user' class='form-control' placeholder='¡Oh 😲...!' aria-label='Username' aria-describedby='basic-addon1'  value='" . $row["usuario"] . "'>";
        echo "</div>";
        echo "<label for=''>Nivel de acceso<span>*</span></label><br>";
        echo "<small>Si cambia el nivel de acceso del usuario actual perderá todo el progreso
         que haya realizado anteriormente.</small>";
        echo "<div class='input-group mb-3'>";
        echo "<span class='input-group-text' id='basic-addon1'><i class='bi bi-door-open'></i></span>";
        echo "$accessLevel";
        echo "</div>";
        echo "<label for=''>Contraseña<span>*</span></label>";
        echo "<div class='input-group mb-3'>
                    <span class='input-group-text' id='basic-addon1'>
                        <i class='bi bi-key'></i></i>
                    </span>
                    <input 
                        type='password' 
                        name='password' 
                        class='form-control'
                        placeholder='Es importante tener una contraseña fuerte✊' aria-label='Username'
                        aria-describedby='basic-addon1'>
                    <br>
               </div>";
        echo "<label for=''>Confirma tu contraseña<span>*</span></label>";
        echo "<div class='input-group mb-3'>
                <span class='input-group-text' id='basic-addon1'>
                    <i class='bi bi-key'></i></i>
                </span>
                <input 
                    type='password'
                    name='passwordAgain' 
                    class='form-control'
                    placeholder='Para mas seguridad ✊🤐 ' aria-label='Username'
                    aria-describedby='basic-addon1'>
                <br>
            </div>";
        echo "</div></div><hr>";
        echo "";

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../css/components/content.css">
    <link rel="stylesheet" href="../../../css/components/validation.css">

    <style>
        @media screen and (max-width: 992px) {
            .col-lg-3>.content {
                height: 200px !important;
                margin-bottom: 1rem !important;
            }

            .col-lg-3 {
                height: 200px !important;
            }

            .row {
                height: auto !important;
                gap: 1rem;
            }




            [type="text"],
            select,
            [type="password"] {
                max-width: 90% !important;
            }

            .btnFlexEnd {
                justify-content: center !important;
            }
        }
    </style>
</head>


<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main>
        <div class="content">
            <h1>Actualizar usuario</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa sunt officia totam temporibus sint
                repellat
                voluptas adipisci, ut omnis a deserunt, distinctio vitae maxime, vel nam quos? Ad, labore recusandae!
            </p>
            <div class="validations fw-bold text-center">
                <span class="one"></span>
                <span class="two"></span>
                <span class="thren"></span>
            </div>
            <hr>
            <form action="../../../php/admin/child.php" method="post">
                <input type="hidden" name="valueFunction" value="modify">
                <?php showChild(); ?>
                <a href='./../dashboard.php'></a>
                <div class='d-flex justify-content-center gap-4 align-items-center'>
                    <div class=''>
                        <a href='./../dashboard.php'><span><i class='bi bi-arrow-left-square'></i> Volver</span></a>
                    </div>
                    <div class=''>
                        <input type='submit' class='purpleButton' value='Registrar'>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include "./../../include/footer.php" ?>
</body>
<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<script src="../../../js/helpers/selectionGenderChild.js" type="module"></script>
<script src="./../../../js/helpers/bootstrap.js"></script>
<script src="../../../js/validations/validateBirthDate.js"></script>
<script src="./../../../js/validations/modifyChild.js" type="module"></script>

</html>