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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/addAndModifyChild.css">
    <link rel="stylesheet" href="../../../css/components/content.css">
    <link rel="stylesheet" href="../../../css/components/validation.css">

</head>

<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main>
        <div class="content">
            <h1><b>Registrar usuario</b></h1>
            <p><em>¡Crea una cuenta para tu niño/a</em> y ayúdale a superar
                los desafíos de las matemáticas! Nuestra plataforma de aprendizaje ofrece
                ejercicios personalizados <em>segun sus necesidades.</em>
            </p>
            <div class="validations text-center">
                <span class="one"></span>
                <span class="two"></span>
                <span class="thren"></span>
            </div>
            <hr>
            <form action="../../../php/admin/child.php" method="post">
                <input type="hidden" value="<?php echo $_SESSION["id_profesional"]; ?>">
                <input type="hidden" name="valueFunction" value="add">
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
                                aria-describedby="basic-addon1">
                        </div>

                        <label for="">Apellido<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="lastname" class="form-control"
                                placeholder="¿Y cual es su apellido? 🤔" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Fecha de nacimiento <span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="bi bi-calendar3-event"></i></span>
                            <input type="date" name="date" class="form-control" aria-label="Username" required
                                aria-describedby="basic-addon1" onblur="validateBirthDate()">
                        </div>
                        <label for="">Genero<span>*</span></label><br>
                        <p class="d-flex gap-2 selectionGender">
                            <label for="M" data-checked="true">
                                <input type="radio" id="M" name="gender" value="1" checked>
                                <img src="../../../img/childs/boy.png" alt="" class="checked">
                            </label>
                            <label for="F">
                                <input type="radio" id="F" name="gender" value="2">
                                <img src="../../../img/childs/girl.png" alt="">
                            </label>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <label for="">Datos para la plataforma:</label><br>
                    </div>
                    <div class="col-8">
                        <label for="">Nombre de usuario<span>*</span></label><br>
                        <small>Debe tener entre 6 y 10 caracteres. </small>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-workspace"></i></i>
                            </span>
                            <input type="text" name="user" class="form-control" placeholder="¡Oh 😲...!"
                                aria-label="Username" aria-describedby="basic-addon1">
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
                            <input type="password" name="password" class="form-control"
                                placeholder="Es importante tener una contraseña fuerte✊" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <br>
                        </div>
                        <label for="">Confirma tu contraseña<span>*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="passwordAgain" class="form-control"
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
    <?php include "./../../include/footer.php" ?>
</body>


<?php include "./../../include/admin/user/offcanvasAplication.php" ?>
<?php include "./../../include/admin/user/offcanvasUser.php" ?>
<script src="./../../../js/helpers/bootstrap.js"></script>
<script src="../../../js/helpers/selectionGenderChild.js"></script>

<script src="../../../js/validations/validateBirthDate.js" type="module"></script>
<script src="../../../js/validations/addChild.js" type="module"></script>

</html>