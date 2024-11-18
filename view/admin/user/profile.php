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
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        background-size: contain;
        background-repeat: repeat;
    }

    main {
        flex-grow: 2;
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
    }

    .operations>a {
        display: inline
    }

    .configurationProfile>div {
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
</style>

<body>
    <?php include "./../../include/admin/user/header.php" ?>
    <main class="">
        <div class="row h-100">
            <div class="col-3 configurationProfile h-100">
                <h2>Configuraciones</h2>
                <div class="profile">
                    <i class="bi bi-person"></i>
                    <a href="./profile.php">Perfil</a>
                </div>
                <div class="./changesPassword">
                    <i class="bi bi-gear"></i>
                    <a href="./changesPassword.php">Cambiar contraseña</a>
                </div>
                <div class="./account">
                    <i class="bi bi-lock"></i>
                    <a href="./account.php">Cuenta</a>
                </div>
            </div>
            <div class="col-9">
                <div>
                    <div class="">
                        <h1>Perfil</h1>
                        <hr>
                        <p>Cambia tu foto de perfil y edita tu información personal</p>
                        <form action="/php/ProfileAdmin.php" class="personalInformation" method="POST">
                            <input type="hidden" name="call" value="1" />
                            <div class="information">
                                <div class="imgUser">
                                    <img src="" class="img-fluid" alt=""><br>
                                    <input type="file" class="file" id="" placeholder="Cambiar foto">
                                </div>
                                <div class="oneInformation">
                                    <label for="usuario">Usuario</label><br>
                                    <input id="usuario" name="usuario" type="text" placeholder="Ingrese tu usuario"
                                        value="<?php echo $_SESSION['usuario'] ?? '' ?>" />
                                    <br>
                                    <label for="">Nombre</label><br>
                                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese tu nombre"
                                        value="<?php echo $_SESSION['nombre'] ?? '' ?>" />
                                    <br>
                                    <label for="apellido">Apellido</label><br>
                                    <input id="apellido" name="apellido" type="text" placeholder="Ingrese tu apellido"
                                        value="<?php echo $_SESSION['apellido'] ?? '' ?>" />
                                </div>
                                <div class="twoInformation">
                                    <label for="correo">Correo Electronico</label><br>
                                    <input id="correo" name="correo" type="text"
                                        placeholder="Ingrese tu correo electronico"
                                        value="<?php echo $_SESSION['correo'] ?? '' ?>" />
                                    <br>
                                    <div class="cargos">
                                        <label for="cargo">Cargo Profesional</label><br>
                                        <select id="cargo" class="mt-1" name="cargo">
                                            <?php
                                            // Opciones de cargo
                                            $charge_options = [
                                                ["id" => 1, "label" => "Docente"],
                                                ["id" => 2, "label" => "Terapeuta"],
                                            ];

                                            foreach ($charge_options as $option) {
                                                $selected = ($option['id'] === $_SESSION['cargo']) ? 'selected' : '';
                                                echo "<option value='{$option['id']}' $selected>{$option['label']}</option>";
                                            }
                                            ?>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <div class="threeInformation">
                                    <label for="centro" class="nombre_centro_escolar">
                                        Nombre del Centro escolar o
                                        profesional
                                    </label><br>
                                    <input id="centro" type="text" class="nombre_centro_escolar" name="centro"
                                        placeholder="Nombre del Centro escolar o profesional"
                                        value="<?php echo $_SESSION['centro'] ?? '' ?>">
                                    <br data-br-delete>
                                    <label for="tipocuenta">Tipo de cuenta Eres capaz</label><br>
                                    <input id="tipocuenta" type="text" value="Profesional" name="tipocuenta" readonly
                                        class="tipo--cuenta">
                                </div>
                            </div>
                            <hr>
                            <div class="form-btn-keep">
                                <input type="submit" value="Actualizar perfil">
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "./../../include/admin/footer.php" ?>
</body>
<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
<script>
    let file = document.querySelector(".file");
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    file.addEventListener("change", e => {
        const file = event.target.files[0];
        const fileType = file.type;
        if (allowedTypes.includes(fileType)) {
            alert("formato valido")
        } else {
            e.target.value = ""
            alert("formato no valido")
        }
    })
</script>



</html>