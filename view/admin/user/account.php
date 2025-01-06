<?php
    include './../../../php/validations/authorizedUser.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta | Espacio N </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/components/offcanvas.css">
    <link rel="stylesheet" href="../../../css/components/header.css">
    <link rel="stylesheet" href="../../../css/components/semanticTag.css">
    <link rel="stylesheet" href="../../../css/admin/profile.css">
    <link rel="stylesheet" href="../../../css/components/modalWindows.css">
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
        }
 </style>
</head>

<body>

<?php include "./../../include/admin/user/header.php" ?>


    <main class="">
        <div class="row h-100 userM0">
        <?php include "./../../include/admin/user/configurationProfile.php" ?>

            <div class="col-12 col-lg-9">
                <div class="accordion accordion-flush content " id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="p-0 m-1 accordion-button youDeleteAccount collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                                         <legend>
  Eliminar tu cuenta                           </legend>

                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Mediante esta opción podrás eliminar por completo tu cuenta Profesional en "Eres Capaz"
                                    <b>al eliminar tu cuenta, ya no tendrás acceso, teniendo en cuenta que todos los usuarios
                                    que hayas creado, también serán eliminados</b> por lo que no podrán acceder a la plataforma
                                    de aprendizaje.
                                </p>
                                <button class="btn btnDeleteAccount ">Eliminar</button>
                             </div>
                        </div>
                    </div>
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
<script src="./../../../js/helpers/modalWindows.js"></script>
 

</html>