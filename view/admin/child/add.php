<?php
include './../../../php/validations/authorizedUser.php';
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

    .configurationProfile .content>div {
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

    .content {
        background: white;
        padding: 1rem;
        border-radius: 1rem;
        border: solid 1px #e8d8ff;
        margin: 1rem;
        max-width: 700px;
    }

    .purpleButton{
        background: #8f6cf2;
  padding: 0.5rem 2rem;
  color: white;
  border: 0rem;
    }

    .col-4 > label{
        font-weight: bold;
        color: #7d5bd9;
    }

    .col-8 > label{
        font-weight: 500;
    }
    label > span{
        color: #ff5d5d;
    }

    .content > p{
        color: #6f6f6f;
    }
</style>

<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main>
        <div class="content">
            <h1><b>Registrar usuario</b></h1>
            <p><em>¡Crea una cuenta para tu niño/a</em> y ayúdale a superar 
                los desafíos de las matemáticas! Nuestra plataforma de aprendizaje ofrece 
                ejercicios personalizados <em>segun sus necesidades</em>
            </p><hr>
            <form action="../../../php/addChild.php" method="post">
                <input type="hidden" value="<?php echo $_SESSION["id_profesional"]; ?>">
                <div class="row">
                    <div class="col-4">
                        <label for="">Datos personales:</label><br>
                    </div>
                    <div class="col-8">
                        <label for="">Nombre<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control"
                                placeholder="¿Como se llama el niño/a? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>

                        <label for="">Apellido<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="lastName" class="form-control"
                                placeholder="¿Y cual es su apellido? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Fecha de nacimiento <span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="bi bi-calendar3-event"></i></span>
                            <input type="date" name="date" class="form-control"
                               aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Genero<span>*</span></label><br>
                        <p>
                            <label><input type="radio" name="gender" value="1"> M</label>
                            <label><input type="radio" name="gender" value="2"> F</label>
                        </p>
                        <br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <label for="">Datos para la plataforma:</label><br>
                    </div>
                    <div class="col-8">
                        <label for="">Nombre de usuario<span>*</span></label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-person-workspace"></i></i>
                    </span>
                    <input type="text" name="user" class="form-control"
                                placeholder="¡Oh 😲...! Un nombre de usuario auténtico 🌟" aria-label="Username"
                                aria-describedby="basic-addon1">
                </div>
                <label for="">Nivel de acceso<span>*</span></label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-door-open"></i>
                    </span>
                    <select name="accessLevel" class="form-control" id=""><br>
                        <option value="1">Pre numerico</option>
                        <option value="2">Numerico emergente</option>
                        <option value="3">Desarrollo numerico</option>
                    </select><br>
                </div>
                <label for="">Contraseña<span>*</span></label>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-key"></i></i>
                    </span>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control"
                        placeholder="Es importante tener una contraseña fuerte✊" aria-label="Username"
                        aria-describedby="basic-addon1">
                    <br>
                </div>
                <label for="">Confirma tu contraseña<span>*</span></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-key"></i></i>
                    </span>
                    <input 
                        type="password" 
                        name="passwordAgain" 
                        class="form-control"
                        placeholder="Para mas seguridad ✊🤐 " aria-label="Username"
                        aria-describedby="basic-addon1">
                    <br>
                </div>
                    </div>
                </div>
                <hr>
                <a href="./../dashboard.php"></a>
                <div class="d-flex justify-content-center gap-4 align-items-center">
                    <div class="">
                        <a href="./../dashboard.php"><span><i class="bi bi-arrow-left-square"></i> Volver</span></a>
                    </div>
                    <div class="">
                        <input type="submit" class='purpleButton' value="Registrar">
                    </div>

                </div>
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