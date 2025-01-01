<?php
include './../../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu perfil | Espacio N</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/components/validation.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">

</head>

<body>
    <?php include "./../../include/admin/user/header.php" ?>
    <main class="">
        <div class="row h-100">
            <?php include "./../../include/admin/user/configurationProfile.php" ?>
            <div class="col-9">
                <div class="content">
                    <form action="./../../../php/admin/user.php" class="personalInformation" method="POST">
                        <legend class="p-0 m-1">Perfil</legend>
                        <p>
                            Controla tu información protegiendo tu privacidad y recuerda que puedes actualizar tu perfil
                            en cualquier momento.
                        </p>
                        <hr>
                        <input type="hidden" name="valueFunction" value="update">
                        <div class="validations fw-bold">
                            <span class="one"></span>
                            <span class="two"></span>
                            <span class="thren"></span>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="">Datos personales:</label><br>
                            </div>
                            <div class="col-8">
                                <label for="">Nombre<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1" value="<?php echo $_SESSION['nombre'] ?? '' ?>">
                                </div>
                                <label for="">Apellido<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="lastname" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1"
                                        value="<?php echo $_SESSION['apellido'] ?? '' ?>">
                                </div>
                                <label for="">Correo electronico<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi bi-envelope"></i></span>
                                    <input type="text" name="mail" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1" value="<?php echo $_SESSION['correo'] ?? '' ?>">
                                </div>
                                <label for="">Cargo Profesional<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-person-vcard"></i>
                                    </span>
                                    <select id="cargo" class="mt-1 form-control" name="professionalPosition">
                                        <?php
                                        if ($_SESSION["id_cargo"] == "1") {
                                            echo "<option value='1' $selected>Docente</option>
                                                      <option value='2'>Terapeuta</option>";
                                        } else {
                                            echo "<option value='2' $selected>Terapeuta</option>
                                                <option value='1'>Docente</option>";
                                        }
                                        ?>
                                    </select><br>
                                </div>

                                <label for=""> Nombre del Centro escolar o profesional<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-building"></i>
                                    </span>
                                    <input type="text" name="center" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1" value="<?php echo $_SESSION['centro'] ?? '' ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <label for="">Datos de la cuenta:</label>
                            </div>
                            <div class="col-8">
                                <label for="">Usuario<span>*</span></label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="user" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1"
                                        value="<?php echo $_SESSION['usuario'] ?? '' ?>">
                                </div>
                                <label for="">Tipo de cuenta</label><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-upc"></i>
                                    </span>
                                    <input type="text" name="TypeP" class="form-control"
                                        placeholder="¿Como se llama tu niño/a? 🤔" aria-label="Username"
                                        aria-describedby="basic-addon1" value="Profesional" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="btnFlexCenter">
                            <input type="submit" value="Actualizar perfil" class='purpleButton'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "./../../include/footer.php" ?>
</body>
<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<?php include "./../../include/admin/modalWindows/deleteAccount.php" ?>

<script src="./../../../js/helpers/bootstrap.js"></script>

<script src="../../../js/validations/professionalProfile.js" type="module"></script>

</html>