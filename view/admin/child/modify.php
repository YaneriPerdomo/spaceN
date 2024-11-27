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
        $sqlShow = "SELECT ninos.id_nino, usuarios.id_usuario AS usuarios_id_usuario, usuarios.usuario, ninos.id_genero, ninos.nombre, ninos.apellido, ninos.id_categoria_actividades, ninos.fecha_nacimiento FROM ninos INNER JOIN 
        usuarios ON ninos.id_usuario = usuarios.id_usuario  
        WHERE ninos.id_nino = :id_child;";

        $stmt = $pdo->prepare($sqlShow);
        $stmt->bindParam('id_child', $id_child, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC); // arreglo asociativo


        switch ($row["id_genero"]) {
            case 1:
                $gender = "<p>
        <label><input type='radio' name='gender' value='1' checked> Masculino</label>
        <label><input type='radio' name='gender' value='2'> Femenino</label>
        </p>";
                break;
            case 2:
                $gender = "<p>
        <label><input type='radio' name='gender' value='1' > Masculino</label>
        <label><input type='radio' name='gender' value='2' checked> Femenino</label>
        </p>";
                break;
        }
        switch ($row["id_categoria_actividades"]) {
            case 1:
                $accessLevel = "<select name='accessLevel'><br>
        <option value='1' selected>Pre numerico</option>
        <option value='2'>Numerico emergente</option>
        <option value='3'>Desarrollo numerico</option>
    </select><br>";
                break;
            case 2:
                $accessLevel = "<select name='accessLevel'><br>
        <option value='1'>Pre numerico</option>
        <option value='2' selected>Numerico emergente</option>
        <option value='3'>Desarrollo numerico</option>
    </select><br>";
                break;
            case 3:
                $accessLevel = "<select name='accessLevel'><br>
        <option value='1'>Pre numerico</option>
        <option value='2' >Numerico emergente</option>
        <option value='3' selected>Desarrollo numerico</option>
        </select><br>";
                break;
            default:
                break;
        }
        ;
        echo "<input type='hidden' name='id_user' value = '" . $row["usuarios_id_usuario"] . "'";
        echo "<label for=''>Usuario</label><br>";
        echo "<input type='text' name='user' value='" . $row["usuario"] . "'><br>";
        echo "<label for=''>Nombre</label><br>";
        echo "<input type='text' name='name' value = '" . $row["nombre"] . "'><br>";
        echo " <label for=''>Apellido</label><br>";
        echo "<input type='text' name='lastname' value = '" . $row["apellido"] . "'><br>";
        echo "<label for=''>Fecha de nacimiento</label><br>";
        echo "<input type='date' name='date' value = '" . date('Y-m-d', strtotime($row["fecha_nacimiento"])) . "'><br>";
        echo " <label for=''>Nivel_acceso</label><br>";
        echo "$accessLevel";
        echo "<label for=''>Genero</label><br>";
        echo $gender;
        echo "<label for=''>Contraseña</label><br>";
        echo "<input type='password' name='password'><br>";
        echo "<label for=''>contraseña de nuevo</label><br>";
        echo "<input type='password'>";

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}




?>

<!DOCTYPE html>
<html lang="ea">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    :root {
        --colorHF: #9470f7;
        --colorBlack: rgb(47, 47, 47)
    }

    header {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
        background: var(--colorHF);
    }

    body {
        background: #f2f2f2;
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        background-size: contain;
        background-repeat: repeat;
    }

    main {
        flex-grow: 2;
        display: flex;
    justify-content: center;
    align-items: center;
    }

    .userPerfil>button {
        border: none;
        background: var(--colorHF)
    }

    .userImg,

    .LogoImg {
        width: 70px;
        clip-path: circle(34% at 50% 50%);
    }

    a {
        margin: 0.5rem 0rem;
        display: block;
        color: var(--colorBlack);
        text-decoration: none;
    }

    footer {
        background: rgb(48, 48, 48);
        width: 100vw;
    }

    .historyChilds {
        height: 100%;
        overflow-y: scroll !important;
        overflow-x: hidden;
        padding: 1rem;
    }

    .burgerMenu {
        width: 40px;
        height: 39px;
        background: none;
    }

    .offCanvasSpaceN {
        border: none;
        background: none;
        padding: 0rem;
    }

    .dataTable {
        display: block;
        width: 100%;
        margin: 1em 0;
    }

    .dataTable thead,
    .dataTable tbody,
    .dataTable thead tr,
    .dataTable th {
        display: block;
    }

    .dataTable thead {
        float: left;
    }

    .dataTable tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }

    .dataTable td,
    .dataTable th {
        padding: .625em;
        line-height: 1.5em;
        border-bottom: 1px dashed #ccc;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .dataTable th {
        text-align: left;
        background: rgba(0, 0, 0, 0.14);
        border-bottom: 1px dashed #aaa;
    }

    .dataTable tbody tr {
        display: table-cell;
    }

    .dataTable tbody td {
        display: block;
    }

    .dataTable tr:nth-child(odd) {
        background: rgba(0, 0, 0, 0.07);
    }

    @media screen and (min-width: 50em) {

        .dataTable {
            display: table;
        }

        .dataTable thead {
            display: table-header-group;
            float: none;
        }

        .dataTable tbody {
            display: table-row-group;
        }

        .dataTable thead tr,
        .dataTable tbody tr {
            display: table-row;
        }

        .dataTable th,
        .dataTable tbody td {
            display: table-cell;
        }

        .dataTable td,
        .dataTable th {
            width: auto;
        }

    }

    .searchChilds {
        flex-grow: 2;
        align-content: center;
        align-items: center;
        justify-content: center;
        display: flex;

    }

    .showAndAddChild {
        align-content: space-between;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }

    main>div {
        width: 100vw;
        padding: 1rem;
    }

    .operations>a {
        display: inline
    }

    .configurationProfile .content >div {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .personalInformation>.information>.imgUser>img {
        background: #ff4343;
        height: 150px;
        min-width: 200px;
        max-width: 500px;
        clip-path: circle(40% at 50% 50%);
    }

    .information {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .information>div>label {
        margin-bottom: 0.3rem;
    }

    .content{
        background: white;
        padding: 1rem;
        border-radius: 1rem;
        border: solid 1px #e8d8ff;
        margin:1rem;
        max-width: 700px;
    }
</style>

<body>

<?php include "./../../include/admin/user/header.php" ?>

<main>
   <div class="content">
   <h1>Registrar usuario</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa sunt officia totam temporibus sint repellat
            voluptas adipisci, ut omnis a deserunt, distinctio vitae maxime, vel nam quos? Ad, labore recusandae!</p>
            <form action="../../../php/modifyChild.php" method="post">
            <?php
            showChild();
            ?><br>
            <input type="submit" value="Actualizar">
        </form>
   </div>
    </main>
    <?php include "./../../include/admin/footer.php" ?>
</body>
<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</html>
 