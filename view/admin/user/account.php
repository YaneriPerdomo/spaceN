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
                <div class="accordion accordion-flush content" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Eliminar tu cuenta
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Mediante esta opción puedes eliminar completamente tu cuenta de Profesional en Eres Capaz
                                    Al eliminar tu cuenta, dejarás de tener acceso a Tu puedes tanto a través de la web
                                    como de las aplicaciones móviles. Todos los usuarios que hayas dado de alta también
                                    serán eliminados por lo que tampoco podrán acceder a la plataforma.
                                </p>
                                <form action="./../../../php/admin/user.php" method="post">
                                    <input type="hidden" name="valueFunction" value="deleteAccount">
                                    <button>Eliminar</button>
                                </form>
                            </div>
                        </div>
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
</html>