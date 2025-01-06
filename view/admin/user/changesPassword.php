<?php
include './../../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/components/validation.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">
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

            main > .userM0{
                margin: 0 !important;
            }

            
            [type="text"] , select, [type="password"]{
                max-width: 90% !important;
                }
        .btnFlexEnd{
            justify-content: center !important;  
        }
        }
    </style>
</head>

<body>

    <?php include "./../../include/admin/user/header.php" ?>

    <main class="">
        <div class="row h-100 userM0">
            <?php include "./../../include/admin/user/configurationProfile.php" ?>
            <div class="col-lg-9 col-12">
                <div class="content">
                    <form action="./../../../php/admin/user.php" method="post">
                        <input type="hidden" name="valueFunction" value="changesPassword">
                        <legend class="p-0 m-1">Cambiar contraseña</legend>
                        <p>Actualiza tu contraseña de forma regular para mantener tu cuenta segura. Puedes hacerlo en
                            cualquier momento, con solo unos clics.</p>
                        <hr>
                        <div class="validations">
                            <span class="one"></span>
                            <span class="two"></span>
                        </div>
                        <label for="">Contraseña Actual<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-lock"></i>
                            </span>
                            <input type="password" name="oldPassword" class="form-control"
                                placeholder="Ingrese contraseña actual" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <label for="">Contraseña Nueva<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="newPassword" class="form-control"
                                placeholder="Ingrese nueva contraseña" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div><label for="">Confirmar contraseña<span>*</span></label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key"></i></i>
                            </span>
                            <input type="password" name="passwordAgain" class="form-control"
                                placeholder="Repita nueva contraseña" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <hr>
                        <div class="btnFlexEnd">
                            <input type="submit" class="purpleButton" value="Cambiar contraseña">
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

<script src="./../../../js/helpers/bootstrap.js"></script>

<script src="./../../../js/validations/changesPassword.js" type="module"></script>

<!--
<script>

    //Etiqueta form
    let $form = document.querySelector("form");

    // Obtener referencias a los elementos del formulario
    let $oldPassword = document.querySelector("[name = 'oldPassword']");
    let $newPassword = document.querySelector("[name='newPassword'");
    let $passwordAgain = document.querySelector("[name='passwordAgain']")

    // Array de inputs para facilitar el manejo
    let arrayFormChangesPassword = [$oldPassword, $newPassword, $passwordAgain];

    // Referencias a elementos para mostrar mensajes de validación
    const $spanValidation = document.querySelector(".validations > .one");
    const $spanValidation2 = document.querySelector(".validations > .two");
    const $spanValidationAll = [$spanValidation, $spanValidation2]

    // Obtener todos los grupos de entrada (para aplicar estilos)
    const $inputGroupAll = document.querySelectorAll(".input-group-text");

    // Evento de envío del formulario
    $form.addEventListener("submit", e => {
        e.preventDefault();

        // Eliminar clases de error anteriores
        for (let i = 0; i < arrayFormChangesPassword.length; i++) {
            arrayFormChangesPassword[i].classList.remove("notValid");
            $inputGroupAll[i].classList.remove("notValid")
        }
        $spanValidation.innerHTML = "";
        $spanValidation2.innerHTML = "";

        let error = false;
        let messageValidation = "";
        let messageValidation2 = "";
        let count = 0;
        let newAgainNew = false;
        let oldNewPassword = false;


        // Validar contraseña antigua
        if ($oldPassword.value == "") {
            messageValidation += "Ingrese la contraseña actual. <br>";
            error = true;
            count++;
            $oldPassword.classList.add("notValid");
            $inputGroupAll[0].classList.add("notValid")
        }
        // Validar nueva contraseña
        if ($passwordAgain.value == "") {
            messageValidation += "Ingrese la nueva contraseña <br>";
            error = true;
            count++;
            $passwordAgain.classList.add("notValid");
            $inputGroupAll[1].classList.add("notValid")
        }

        // Validar confirmación de contraseña
        if ($newPassword.value == "") {
            messageValidation += "Confirme la nueva contraseña <br>";
            error = true;
            count++;
            $newPassword.classList.add("notValid");
            $inputGroupAll[2].classList.add("notValid")
        }

        // Validar que las contraseñas coincidan
        if ($oldPassword.value == $newPassword.value) {
            messageValidation2 += "La nueva contraseña no puede ser igual a la actual. <br>";
            error = true;
            $passwordAgain.classList.add("notValid");
            $newPassword.classList.add("notValid");
            let oldNewPassword = true;
            $inputGroupAll[0].classList.add("notValid")
            $oldPassword.classList.add("notValid")
            $newPassword.classList.add("notValid")
            $inputGroupAll[1].classList.add("notValid")
        }

        // Validar que la nueva contraseña sea diferente a la antigua
        if ($newPassword.value != $passwordAgain.value) {
            messageValidation2 += "No coinciden las contraseñas <br>";
            error = true;
            $newPassword.classList.add("notValid");
            $passwordAgain.classList.add("notValid");
            let newAgainNew = true;
            $inputGroupAll[1].classList.add("notValid")
            $newPassword.classList.add(".notValid");
            $passwordAgain.classList.add("notValid")
            $inputGroupAll[2].classList.add("notValid")
        }

        // Mostrar mensajes de error
        if (count == 3) {
            // Si hay tres campos vacíos, marcar todos los grupos de entrada como no válidos
            // y mostrar mensaje de error general
            $inputGroupAll.forEach(input => {
                input.classList.add("notValid");
            });
            $spanValidation.removeAttribute("style"); // Mostrar el mensaje de error
            $spanValidation.innerHTML = "Complete todos los campos";
        } else if (error) {
            // Si hay errores, mostrar mensajes de error específicos:
            if (count == 1) {
                // Si hay un campo vacío:
                if (oldNewPassword) {
                    // Si la contraseña antigua y nueva son iguales, mostrar mensaje específico
                    return $spanValidation.innerHTML = "Por su seguridad, no utilice la misma contraseña. <br>";
                } else if (newAgainNew) {
                    // Si las contraseñas nuevas no coinciden, mostrar mensaje específico
                    return $spanValidation.innerHTML = messageValidation2;
                }
                $spanValidation2.innerHTML = "Complete el campo que falta <br>"; // Mostrar mensaje de campo faltante
                $spanValidation.innerHTML = messageValidation2; // Mostrar mensaje de error específico
            } else if (count == 2) {
                // Si hay dos campos vacíos:
                if (oldNewPassword) {
                    // Si la contraseña antigua y nueva son iguales, mostrar mensaje específico
                    return $spanValidation.innerHTML = "Por su seguridad, no utilice la misma contraseña. <br>";
                } else if (newAgainNew) {
                    // Si las contraseñas nuevas no coinciden, mostrar mensaje específico
                    return $spanValidation.innerHTML = messageValidation2;
                }
                $spanValidation2.innerHTML = "Complete los campos que faltan <br>"; // Mostrar mensaje de campos faltantes
                $spanValidation.innerHTML = messageValidation2; // Mostrar mensaje de error específico
            } else {
                // Si hay errores pero no campos vacíos, mostrar mensaje de error específico
                $spanValidation.innerHTML = messageValidation2;
            }
        }

        //Si no hay algun error entonces se enviara los datos al servidor(PHP) pero mas que todo la contraseña nue
        if (!error) {
            $form.submit();
        }
    });
</script>
--->

</html>