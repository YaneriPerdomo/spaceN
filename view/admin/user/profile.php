<?php
    include './../../../php/validations/authorizedUser.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/admin/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/admin/components/header.css">
    <link rel="stylesheet" href="../../../css/admin/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">
</head>


<body>
    <?php include "./../../include/admin/user/header.php" ?>
    <main class="">
        <div class="row h-100">
            <?php include "./../../include/admin/user/configurationProfile.php" ?>
            <div class="col-9">
                <div class="content">
                    <div class="">
                        <h2>Perfil</h2>
                        <hr>
                        <p>Actualizar tu información personal</p>
                        <form action="./../../../php/admin/user.php" class="personalInformation" method="POST">
                            <input type="hidden" name="valueFunction" value="update">
                            <div class="information">
                                <div class="oneInformation">
                                    <label for="usuario">Usuario</label><br>
                                    <input id="usuario" name="user" type="text" placeholder="Ingrese tu usuario"
                                        value="<?php echo $_SESSION['usuario'] ?? '' ?>" />
                                    <br>
                                    <label for="">Nombre</label><br>
                                    <input id="nombre" name="name" type="text" placeholder="Ingrese tu nombre"
                                        value="<?php echo $_SESSION['nombre'] ?? '' ?>" />
                                    <br>
                                    <label for="apellido">Apellido</label><br>
                                    <input id="apellido" name="lastname" type="text" placeholder="Ingrese tu apellido"
                                        value="<?php echo $_SESSION['apellido'] ?? '' ?>" />
                                </div>
                                <div class="twoInformation">
                                    <label for="correo">Correo Electronico</label><br>
                                    <input id="correo" name="mail" type="text"
                                        placeholder="Ingrese tu correo electronico"
                                        value="<?php echo $_SESSION['correo'] ?? '' ?>" />
                                    <br>
                                    <div class="cargos">
                                        <label for="cargo">Cargo Profesional</label><br>
                                        <select id="cargo" class="mt-1" name="professionalPosition">
                                            <?php
                                            if($_SESSION["id_cargo"] == "1"){
                                                echo "<option value='1' $selected>Docente</option>
                                                      <option value='2'>Terapeuta</option>";
                                            }else{
                                                echo "<option value='2' $selected>Terapeuta</option>
                                                <option value='1'>Docente</option>";
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
                                    <input id="centro" type="text" class="nombre_centro_escolar" name="center"
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